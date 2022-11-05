@extends('layouts.main')

@section('title', "Lista de tarefas")

@section('content')


    <section class="container mt-2">
        <h2>Suas listas</h2>

        <div class="d-flex flex-wrap">
            @foreach($group_tasks as $group_task)
            <div class="card mt-2" style="width: 18rem; margin-right: 10px">
                <img src="/img/calendar.jpg" class="card-img-top" alt="imagem de um calendario">
                <div class="card-body">
                    <h3 class="card-title">{{date("D", strtotime($group_task[0]->data))}} - {{date("d/m/Y", strtotime($group_task[0]->data))}}</h3>
                    <p class="card-text">Veja suas tarefas para hoje</p>
                    <a href="tasks/list" class="btn btn-primary">Ver todas</a>
                </div>
            </div>
            @endforeach
        </div>
    </section>

@endsection