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
        $id = auth()->user()->id;

        $tasks = Task::all()->where('user_id', $id);

        return view('tasks.list', ['tasks' => $tasks]);
    }

    public function show($id){

        $user_id = auth()->user()->id;

        $task = Task::findOrFail($id);

        if ($user_id != $task->user_id) {
            return redirect('tasks/list');
        }

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

        $user = auth()->user();

        $tasks->user_id = $user->id;

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
