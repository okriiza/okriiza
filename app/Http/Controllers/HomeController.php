<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Expertise;
use App\Models\Project;
use Illuminate\Http\Request;
use Analytics;
use Spatie\Analytics\Period;

class HomeController extends Controller
{
    public function index(Request $request){
        $artikel_data = Article::with(['categories'])->orderBy('created_at','DESC')->limit(3)->get();
        $expertise_data = Expertise::with('projects')->get();
        $project_data = Project::paginate(6);
        return view('pages.home',[
            'artikel_data' => $artikel_data,
            'project_data' => $project_data,
            'expertise_data' => $expertise_data
        ]);
    }
}
