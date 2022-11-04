@extends('layouts.main')

@section('title', 'Listar tarefas')

@section('content')

    <section class="container tabela">
        <h1>Listar Tarefas</h1>

        @if(count($tasks) > 0)
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tarefa</th>
                    <th scope="col">Data</th>
                    <th scope="col">hora</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Feita</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td scropt="row">{{ $loop->index + 1 }}</td>
                        <td scropt="row"><a href="/tasks/{{$task->id}}">{{ $task->name }}</a></td>
                        <td scropt="row">{{ date("d/m/y", strtotime($task->data)) }}</td>
                        <td scropt="row">{{ date("H:i", strtotime($task->hora)) }}</td>
                        <td scropt="row">{{ $task->description }}</td>
                        <td scropt="row" class="input_done"><input type="checkbox" name="done" id="done" {{ $task->done == 1 ? 'checked' : '' }} disabled></td>
                        <td scropt="row" style="text-align: center;"><a href="/tasks/edit/{{$task->id}}" class="btn btn-primary">Editar</a> <a href="" class='btn btn-danger'>Excluir</a></td>
                    </tr>
                @endforeach    
            </tbody>
        </table>
        @else
        <div style="text-align: center;">
            <h3>Sem registros</h3>
        </div>
        @endif

    </section>
@endsection