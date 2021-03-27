<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
// use Spatie\Analytics\Analytics;
use Spatie\Analytics\Period;
use Analytics;

class DashboardController extends Controller
{
    public function index(Request $request){

        $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days(7))->all();
        $popular = Analytics::fetchMostVisitedPages(Period::days(7), 6)->all();
        // dd($analyticsData);
        return view('pages.admin.dashboard',[
            'artikel' => Article::count(),
            'project' => Project::count(),
            'categori' => Category::count(),
            'analyticsData' => $analyticsData,
            'popular' => $popular
        ]);
    }
}
