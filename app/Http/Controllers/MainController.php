<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParkRequest;
use App\Models\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ContanctRequest;
use App\Http\Requests\AutoRequest;

class MainController extends Controller
{
    public function home(){
       $clients = DB::table('clients')->paginate(10);

        return view('home', ['clients' => $clients]);
    }

    public function create(){

        return view('create');
    }

    public function create_new(ContanctRequest $request) {

        DB::table('clients')->insert([
            'name'=>$request->name,
            'gender'=>$request->gender,
            'number'=>$request->number,
            'address'=>$request->address,
            'brand_auto'=>$request->brand_auto
        ]);



        return redirect()->route('home');
    }

    public function update($id){
        $client = DB::table('clients')->where('id', $id)->first();
        return view('update', ['client' => $client]);
    }

    public function delete($id){
        DB::table('clients')->where('id', $id)->delete();
        return redirect()->route('home');
    }

    public function update_new($id, ContanctRequest $request) {
       DB::table('clients')->where('id', $id)->update([
            'name'=>$request->name,
            'gender'=>$request->gender,
            'number'=>$request->number,
            'address'=>$request->address,
            'brand_auto'=>$request->brand_auto
        ]);
        return redirect()->route('home');
    }

    public function client($id){
        $client = DB::table('clients')->where('id', $id)->first();
        $cars = DB::table('cars')->where('client_id', $id)->get();
        return view('client', ['client' => $client], ['cars' => $cars]);
    }

    public function updateCar($id){
        $car = DB::table('cars')->where('id', $id)->first();
        return view('updateCar', ['car' => $car]);
    }

    public function updateCarNew($id, AutoRequest $request){
        DB::table('cars')->where('id', $id)->update([
            'brand' => $request->brand,
            'model' => $request->model,
            'color' => $request->color,
            'gos_number' => $request->gos_number,
            'status' => $request->status
        ]);
        $id = DB::table('cars')->where('id', $id)->first();

        $park = DB::table('parkings')->where('car_id', $request->id);
        if(isset($park)){
            DB::table('parkings')->where('car_id', $request->id)->update([
                'auto_number' => $request->gos_number,
                'status' => $request->status
            ]);
        }
        return redirect()->route('client', $id->client_id);
    }

    public function deleteCar($id){
        $cid = DB::table('cars')->where('id', $id)->first();
        $cid = $cid->client_id;
        DB::table('cars')->where('id', $id)->delete();

        return redirect()->route('client', $cid);
    }

    public function createAuto($id){
        $client = DB::table('clients')->where('id', $id)->first();
        return view('createAuto', ['client' => $client]);
    }

    public function createAutoNew($id, AutoRequest $request){
        DB::table('cars')->insert([
            'brand' => $request->brand,
            'model' => $request->model,
            'color' => $request->color,
            'gos_number' => $request->gos_number,
            'status' => $request->status,
            'client_id' => $request->client_id
        ]);

        return redirect()->route('client', $id);
    }

    public function parking(){
        $clients = DB::table('clients')->orderByRaw('name')->get();
        $parkings = DB::table('parkings')->paginate(4);
        $sum = DB::table('parkings')->where('status', 'На парковке')->count();
        return  view('parking', ['clients' => $clients], ['parkings' => $parkings])->with('sum', $sum);
    }

    public function content() {
        $post_client = $_POST['client'];
        echo $post_client;
        $cars = DB::table('cars')->where('client_id', $post_client)->get();
        echo '<option selected disabled">Авто</option>';
        foreach ($cars as $car) {
            echo '<option name="auto_number" value="'. $car->gos_number . '">' . $car->brand . '</option>' . '<input type="hidden" name="client_id" value=" '.$car->client_id.'">';
        }
    }

    public function contentTwo() {
        $post_number = $_POST['gos_number'];
        $car = DB::table('cars')->where('gos_number', $post_number)->get();
        foreach ($car as $el)
        echo '<input type="hidden" name="car_id" value="'.$el->id .'">';
    }

    public function parking_create(ParkRequest $request){
        $id = $request->client_id;
        $client = DB::table('clients')->where('id', $id)->first();
        DB::table('parkings')->insert([
            'name' => $client->name,
            'auto_number' => $request->auto_number,
            'status' => $request->status,
            'client_id' => $request->client_id,
            'car_id' => $request->car_id,
        ]);
        return redirect()->route('parking');
    }

    public function status(){
        $post = $_POST['status'];
        $status = DB::table('parkings')->where('id', $post)->first();
        $id = DB::table('parkings')->where('id', $post)->get();
        foreach ($id as $i)


        if ($status->status == 'На парковке') {
            DB::table('parkings')->where('id', $post)->update([
                'status' => 'Отсутствует'
            ]);
            DB::table('cars')->where('id', $i->car_id)->update([
                'status' => 'Отсутствует'
            ]);
            $status = DB::table('parkings')->where('id', $post)->first();
            echo '<button  value=" ' . $status->id . ' " class="btn btn-danger"> ' . $status->status . '</button>';
        }elseif($status->status == 'Отсутствует') {
            DB::table('parkings')->where('id', $post)->update([
                'status' => 'На парковке'
            ]);
            DB::table('cars')->where('id', $i->car_id)->update([
                'status' => 'На парковке'
            ]);
            $status = DB::table('parkings')->where('id', $post)->first();
            echo '<button value=" ' . $status->id . ' " class="btn btn-success"> ' . $status->status . '</button>';
        }

    }

}
