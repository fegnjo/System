@extends('layout')
@section('title', 'Создание авто')
@section('body')
    @if($errors->any())
        <div class="alert alert-danger container">
            <ul>
                @foreach($errors->all() as $error)
                    <li style="list-style-type: none">{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <h1>Создание автомобиля:</h1>
        <form action="{{route('createAutoNew', $client->id)}}" method="post">
            @csrf
            <input type="text" name="brand" id="brand" class="form-control" placeholder="Введите бренд"><br>
            <input type="text" name="model" id="model" class="form-control" placeholder="Введите модель"><br>
            <input type="text" name="color" id="color" class="form-control" placeholder="Введите цвет кузова"><br>
            <input type="text" name="gos_number" id="gos_number" class="form-control" placeholder="Введите гос.номер"><br>
            <select name="status" id="status" class="form-control">
                <option selected disabled>Выберите статус</option>
                <option>На парковке</option>
                <option>Отсутствует</option>
            </select>
            <input type="hidden" name="client_id" id="client_id" value="{{$client->id}}" class="form-control" placeholder="Укажите статус"><br>
            <button class="btn btn-success">Создать</button>
        </form>
    </div>
@endsection
