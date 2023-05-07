<?php

namespace App\Http\Controllers;

use App\Http\Resources\SongCollection;
use App\Http\Resources\SongResource;
use App\Models\Song;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SongController extends Controller
{
    //GET
    //localhost:8000/api/songs
    //NO BODY

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return SongResource::collection(Song::all());
        return new SongCollection(Song::all());
    }

    //GET
    //localhost:8000/api/songs/{songID}
    //NO BODY

    /**
     * Display the specified resource.
     *
     * @param  integer  $songID
     * @return \Illuminate\Http\Response
     */
    public function show($songID)
    {
        $song = Song::find($songID);
        return is_null($song) ? response()->json('Data not found', 404) : new SongResource($song);
    }


    //DELETE
    //localhost:8000/api/songs/{songID}
    //NO BODY

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer  $songID
     * @return \Illuminate\Http\Response
     */
    public function destroy($songID)
    {
        $song = Song::where('id', $songID)->delete();
        return response()->json([
            "success" => true,
            "message" => "Song deleted successfully.",
            "data" => $song
        ]);
    }
}
