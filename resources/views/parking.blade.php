@extends('layout')
@section('title', 'Машины на парковке')
@section('body')

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li style="list-style-type: none">{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <h1>Добавить автомобиль на парковку</h1>
        <form action="{{route('parking_create')}}" class="form-control" method="post">
            @csrf
            <h3>Клент:</h3>
            <select name="client_id" class="form-control" id="select-client">
                <option selected disabled>Клиент</option>
                @foreach($clients as $client)
                   <option  value="{{ $client->id }}">{{$client->name}}</option>
                @endforeach
           </select>

           <h3>Автомобиль:</h3>
           <select  name="auto_number" class="form-control mt-2" id="select-car">
               <option selected disabled>Авто</option>
           </select>
           <h3>Статус:</h3>
           <select  name="status" class="form-control mt-2" id="select-car">
               <option>На парковке</option>
               <option>Отсутствует</option>
           </select><br>
           <button class="btn btn-success">Добавить клиента на парковку</button>
            <div class="car_id">
                <input type="hidden">
            </div>
       </form><br>


   </div><br>

   <div class="container ">
       <table  class="table">
           <tr>
               <th>Имя</th>
               <th>Номер автомобиля</th>
               <th>Статус</th>
           </tr>
           @foreach($parkings as $parking)
           <tr>
               <td>{{$parking->name}}</td>
               <td>{{$parking->auto_number}}</td>

               <td>
                   @if($parking->status == 'На парковке')
                   <li class="{{$parking->id}} text-decoration-none" style="list-style-type: none" value="{{$parking->id}}"><button  class="btn btn-success">{{$parking->status}}</button></li>
                   @else
                       <li class="{{$parking->id}}" style="list-style-type: none" value="{{$parking->id}}" ><button  class="btn btn-danger">{{$parking->status}}</button></li>
                   @endif
               </td>
           </tr>

               <script>
                   $(".{{$parking->id}}").on('click', function () {
                       $.ajax({
                           url: "{{route('status')}}",
                           method: "post",
                           data: {status: $(this).val()},
                           headers: {
                               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                           },
                           success: function (data) {
                               $('.{{$parking->id}}').html(data);
                               console.log(data);
                           }
                       });
                   });
               </script>
           @endforeach

           <h1>Количество автомобилей на стоянке:{{$sum}} </h1>

       </table>
       <div>{{$parkings->links()}}</div>
   </div>
   <script>
       $("#select-client").on("change", function () {
           $.ajax({
               url: "{{route('content')}}",
               method: "post",
               data: {client: $(this).val()},
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               success: function (data) {
                   $('#select-car').html(data);
                   console.log(data);
               }
           });
       });
   </script>


    <script>
        $('#select-car').on('change', function(){
            $.ajax({
                url: "{{route('contentTwo')}}",
                method: 'post',
                data: {gos_number: $(this).val()},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    $('.car_id').html(data)
                    console.log(data);
                }
                });
        });
    </script>


@endsection

