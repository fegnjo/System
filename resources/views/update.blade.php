@extends('layout')
@section('title', 'Изменение записи')
@section('body')

    @if($errors->any())
    <div class="container alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li style="list-style-type: none">{{$error}}</li>
                @endforeach
            </ul>
        @endif

    </div>
    <div class="container">
        <h1>Изменение записи клиента:</h1>
        <form action="{{route('update_new', $client->id)}}" method="post">
            @csrf
            <input type="text" name="name" id="name" value="{{$client->name}}" class="form-control" placeholder="Введите имя клиента"><br>
            <input type="text" name="gender" id="name" value="{{$client->gender}}" class="form-control" placeholder="Введите пол клиента"><br>
            <input type="text" name="number" id="name" value="{{$client->number}}" class="form-control" placeholder="Введите номер клиента"><br>
            <input type="text" name="address" id="name" value="{{$client->address}}" class="form-control" placeholder="Введите адрес клиента"><br>
            <input type="text" name="brand_auto" id="name" value="{{$client->brand_auto}}" class="form-control" placeholder="Введите брэнд авто клиента"><br>
            <button class="btn btn-success">Изменить</button>
        </form>
    </div>
@endsection
