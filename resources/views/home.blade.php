@extends('layout')
@section('title', 'Главная')
@section('body')

    <div class="container">
        <table class="table border" >
            <tr>
                <th>ФИО</th>
                <th>Пол</th>
                <th>Адрес</th>
                <th>Номер</th>
                <th>Бренд авто</th>
                <th>Изменить</th>
                <th>Удалить</th>
            </tr>

            @foreach($clients as $client)
            <tr>
                <td class="border"><a class="text-decoration-none " href="{{route ('client', $client->id)}}">{{$client->name}}</a></td>
                <td class="border">{{$client->gender}}</td>
                <td class="border">{{$client->number}}</td>
                <td class="border">{{$client->address}}</td>
                <td class="border">{{$client->brand_auto}}</td>
                <td class="border"><a href="{{route('update' , $client->id)}}"><img src="{{asset('/image/update.png')}}" alt="Изменить"></a></td>
                <td class="border"><a href="{{route('delete', $client->id)}}"><img src="{{asset('/image/delete.png')}}" alt="Удалить"></a></td>
            </tr>
            @endforeach
        </table>
        <div>{{$clients->links()}}</div>
    </div>
@endsection
