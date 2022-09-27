<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actor;
use App\Requests\ActorRequest;
use Illuminate\Support\Facades\Validator;

use App\Http\Resources\ActorResource;
use App\Http\Resources\ActorCollection;

class actorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json( new ActorCollection(Actor::all())  , 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActorRequest $request , $id)
    {
        $actor = new Actor();
        $actor->first_name = $request->first_name;
        $actor->save();

        return response()->json([
            "seccess" => true,
            "data" => $actor
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
                                    "data" => new ActorResource (Actor::find($id))
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
        $actor = Actor::find($id);

        $actor->update(
            $request->all()
        );

        return response()->json(["success" => true , 
                                "data" => $actor
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
        $actor = Actor::find($id);

        $actor->delete();

        return response()->json( [  "success" => true,
                                     "messege" => "Actor eliminado",
                                     "data" => $actor->id
                                 ], 200 );
    }
}
