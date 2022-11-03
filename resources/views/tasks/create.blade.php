@extends('layouts.main')

@section('title', 'Criar tarefa')

@section('content')

    <section class="container">
        <div class="col-md-6 offset-md-3 mt-5 mb-5 form">
            <h2 class="title-form">Crie uma tarefa</h2>
            <form action="/tasks" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Tarefa:</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Nome da tarefa" required>
                </div>
                
                <div class="form-group">
                    <label for="date">Data:</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>

                <div class="form-group">
                    <label for="hour">Hora:</label>
                    <input type="time" class="form-control" id="hour" name="hour" required>
                </div>

                <div class="form-group">
                    <label for="description">Descrição:</label>
                    <textarea name="description" id="description" class="form-control" placeholder="Descreva a tarefa" required></textarea>
                </div>

                <div class="form-group">
                    <label for="urgency">Urgencia:</label>
                    <select class="form-control" id="urgency" name="urgency" required>
                        <option value="Baixa">Baixa</option>
                        <option value="Média">Média</option>
                        <option value="Alta">Alta</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="cadastrar" id="cadastrar" value="Criar tarefa">
                </div>
            </form>
        </div>
    </section>

@endsection