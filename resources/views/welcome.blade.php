@extends('layouts.main')

@section('title', "Lista de tarefas")

@section('content')


    <section class="container_listas mt-2 mb-5">
        <h2>Suas próximas listas</h2>

        <div class="d-flex flex-wrap">
            @foreach($group_tasks as $group_task)
            <div class="card mt-2" style="width: 18rem; margin-right: 10px">
                <img src="/img/calendar.jpg" class="card-img-top" alt="imagem de um calendario">
                <div class="card-body">
                    <h3 class="card-title">{{$semana[date("D", strtotime($group_task[0]->data))]}} - {{date("d/m/Y", strtotime($group_task[0]->data))}}</h3>
                    <p class="card-text">Veja suas tarefas para hoje</p>
                    <a href="tasks/list/{{$group_task[0]->data}}" class="btn btn-primary">Ver todas</a>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <section class="container_listas mt-2 mb-5">
        <h2>Todas listas</h2>

        <div class="d-flex flex-wrap">
            @foreach($group_tasks_all as $group_task_all)
            <div class="card mt-2" style="width: 18rem; margin-right: 10px">
                <div class="card-body">
                    <h3 class="card-title">{{$semana[date("D", strtotime($group_task_all[0]->data))]}} - {{date("d/m/Y", strtotime($group_task_all[0]->data))}}</h3>
                    <p class="card-text">Veja suas tarefas para hoje</p>
                    <a href="tasks/list/{{$group_task_all[0]->data}}" class="btn btn-primary">Ver todas</a>
                </div>
            </div>
            @endforeach
        </div>
    </section>

@endsection