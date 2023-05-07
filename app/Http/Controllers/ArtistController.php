<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArtistCollection;
use App\Http\Resources\ArtistResource;
use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArtistController extends Controller
{
    //GET
    //localhost:8000/api/artists
    //NO BODY

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return ArtistResource::collection(Artist::all());
        return new ArtistCollection(Artist::all());
    }


    //POST
    //localhost:8000/api/artists
    //BODY = Artist Model

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $artist = Artist::create($input);
        return response()->json([
            "success" => true,
            "message" => "Artist created successfully.",
            "data" => $artist
        ]);
    }

    //GET
    //localhost:8000/api/artists/{artistID}
    //NO BODY

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function show($artistID)
    {
        $artist = Artist::find($artistID);
        return is_null($artist) ? response()->json('Data not found', 404) : new ArtistResource($artist);
    }


    //DELETE
    //localhost:8000/api/artists/{artistID}
    //NO BODY

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer  $artistID
     * @return \Illuminate\Http\Response
     */
    public function destroy($artistID)
    {
        $artist = Artist::where('id', $artistID)->delete();
        return response()->json([
            "success" => true,
            "message" => "Artist deleted successfully.",
            "data" => $artist
        ]);
    }
}
