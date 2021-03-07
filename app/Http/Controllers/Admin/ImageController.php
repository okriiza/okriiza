<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ImageRequest;
use App\Models\Article;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Image::with('article')->get();
        return view('pages.admin.image.index',[
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
        $data_article = Article::all(); 
        return view('pages.admin.image.create',[
            'data_article' => $data_article
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImageRequest $imagerequest)
    {
        $data_image = $imagerequest->all();
        $data_image['image'] = $imagerequest->file('image')->store(
            'assets/article_image', 'public'
        );
        Image::create($data_image);
        return redirect()->route('image.index')->with('status', 'Data Berhasil Di Buat !');
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
        $items = Image::with('article')->findOrFail($id);

        return view('pages.admin.image.edit',[
            'items' => $items
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ImageRequest $imagerequest, $id)
    {
        $data_image = $imagerequest->all();
        $image_Data = Image::findOrFail($id);
        Storage::disk('public')->delete($image_Data->image);
        $data_image['image'] = $imagerequest->file('image')->store(
            'assets/article_image', 'public'
        );
        $image_Data->update($data_image);
        return redirect()->route('image.index')->with('status', 'Data Berhasil Di Update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Image::findOrFail($id);
        Storage::disk('public')->delete($data->image);
        $data->delete();
        return redirect()->route('image.index')->with('status', 'Data Berhasil Di Hapus !');
    }
}
