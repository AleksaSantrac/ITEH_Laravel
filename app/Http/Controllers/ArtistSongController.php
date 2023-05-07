<?php

namespace App\Http\Controllers;

use App\Http\Resources\SongCollection;
use App\Models\Song;
use Illuminate\Http\Request;

class ArtistSongController extends Controller
{
    public function index($artistID)
    {
        $songs = Song::get()->where('artist_id', $artistID);
        if(is_null($songs)) {
            return response()->json('Data not found', 404);
        }
        return new SongCollection($songs);
    }
}
