<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request){

        return view('pages.admin.dashboard',[
            'artikel' => Article::count(),
            'project' => Project::count(),
            'categori' => Category::count(),
        ]);
    }
}
