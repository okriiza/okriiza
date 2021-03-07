<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ArticleRequest;
use App\Http\Requests\Admin\CategoryRequest;
use App\Http\Requests\Admin\ImageRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Telegram\Bot\FileUpload\InputFile;
use Telegram\Bot\Laravel\Facades\Telegram;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Article::with('user','categories')->orderBy('created_at','DESC')->get();
        return view('pages.admin.article.index',[
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('pages.admin.article.create',[
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,gif,jpg',
            'name' => 'required|array',
            'keyword' => 'required'
        ]);
        
        $articledata = Article::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'body' => $request->body,
            'keyword' => $request->keyword,
            'thumbnail' => $request->thumbnail ? $request->file('thumbnail')->store('assets/article_image', 'public') : null,
        ]);

        Telegram::sendPhoto([
            'chat_id' => config('telegram.channel_id'),
            'photo' => InputFile::createFromContents(file_get_contents($request->file('thumbnail')->getRealPath()), Str::random(10) . '.' . $request->file('thumbnail')->getClientOriginalExtension())
        ]);
        $text = "<b>New Article !!!</b>\n"
            . "<b>$request->title</b>\n"
            . "https://okriiza.my.id/article/".Str::slug($request->title)."\n";

        Telegram::sendMessage([
            // 'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001277850075'),
            'chat_id' => config('telegram.channel_id'),
            'parse_mode' => 'HTML',
            'text' => $text
        ]);

        $articledata->categories()->sync(request('name'));
        return redirect()->route('article.index')->with('status', 'Data Berhasil Di Buat !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $items = Article::findOrFail($id);
        $categories = Category::get();
        return view('pages.admin.article.edit',[
            'items' => $items,
            'categories' => $categories
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {

        request()->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,gif,jpg',
            'name' => 'required|array',
            'keyword' => 'required'
        ]);

        $articledata = Article::findOrFail($id);
        
        if (request('thumbnail')) {
            Storage::disk('public')->delete($articledata->thumbnail);
            $thumbnail = request()->file('thumbnail')->store('assets/article_image', 'public');
        } elseif($articledata->thumbnail) {
            $thumbnail = $articledata->thumbnail;
        } else {
            $thumbnail = null;
        }
        
        
        $articledata->update([
            'title' => request('title'),
            'slug' => Str::slug(request('title')),
            'body' => request('body'),
            'keyword' => request('keyword'),
            'thumbnail' => $thumbnail
        ]);

        $articledata->categories()->sync(request('name'));


        return redirect()->route('article.index')->with('status', 'Data Berhasil Di Update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Article::findOrFail($id);
        Storage::disk('public')->delete($data->thumbnail);
        $data->categories()->detach();
        $data->delete();
        return redirect()->route('article.index')->with('status', 'Data Berhasil Di Hapus !');
    }

    public function articleimage(Request $request){
        //JIKA ADA DATA YANG DIKIRIMKAN
        if ($request->hasFile('upload')) {
            $file = $request->file('upload'); //SIMPAN SEMENTARA FILENYA KE VARIABLE
            $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME); //KITA GET ORIGINAL NAME-NYA
            //KEMUDIAN GENERATE NAMA YANG BARU KOMBINASI NAMA FILE + TIME
            $fileName = $fileName . '_' . time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('storage/assets/image_content'), $fileName); //SIMPAN KE DALAM FOLDER PUBLIC/UPLOADS

            //KEMUDIAN KITA BUAT RESPONSE KE CKEDITOR
            $ckeditor = $request->input('CKEditorFuncNum');
            $url = asset('storage/assets/image_content/' . $fileName); 
            $msg = 'Image uploaded successfully'; 
            
            //DENGNA MENGIRIMKAN INFORMASI URL FILE DAN MESSAGE
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($ckeditor, '$url', '$msg')</script>";

            //SET HEADERNYA
            @header('Content-type: text/html; charset=utf-8'); 
            return $response;
        }
    }
}
