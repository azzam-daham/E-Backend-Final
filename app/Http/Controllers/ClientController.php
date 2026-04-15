<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Resources\ClientRecource;
use App\Http\Requests\Clients\PostClientRequest;
use App\Http\Requests\Clients\UpdateClientRequest;

class ClientController extends Controller
{
    public function index(){
        $perPage = request('per_page');
        // $search = request('search');
        // $clients = Client::where('name', 'like', '%'.$search.'%')->get();
        $name = request('name');
        $address = request('address');
        $email = request('email');
        $address = request('address');

        $query = Client::query();

        if($name){
            $query->where('name', 'like', '%' . $name . '%');
        }

        if($email){
            $query->where('email', 'like', '%' . $email . '%');
        }

        if($address){
            $query->where('address', 'like', '%' . $address . '%');
        }
        $clients = $query->paginate(5);


        // $age = request('age');

        // $clients = Client::where('age', '>', $age)
        //             ->where('name', 'like', '%' . $name . '%')
        //             ->whereIn('address', $address)
        //             ->get();
        // $clients = Client::orderBy('age', 'desc')
        //             ->orderBy('name', 'desc')
        //             ->orderBy('address', 'desc')
        //             ->get();

        // $clients = Client::where('name', 'like', '%'. $name. '%')
        //             ->where('address', 'like', '%'. $address. '%')
        //             ->orderBy('age', 'desc')
        //             ->paginate(5)
        // ;
        
        return ClientRecource::collection($clients);
    }

    public function store(PostClientRequest $request){
        $data = $request;
        $client = Client::create([
            "name"=>$data->name,
            "mobile"=>$data->mobile,
            "address"=>$data->address,
            "email"=>$data->email,
        ]);
        
        return ClientRecource::make($client);
    }

    public function show($id){
        $client = Client::find($id);
        
        return ClientRecource::make($client);
    }

    public function destroy($id){
        $client = Client::find($id);
        if (!$client){
            return response()->json(['data'=> 'Client Not Found'], 404);
        }
        $client->delete();
        return response()->json(['data'=>'Done Delete']);
    }

    public function update(UpdateClientRequest $request ,$id){
        $client= Client::find($id);
        if (!$client){
            return respones()->json(['data'=> "Client Not "]);
        }
        $data = $request->validated();
       $client->update($data);
       return ClientRecource::make($client);
    }
}