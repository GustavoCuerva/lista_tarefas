<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;

class TaskController extends Controller
{

    public function index(){
        return view('welcome');
    }

    public function create(){
        return view('tasks.create');
    }

    public function list(){
        return view('tasks.list');
    }

    public function store(Request $request){
        $tasks = new Task;

        $tasks->name = $request->title;
        $tasks->description = $request->description;
        $tasks->data = $request->date;
        $tasks->hora = $request->hour;
        $tasks->urgency = $request->urgency;

        $tasks->save();

        return redirect('/tasks/create')->with('msg', 'Tarefa criada com sucesso');
    }
}
