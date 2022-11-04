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
        $tasks = Task::all();

        return view('tasks.list', ['tasks' => $tasks]);
    }

    public function show($id){
        $task = Task::findOrFail($id);

        return view('tasks.show', ['task' => $task]);
    }

    /* Salvar tarefa */
    public function store(Request $request){
        $tasks = new Task;

        $tasks->name = $request->title;
        $tasks->description = $request->description;
        $tasks->data = $request->date;
        $tasks->hora = $request->hour;
        $tasks->urgency = $request->urgency;
        $tasks->done = 0;

        $tasks->save();

        return redirect('/tasks/create')->with('msg', 'Tarefa criada com sucesso');
    }

    /* Tarefa feita */
    public function update(Request $request){
        
        Task::findOrFail($request->id)->update(['done' => $request->done]);

        $msg = 'Tarefa feita com sucesso';

        if ($request->done == 0) {
            $msg = 'Tarefa desfeita com sucesso';
        }

        return redirect('/tasks/list')->with('msg', $msg);

    }
}
