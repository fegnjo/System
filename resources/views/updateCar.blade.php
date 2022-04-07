@extends('layout')
@section('title', 'Измение записи')
@section('body')


    @if($errors->any())
        <div class="alert alert-danger container" >
            <ul>
                @foreach($errors->all() as $error)
                    <li style="list-style-type: none">{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <h1>Изменение автомобиля:</h1>
        <form action="{{route('updateCarNew', $car->id)}}" method="post">
            @csrf
            <input type="text" class="form-control" name="brand" value="{{$car->brand}}">
            <input type="text" class="form-control" name="model" value="{{$car->model}}">
            <input type="text" class="form-control" name="color" value="{{$car->color}}">
            <input type="text" class="form-control" name="gos_number" value="{{$car->gos_number}}">
            <select name="status" id="status" class="form-control">
                <option selected disabled>{{$car->status}}</option>
                <option>На парковке</option>
                <option>Отсутствует</option>
            </select>
            <button class="btn btn-success">Изменить авто</button>
        </form>
    </div>
@endsection
