@extends('layout')
@section('title', 'Клиент: ' . "$client->name")
@section('body')
<div class="container alert alert-primary">
        <h1 class="text-dark">Клиент: {{$client->name}}</h1>
    <table class="table">
        <tr>
            <th>Имя</th>
            <th>Пол</th>
            <th>Номер</th>
            <th>Адрес</th>
            <th>Бренд авто</th>
        </tr>

        <tr>
            <td class="border">{{$client->name}}</td>
            <td class="border">{{$client->gender}}</td>
            <td class="border">{{$client->number}}</td>
            <td class="border">{{$client->address}}</td>
            <td class="border">{{$client->brand_auto}}</td>
        </tr>
    </table>
    <a href="{{route('update' , $client->id)}}"><button class="btn btn-success">Изменить</button></a>
    <a href="{{route('delete', $client->id)}}"><button class="btn btn-danger">Удалить</button></a>
</div>
<div class="container">
    <h1>Авто клиента:</h1>
    <a href="{{route('createAuto', $client->id)}}"><button class="btn btn-primary ">Создать авто</button></a>
    <table class="table">
        <tr>
            <th>Бренд</th>
            <th>Модель</th>
            <th>Цвет</th>
            <th>Гос.номер</th>
            <th>Статус</th>
            <th>Изменить</th>
            <th>Удалить</th>
        </tr>
        @foreach($cars as $car)
        <tr>
            <td class="border">{{$car->brand}}</td>
            <td class="border">{{$car->model}}</td>
            <td class="border">{{$car->color}}</td>
            <td class="border">{{$car->gos_number}}</td>
            <td class="border">{{$car->status}}</td>
            <td><a href="{{route('updateCar', $car->id)}}">Изменить</a></td>
            <td><a href="{{route('deleteCar', $car->id)}}">Удалить</a></td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
