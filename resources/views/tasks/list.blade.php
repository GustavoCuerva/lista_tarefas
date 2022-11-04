@extends('layouts.main')

@section('title', 'Listar tarefas')

@section('content')

    <section class="container tabela">
        <h1>Listar Tarefas</h1>

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
                        <td scropt="row">{{ $task->done }}</td>
                        <td scropt="row"><a href="">Editar</a> <a href="">Excluir</a></td>
                    </tr>
                @endforeach    
            </tbody>
        </table>
    </section>
@endsection