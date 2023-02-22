<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Dotenv\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public $validator = [
        "title" => "required|unique:Projects|string|min:2|max:100",
        "url" => "required|url",
        "date" => "required|date",
        "preview_img" => "nullable|url",
        "difficulty" => "required|numeric|between:1,10",
        "tecnologies" => "required|string|max:255",
    ];

    public $errorMessage = [
        "title.required" => 'Inserire un titolo',
        "title.unique" => 'Il titolo è già stato usato! Inserisci un titolo diverso',
        "title.string" => 'Il campo deve contenere una stringa',
        "title.min" => 'Inserisci almeno due caratteri',
        "title.max" => 'Limite di carettiri superato (100)',



        "url.required" => 'Inserire un URL',
        "url.url" => 'URL non valido',


        "date.required" => 'Inserire una data',
        "date.date" => 'Data non valida o scritta non correttamente',

        "preview_img.url" => 'URL non valido',

        "difficulty.required" => 'Inserire la difficoltà dell\'esercizio',
        "difficulty.numeric" => 'Il campo può contenere sono numeri',
        "difficulty.between" => 'Il numero deve essere compreso tra 1 e 10',



        "tecnologies.required" => 'Inserire la lista di tecnologie usate',
        "tecnologies.string" => 'Il campo deve contenere una stringa',
        "tecnologies.string.max" => 'Limite di carettiri superato (255)',

    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projectList = Project::paginate(8);
        return view('admin.project.index', compact('projectList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.project.create', ["project" => new Project()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->validator, $this->errorMessage);

        $newProject = new Project();
        $newProject->fill($data);
        $newProject->save();

        return redirect()->route('admin.projects.index', compact('newProject'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $rules = $this->validator;
        $rules['title'] = ['required', 'string', 'min:1', 'max:100', Rule::unique('projects')->ignore($project->id)];

        $editData = $request->validate($rules, $this->errorMessage);

        $project->update($editData);

        return redirect()->route('admin.projects.index', compact('project'))->with('message', 'Project has been modified')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', 'Project has been delete')->with('type', 'warning');
    }

    // Trash Route

    public function trash()
    {
        $projectList = Project::onlyTrashed()->get();
        return view('admin.project.trash', compact('projectList'));
    }


    /**
     * Returns the restored item
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        Project::where('id', $id)->withTrashed()->restore();
        return redirect()->route('admin.projects.index')->with('message', 'Project has been restored')->with('type', 'success');
    }
}
