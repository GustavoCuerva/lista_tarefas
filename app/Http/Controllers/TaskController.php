<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;

class TaskController extends Controller
{

    public function index(){

        $dia_semana = array(
            'Sun' => 'Domingo', 
            'Mon' => 'Segunda-Feira',
            'Tue' => 'Terca-Feira',
            'Wed' => 'Quarta-Feira',
            'Thu' => 'Quinta-Feira',
            'Fri' => 'Sexta-Feira',
            'Sat' => 'Sábado'
        );

        $id = auth()->user()->id;
        $hoje = date("Y-m-d");
        $semana = date("Y-m-d", 60*60*24*8+ strtotime($hoje));

        // Próximas tarefas
        $tasks = Task::where('user_id', $id)
                ->where('data', ">=" , $hoje)
                ->where('data', "<" , $semana)
                ->orderBy('data', "asc")
                ->get();
        $group_tasks = $tasks->groupBy('data');

        // Próximas tarefas
        $tasks_all = Task::where('user_id', $id)
                ->orderBy('data', "desc")
                ->get();
        $group_tasks_all = $tasks_all->groupBy('data');
        
        return view('welcome', ['group_tasks' => $group_tasks, 'group_tasks_all' => $group_tasks_all, 'semana' => $dia_semana]);
    }

    public function create(){
        return view('tasks.create');
    }

    public function list(){
        $id = auth()->user()->id;
        $hoje = date("Y-m-d");
        
        $search = request('search');

        if ($search) {
            // Existe uma busca
            $tasks = Task::where('user_id', $id)
                    ->where('name', 'LIKE', '%'.$search.'%')
                    ->where('data', '>=', $hoje)
                    ->orderBy('done', "asc")
                    ->orderBy('data', "asc")
                    ->orderBy('hora')
                    ->get();

            $tasks_anteriores = Task::where('user_id', $id)
                                ->where('name', 'LIKE', '%'.$search.'%')
                                ->where('data', '<', $hoje)
                                ->orderBy('done', "asc")
                                ->orderBy('data', "asc")
                                ->orderBy('hora')
                                ->get();
            
        }else{
            $tasks = Task::where('user_id', $id)
                    ->where('data', '>=', $hoje)
                    ->orderBy('done', "asc")
                    ->orderBy('data', "asc")
                    ->orderBy('hora')
                    ->get();

            $tasks_anteriores = Task::where('user_id', $id)
                                ->where('data', '<', $hoje)
                                ->orderBy('done', "asc")
                                ->orderBy('data', "asc")
                                ->orderBy('hora')
                                ->get();
        }

        return view('tasks.list', ['tasks' => $tasks, 'tasks_anteriores' => $tasks_anteriores]);
    }

    public function list_filter($data){
        $id = auth()->user()->id;
        $tasks = Task::where('user_id', $id)
                    ->where('data', $data)
                    ->orderBy('done', "asc")
                    ->orderBy('data', "asc")
                    ->orderBy('hora')
                    ->get();

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

    public function fallback(){
        return view('fall');
    }
}
