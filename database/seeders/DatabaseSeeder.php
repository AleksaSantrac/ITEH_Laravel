<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Artist;
use Illuminate\Database\Seeder;
use App\Models\Song;
use App\Models\Genre;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        User::truncate();
        Genre::truncate();
        Artist::truncate();
        Song::truncate();

        User::factory(10)->create();

        Genre::insert([
            [
                "name" => "Pop",
                "city" => "New York",
                "description" => "Pop is short of popular music with fun beats and catchy melodies."
            ],
            [
                "name" => "Rap",
                "city" => "Detroit",
                "description" => "Rap has fast tempo and interesting lyrics"
            ],
            [
                "name" => "Metal",
                "city" => "London",
                "description" => "Heavy metal is a genre with loud electric guitars and screaming vocals"
            ]
        ]);

        Artist::insert([
            [
                "name" => "Eminem",
                "age" => 45,
                "is_alive" => true,
                "history" => "Eminem also known as Slim Shady is the most famous white rapper in human history.",
                "popularity" => 24.75
            ],
            [
                "name" => "Ariana Grande",
                "age" => 26,
                "is_alive" => true,
                "history" => "Ariana Grande used to be also an actor in many TV Shows and movies.",
                "popularity" => 25.5
            ]
        ]);


        $song_1 = new Song;
        $song_1->title = "Superman";
        $song_1->description = "Written by Eminem, Jeff Bass and Steve King, the song was released as the third single from The Eminem Show on January 14, 2003";
        $song_1->length = 321;
        $song_1->rating = 125;
        $song_1->genre_id = 1;
        $song_1->artist_id = 1;
        $song_1->save();

        Song::create([
            "title" => "Into you",
            "description" => "It is a dance-pop, house, electro, and EDM song that features a club beat, synths, and sharp clicks. The song is about Grande's desire for her partner to show.",
            "length" => 320,
            "rating" => 90,
            "genre_id" => 2,
            "artist_id" => 2
        ]);

        Song::create([
            "title" => "Rap God",
            "description" => "“Rap God” is Eminem's braggadocious ode to himself and his career. Over its six-minute run-time, he references comic books, throws back to his old songs.",
            "length" => 420,
            "rating" => 99,
            "genre_id" => 1,
            "artist_id" => 1
        ]);


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
