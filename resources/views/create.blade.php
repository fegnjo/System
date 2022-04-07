@extends('layout')
@section('title', 'Создание записи')
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
        <h1>Создание клиента:</h1>
        <form action="{{route('create_new')}}" method="post">
            @csrf
            <input type="text" name="name" id="name" class="form-control" placeholder="Введите имя клиента"><br>
            <input type="text" name="gender" id="gender" class="form-control" placeholder="Введите пол клиента"><br>
            <input type="text" name="number" id="number" class="form-control" placeholder="Введите номер клиента"><br>
            <input type="text" name="address" id="address" class="form-control" placeholder="Введите адрес клиента"><br>
            <input type="text" name="brand_auto" id="brand_auto" class="form-control" placeholder="Введите брэнд авто клиента"><br>
            <button class="btn btn-success">Создать</button>
        </form>
    </div>
@endsection
