<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Requests\CategoriaRequest;
use Illuminate\Support\Facades\Validator;

use App\Http\Resources\CategoriaResource;
use App\Http\Resources\CategoriaCollection;

class categoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json( new CategoriaCollection(Categoria::all())  , 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaRequest $request, $id)
    {
        $categoria = new Categoria();
        $categoria->name = $request->name;
        $categoria->save();

        return response()->json([
            "seccess" => true,
            "data" => $categoria
        ] , 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json([ "seccess" => true,
                                    "data" => new CategoriaResource (Categoria::find($id))
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
        $categoria = Categoria::find($id);

        $categoria->update(
            $request->all()
        );

        return response()->json(["success" => true , 
                                "data" => $categoria
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
        $categoria = Categoria::find($id);

        $categoria->delete();

        return response()->json( [  "success" => true,
                                     "messege" => "Categoria eliminada",
                                     "data" => $categoria->id
                                 ], 200 );
    }
}
