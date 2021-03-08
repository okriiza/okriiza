<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Analytics;
use Spatie\Analytics\Period;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(){

        // SEOMeta::setTitle('Sharing Pengetahuan, Tips And Trick and Have Fun :) — Okriiza');
        SEOMeta::setDescription('Sharing Pengetahuan, Tips And Trick and Have Fun :)');
        SEOMeta::addKeyword(['programer', 'pengetahuan', 'tips and trick', 'tutorial', 'python', 'vuejs', 'laravel', 'php', 'code', 'reactjs','game']);
        SEOMeta::setCanonical('https://blog.okriiza.my.id/');

        OpenGraph::setDescription('Sharing Pengetahuan, Tips And Trick and Have Fun :)');
        OpenGraph::setTitle('Sharing Pengetahuan, Tips And Trick and Have Fun :) — Okriiza');
        OpenGraph::setUrl('https://blog.okriiza.my.id/');
        OpenGraph::addProperty('type', 'articles');
        OpenGraph::addProperty('locale', 'id_ID');
        OpenGraph::addProperty('locale:alternate', [ 'en-us']);

        TwitterCard::setTitle('Sharing Pengetahuan, Tips And Trick and Have Fun :) — Okriiza');
        TwitterCard::setSite('@okriiza');

        JsonLd::setTitle('Sharing Pengetahuan, Tips And Trick and Have Fun :) — Okriiza');
        JsonLd::setDescription('Sharing Pengetahuan, Tips And Trick and Have Fun');
        JsonLd::addImage('https://blog.okriiza.my.id/themes/frontend/assets/image/logo2.png');

        $items = Article::with(['categories','user'])->orderBy('created_at','DESC')->simplePaginate(6);
        $category = Category::all();
        // $popular = Analytics::fetchMostVisitedPages(Period::days(7), 6)->all();
        $random = Article::inRandomOrder()->limit(6)->get();

        return view('pages.post',[
            'items' => $items,
            'category' => $category,
            // 'popular' => $popular,
            'random' =>$random
        ]);
    }
    public function detail_post($slug){
        $items = Article::with(['categories','user'])
                        ->where('slug',$slug)
                        ->firstOrFail();
        // SEOMeta::setTitle($items->title);
        SEOMeta::setDescription(Str::limit(strip_tags($items->body),250));
        SEOMeta::addMeta('article:published_time', $items->created_at->toW3CString(), 'property');
        SEOMeta::addMeta('article:section', $items->category, 'property');
        SEOMeta::addKeyword($items->keyword);

        OpenGraph::setTitle($items->title);
        OpenGraph::setDescription(Str::limit(strip_tags($items->body),250));
        OpenGraph::setUrl('https://blog.okriiza.my.id/'.$items->slug);
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'id_ID');
        OpenGraph::addProperty('locale:alternate', [ 'en-us']);

        OpenGraph::addImage('https://blog.okriiza.my.id/'.$items->thumbnail);
        OpenGraph::addImage(['url' => 'https://blog.okriiza.my.id/'.$items->thumbnail, 'size' => 300]);
        OpenGraph::addImage('https://blog.okriiza.my.id/'.$items->thumbnail, ['height' => 300, 'width' => 300]);
        
        TwitterCard::setTitle($items->title);
        TwitterCard::setSite('@okriiza');

        JsonLd::setTitle($items->title);
        JsonLd::setDescription(Str::limit(strip_tags($items->body),250));
        JsonLd::setType('Article');
        JsonLd::addImage('https://blog.okriiza.my.id/'.$items->thumbnail);

        $recent = Article::limit(6)->orderBy('created_at','DESC')->get();
        $random = Article::inRandomOrder()->limit(6)->get();
        $category = Category::all();
        $post = Article::where('slug', '=', $slug)->first();
        $related = Article::whereHas('categories', function ($q) use ($post) {
            return $q->whereIn('name', $post->categories->pluck('name')); 
        })
        ->where('id', '!=', $post->id) // So you won't fetch same post
        ->simplePaginate(6);
        // dd($related);
        return view('pages.detail-post',[
            'items' => $items,
            'category' => $category,
            'related' => $related,
            'recent' => $recent,
            'random' =>$random
        ]);
    }
    public function category_post(Category $category){
        $category_tags = Category::all();
        $articles = $category->articles()->orderBy('created_at','DESC')->paginate(6);
        $name_category = $category;
        $recent = Article::limit(6)->orderBy('created_at','DESC')->get();
        $random = Article::inRandomOrder()->limit(6)->get();
        return view('pages.category-post',[
            'articles' => $articles,
            'category_tags' => $category_tags,
            'name_category' => $name_category,
            'recent' => $recent,
            'random' =>$random
        ]);
    }

    public function search(Request $request){
        $key = $request->get('keyword');
        $articles = Article::query()
            ->where('title', 'like', "%{$key}%")
            ->orWhere('body', 'like', "%{$key}%")
            ->orderBy('created_at', 'desc')
            ->pagination(6);
        $recent = Article::limit(6)->get();
        $random = Article::inRandomOrder()->limit(6)->get();
        $category_tags = Category::all();
        return view('pages.search', [
                'articles' => $articles,
                'key' => $key,
                'recent' => $recent,
                'random' =>$random,
                'category_tags' => $category_tags,
        ]);
    }
}
