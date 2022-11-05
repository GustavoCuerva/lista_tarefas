<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;

class TaskController extends Controller
{

    public function index(){

        $id = auth()->user()->id;

        $tasks = Task::where('user_id', $id)->get();
        $group_tasks = $tasks->groupBy('data');

        return view('welcome', ['group_tasks' => $group_tasks]);
    }

    public function create(){
        return view('tasks.create');
    }

    public function list(){
        $id = auth()->user()->id;

        $tasks = Task::where('user_id', $id)->orderBy('done', "asc")->orderBy('data', "asc")->orderBy('hora')->get();

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

    public function edit($id){
        $task = Task::findorFail($id);

        $user_id = auth()->user()->id;

        if ($user_id != $task->user_id) {
            return redirect('/tasks/list');
        }

        return view('tasks.create', ['task' => $task]);
    }

    /* Salvar tarefa */
    public function store(Request $request){
        $tasks = new Task;

        $tasks->name = $request->name;
        $tasks->description = $request->description;
        $tasks->data = $request->data;
        $tasks->hora = $request->hora;
        $tasks->urgency = $request->urgency;
        $tasks->done = 0;

        $user = auth()->user();

        $tasks->user_id = $user->id;

        $tasks->save();

        return redirect('/tasks/list')->with('msg', 'Tarefa criada com sucesso');
    }

    /* Tarefa feita */
    public function updateDone(Request $request){
        
        Task::findOrFail($request->id)->update($request->all());

        $msg = 'Tarefa feita com sucesso';

        if ($request->done == 0) {
            $msg = 'Tarefa desfeita com sucesso';
        }

        return redirect('/tasks/list')->with('msg', $msg);

    }

    /* Edita tarefa */
    public function update(Request $request){

        $user_id = auth()->user()->id;
        $task_user = Task::findOrFail($request->id);

        if ($user_id != $task_user->user_id) {
            return redirect('/tasks/list');
        }

        Task::findOrFail($request->id)->update($request->all());

        return redirect('/tasks/list')->with('msg', 'Tarefa editada com sucesso');
    }

    /* Deletando tarefa */

    public function destroy($id){

        $task = Task::findOrFail($id);
        $user_id = auth()->user()->id;

        if ($task->user_id != $user_id) {
            return redirect('/tasks/list');
        }

        $task->delete();

        return redirect('/tasks/list')->with('msg', 'Tarefa excluida com sucesso');

    }
}
