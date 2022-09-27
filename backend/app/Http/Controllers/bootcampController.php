<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bootcamp;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreBootcampRequest;

use App\Http\Resources\BootcampResource;
use App\Http\Resources\BootcampCollection;

class bootcampController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //echo "aqui se va a mostrar todos los bootcamp";
        //return Bootcamp::all();
        return response()->json( new BootcampCollection(Bootcamp::all())  , 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBootcampRequest $request)
    {
        //REGISTRAR EL BOOTCAMP A PARTIR
        //DEL PAILOAD

        $b = Bootcamp::create(
            $request->all()
        );

        return response(["success" => true ,
                        "data" => $b] , 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //echo "mostrar un bootcamp cuyo id es: $id";
        return response()->json([ "seccess" => true,
                                    "data" => new BootcampResource (Bootcamp::find($id))
                                ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 1. SELECCIONAR EL BOOTCAMP POR ID
        $bootcamp = Bootcamp::find($id);

        // 2. ACTUALIZARLO
        $bootcamp->update(
            $request->all()
        );

        // 3. HACER EL RESPONSE RESPECTIVO
        return response()->json(["success" => true , 
                                "data" => new BootcampResource($bootcamp)
                                ] ,200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 1. SELECCIONAS EL BOOTCAMP
        $bootcamp = Bootcamp::find($id);
        
        // 2. ELIMINAR ESE BOOTCAMP
        $bootcamp->delete();

        // 3. RESPONSE:
        return response()->json( [  "success" => true,
                                    "messege" => "Bootcamp eliminado",
                                    "data" => new BootcampResource($bootcamp->id)
                                ], 200 );

    }
}
