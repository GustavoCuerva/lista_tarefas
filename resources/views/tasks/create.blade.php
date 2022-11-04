@extends('layouts.main')

@section('title', 'Criar tarefa')

@section('content')

    @php
        $title = "";
        $date = "";
        $hour = "";
        $descripton = "";
        $urgency = "";
        $btn = "Criar";
        $action = "/tasks";
        $method = "";

        if(isset($task)){
            $title = $task->name;
            $date = $task->data;
            $hour = $task->hora;
            $descripton = $task->description;
            $urgency = $task->urgency;
            $btn = "Editar";
            $action = "/tasks/update/{$task->id}";
        }
    @endphp

    <section class="container">
        <div class="col-md-6 offset-md-3 mt-5 mb-5 form">
            <h2 class="title-form">Crie uma tarefa</h2>
            <form action="{{$action}}" method="POST">
                @csrf
                @if(isset($task))
                @method('PUT')
                @endif
                <div class="form-group">
                    <label for="name">Tarefa:</label>
                    <input type="text" class="form-control" id="title" name="name" placeholder="Nome da tarefa" value="{{$title}}" required>
                </div>
                
                <div class="form-group">
                    <label for="data">Data:</label>
                    <input type="date" class="form-control" id="date" name="data" value="{{$date}}" required>
                </div>

                <div class="form-group">
                    <label for="hora">Hora:</label>
                    <input type="time" class="form-control" id="hour" name="hora" value="{{$hour}}" required>
                </div>

                <div class="form-group">
                    <label for="description">Descrição:</label>
                    <textarea name="description" id="description" class="form-control" placeholder="Descreva a tarefa" required>{{$descripton}}</textarea>
                </div>

                <div class="form-group">
                    <label for="urgency">Urgencia:</label>
                    <select class="form-control" id="urgency" name="urgency" required>
                        <option value="Baixa" {{$urgency == 'Baixa' ? 'selected' : ""}}>Baixa</option>
                        <option value="Média" {{$urgency == 'Média' ? 'selected' : ""}}>Média</option>
                        <option value="Alta" {{$urgency == 'Alta' ? 'selected' : ""}}>Alta</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="{{$btn}} tarefa">
                </div>
            </form>
        </div>
    </section>

@endsection