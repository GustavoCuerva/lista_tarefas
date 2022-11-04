@extends('layouts.main')

@section('title', 'Tarefa - '.$task->name)

@section('content')

    <section class="center">
        <div class="container card m-auto card-task" style="width:500px;">
            
            <div class="card-body task-title">
                <h1 class="card-title">{{ $task->name }}</h1>
            </div>

            <div class="card-body">
                <p>{{ $task->description }}</p>
                <p>{{ date("d/m/Y", strtotime($task->data)) }} - {{ date("H:i", strtotime($task->hora)) }}</p>
                <p>{{ $task->urgency }}</p>

                <form action="/tasks/updateDone/{{$task->id}}" method="post">
                    @csrf
                    @method('PUT')

                    @if($task->done == 1)
                        <p><strong>Status: </strong> Concluida</p>
                        <input type="hidden" name="done" value="0">
                        <input type="submit" class="btn btn-primary" style="background-color: red; border: none;" value="Desfazer">
                    @else
                        <p><strong>Status: </strong> Pendente</p>
                        <input type="hidden" name="done" value="1">
                        <input type="submit" class="btn btn-primary" value="Feito">
                    @endif

                </form>
                
            </div>
        </div>
    </section>

@endsection