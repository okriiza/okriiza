<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectCategoryRequest;
use App\Http\Requests\Admin\ProjectRequest;
use App\Models\Expertise;
use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Project::with('expertises')->get();
        return view('pages.admin.project.index',[
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
        $expertises = Expertise::get();
        return view('pages.admin.project.create',[
            'expertises' => $expertises
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
        request()->validate([
            'title' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif',
            'name' => 'required|array'
        ]);

        $projectdata = Project::create([
            'title' => request('title'),
            'slug' => Str::slug(request('title')),
            'image' =>  request('image') ? request()->file('image')->store('assets/project_image', 'public'): '',
        ]);

        $projectdata->expertises()->sync(request('name'));


        // $data_project = $projectrequest->all();
        // $data_project['image'] = $projectrequest->file('image')->store(
        //     'assets/project_image','public'
        // );
        // $project_data = Project::create($data_project);

        // $data_project_category = $projectCategoryrequest->all();
        // foreach ($projectCategoryrequest->name as $key => $value) {
        //     $data_project_category['project_id'] = $project_data->id;
        //     $data_project_category['name'] = $projectCategoryrequest->name[$key];
        //     ProjectCategory::create($data_project_category);
        // }
        return redirect()->route('project.index')->with('status', 'Data Berhasil Di Buat !');
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
        $items = Project::findOrFail($id);
        $expertises = Expertise::get();
        return view('pages.admin.project.edit',[
            'items' => $items,
            'expertises' => $expertises
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
            'title' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif',
            'name' => 'required|array'
        ]);
        $projectdata = Project::findOrFail($id);
        
        if (request('image')) {
            Storage::disk('public')->delete($projectdata->image);
            $projectimage = request()->file('image')->store('assets/project_image', 'public');
        } elseif($projectdata->image) {
            $projectimage = $projectdata->image;
        } else {
            $projectimage = null;
        }

        $projectdata->update([
            'title' => request('title'),
            'slug' => Str::slug(request('title')),
            'image' => $projectimage,
        ]);

        $projectdata->expertises()->sync(request('name'));



        // $get_project = Project::find($id);
        // $data_project = $projectrequest->all();
        // if ($projectrequest->File('image') == '') {
        //     $get_project->image = $projectrequest->image;
        //     $project_data = Project::with('project_category')->findOrFail($id);
        //     $project_data->update([
        //         'title' => $projectrequest->title
        //     ]);
        // } else{
        //     Storage::disk('public')->delete($get_project->image);
        //     $data_project['image'] = $projectrequest->file('image')->store(
        //         'assets/project_image','public'
        //     );
        //     $project_data = Project::with('project_category')->findOrFail($id);
        //     $project_data->update($data_project);
        // }
        

        // $data_project_category = $projectCategoryrequest->all();
        // foreach ($data_project_category['id'] as $key => $value) {
        //     $project_category_data = ProjectCategory::where('id', $projectCategoryrequest->id[$key]);
        //     $project_category_data->updateOrCreate([
        //         'project_id' => $id
        //     ],[
        //         'name' => $projectCategoryrequest->name[$key]
        //     ]);
        // }
        return redirect()->route('project.index')->with('status', 'Data Berhasil Di Update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Project::findOrFail($id);
        Storage::disk('public')->delete($data->image);
        $data->expertises()->detach();
        $data->delete();
        return redirect()->route('project.index')->with('status','Data Berhasil Di Hapus !');
    }
}
