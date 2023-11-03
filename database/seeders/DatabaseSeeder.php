<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->users();
        $this->categories();
        $this->articles();
        $this->rooms();
        /* $this->roomsAugust();
        $this->roomsSeptember();
        $this->roomsJanuary(); */

        $this->roomsMonths();
    }

    private function users()
    {
        $user = \App\Models\User::create([
            'is_admin' => 1,
            'is_revisor' => 1,
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => \Illuminate\Support\Facades\Hash::make('12345678')
        ]);

        $user = \App\Models\User::create([
            'is_revisor' => 1,
            'name' => 'Blogger',
            'email' => 'blogger@example.com',
            'password' => \Illuminate\Support\Facades\Hash::make('12345678')
        ]);

        $user = \App\Models\User::create([
            'name' => 'User1',
            'email' => 'user1@example.com',
            'password' => \Illuminate\Support\Facades\Hash::make('12345678')
        ]);
        $user = \App\Models\User::create([
            'name' => 'User2',
            'email' => 'user2@example.com',
            'password' => \Illuminate\Support\Facades\Hash::make('12345678')
        ]);
    }

    private function categories()
    {
    }

    private function articles()
    {
        $article = \App\Models\Article::create([
            'user_id' => '1',
            'category_id' => '2',
            'title' => 'Article #1',
            'description' => 'Lorem ipsum dolor sit amet consectetur elit',
            'image' => 'public/images/1/img_article.jpg',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
        ]);
        $article->save();

        $article = \App\Models\Article::create([
            'user_id' => '2',
            'category_id' => '1',
            'title' => 'Article #2',
            'description' => 'Lorem ipsum dolor sit amet consectetur elit',
            'image' => 'public/images/2/img_article.jpg',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
        ]);
        $article->save();

        $article = \App\Models\Article::create([
            'user_id' => '1',
            'category_id' => '4',
            'title' => 'Article #3',
            'description' => 'Lorem ipsum dolor sit amet consectetur elit',
            'image' => 'public/images/3/img_article.jpg',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
        ]);
        $article->save();

        $article = \App\Models\Article::create([
            'user_id' => '3',
            'category_id' => '6',
            'title' => 'Article #4',
            'description' => 'Lorem ipsum dolor sit amet consectetur elit',
            'image' => 'public/images/4/img_article.jpg',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
        ]);
        $article->save();

        $article = \App\Models\Article::create([
            'user_id' => '2',
            'category_id' => '4',
            'title' => 'Article #5',
            'description' => 'Lorem ipsum dolor sit amet consectetur elit',
            'image' => 'public/images/5/img_article.jpg',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
        ]);
        $article->save();
    }

    public function rooms()
    {
        $room = \App\Models\Room::create([
            'numero' => 101,
            'tipo' => 'matrimoniale',
            'prezzo' => 55,
            'descrizione' => 'lorem picsum',
        ]);
        $room = \App\Models\Room::create([
            'numero' => 102,
            'tipo' => 'matrimoniale',
            'prezzo' => 56,
            'descrizione' => 'lorem picsum',
        ]);
        $room = \App\Models\Room::create([
            'numero' => 103,
            'tipo' => 'tripla',
            'prezzo' => 57,
            'descrizione' => 'lorem picsum',
        ]);
        $room = \App\Models\Room::create([
            'numero' => 104,
            'tipo' => 'tripla',
            'prezzo' => 57,
            'descrizione' => 'lorem picsum',
        ]);
        $room = \App\Models\Room::create([
            'numero' => 105,
            'tipo' => 'tripla',
            'prezzo' => 57,
            'descrizione' => 'lorem picsum',
        ]);
        $room = \App\Models\Room::create([
            'numero' => 106,
            'tipo' => 'matrimoniale',
            'prezzo' => 55,
            'descrizione' => 'lorem picsum',
        ]);
        $room = \App\Models\Room::create([
            'numero' => 107,
            'tipo' => 'matrimoniale',
            'prezzo' => 56,
            'descrizione' => 'lorem picsum',
        ]);
        $room = \App\Models\Room::create([
            'numero' => 108,
            'tipo' => 'tripla',
            'prezzo' => 100,
            'descrizione' => 'lorem picsum',
        ]);
        $room = \App\Models\Room::create([
            'numero' => 109,
            'tipo' => 'tripla',
            'prezzo' => 80,
            'descrizione' => 'lorem picsum',
        ]);
        $room = \App\Models\Room::create([
            'numero' => 110,
            'tipo' => 'tripla',
            'prezzo' => 57,
            'descrizione' => 'lorem picsum',
        ]);

        $room = \App\Models\Room::create([
            'numero' => 111,
            'tipo' => 'tripla',
            'prezzo' => 80,
            'descrizione' => 'lorem picsum',
        ]);
        $room = \App\Models\Room::create([
            'numero' => 112,
            'tipo' => 'tripla',
            'prezzo' => 57,
            'descrizione' => 'lorem picsum',
        ]);

        //secondo piano

        $room = \App\Models\Room::create([
            'numero' => 201,
            'tipo' => 'matrimoniale',
            'prezzo' => 55,
            'descrizione' => 'lorem picsum',
        ]);
        $room = \App\Models\Room::create([
            'numero' => 202,
            'tipo' => 'matrimoniale',
            'prezzo' => 56,
            'descrizione' => 'lorem picsum',
        ]);
        $room = \App\Models\Room::create([
            'numero' => 203,
            'tipo' => 'tripla',
            'prezzo' => 57,
            'descrizione' => 'lorem picsum',
        ]);
        $room = \App\Models\Room::create([
            'numero' => 204,
            'tipo' => 'tripla',
            'prezzo' => 57,
            'descrizione' => 'lorem picsum',
        ]);
        $room = \App\Models\Room::create([
            'numero' => 205,
            'tipo' => 'tripla',
            'prezzo' => 57,
            'descrizione' => 'lorem picsum',
        ]);
        $room = \App\Models\Room::create([
            'numero' => 206,
            'tipo' => 'matrimoniale',
            'prezzo' => 55,
            'descrizione' => 'lorem picsum',
        ]);
        $room = \App\Models\Room::create([
            'numero' => 207,
            'tipo' => 'matrimoniale',
            'prezzo' => 56,
            'descrizione' => 'lorem picsum',
        ]);
        $room = \App\Models\Room::create([
            'numero' => 208,
            'tipo' => 'tripla',
            'prezzo' => 100,
            'descrizione' => 'lorem picsum',
        ]);
        $room = \App\Models\Room::create([
            'numero' => 209,
            'tipo' => 'tripla',
            'prezzo' => 80,
            'descrizione' => 'lorem picsum',
        ]);
        $room = \App\Models\Room::create([
            'numero' => 210,
            'tipo' => 'tripla',
            'prezzo' => 57,
            'descrizione' => 'lorem picsum',
        ]);

        $room = \App\Models\Room::create([
            'numero' => 211,
            'tipo' => 'tripla',
            'prezzo' => 80,
            'descrizione' => 'lorem picsum',
        ]);

        //Terzo piano
        $room = \App\Models\Room::create([
            'numero' => 301,
            'tipo' => 'matrimoniale',
            'prezzo' => 55,
            'descrizione' => 'lorem picsum',
        ]);
        $room = \App\Models\Room::create([
            'numero' => 302,
            'tipo' => 'matrimoniale',
            'prezzo' => 56,
            'descrizione' => 'lorem picsum',
        ]);
        $room = \App\Models\Room::create([
            'numero' => 303,
            'tipo' => 'tripla',
            'prezzo' => 57,
            'descrizione' => 'lorem picsum',
        ]);
        $room = \App\Models\Room::create([
            'numero' => 304,
            'tipo' => 'tripla',
            'prezzo' => 57,
            'descrizione' => 'lorem picsum',
        ]);
        $room = \App\Models\Room::create([
            'numero' => 305,
            'tipo' => 'tripla',
            'prezzo' => 57,
            'descrizione' => 'lorem picsum',
        ]);
        $room = \App\Models\Room::create([
            'numero' => 306,
            'tipo' => 'matrimoniale',
            'prezzo' => 55,
            'descrizione' => 'lorem picsum',
        ]);
        $room = \App\Models\Room::create([
            'numero' => 307,
            'tipo' => 'matrimoniale',
            'prezzo' => 56,
            'descrizione' => 'lorem picsum',
        ]);
        $room = \App\Models\Room::create([
            'numero' => 308,
            'tipo' => 'tripla',
            'prezzo' => 100,
            'descrizione' => 'lorem picsum',
        ]);
        $room = \App\Models\Room::create([
            'numero' => 309,
            'tipo' => 'tripla',
            'prezzo' => 80,
            'descrizione' => 'lorem picsum',
        ]);
        $room = \App\Models\Room::create([
            'numero' => 310,
            'tipo' => 'tripla',
            'prezzo' => 57,
            'descrizione' => 'lorem picsum',
        ]);

        $room = \App\Models\Room::create([
            'numero' => 311,
            'tipo' => 'tripla',
            'prezzo' => 80,
            'descrizione' => 'lorem picsum',
        ]);
    }


    public function roomsAugust()
    {
        $roomIds = range(1, 34); // Genera un array di room_id da 1 a 34

        foreach ($roomIds as $roomId) {
            \App\Models\August_day::create([
                'room_id' => $roomId
            ]);
        }

    }

    public function roomsSeptember()
    {
        $roomIds = range(1, 34);

    foreach ($roomIds as $roomId) {
        \App\Models\September_day::create([
            'room_id' => $roomId
        ]);
    }
    }

    public function roomsJanuary()
    {
        $roomIds = range(1, 34);

    foreach ($roomIds as $roomId) {
        \App\Models\January_day::create([
            'room_id' => $roomId
        ]);

        
    }
    }

    public function roomsMonths()
    {
        $roomIds = range(1, 34);

        foreach ($roomIds as $roomId) {
            \App\Models\January_day::create([
                'room_id' => $roomId
            ]);
        }
        
        foreach ($roomIds as $roomId) {
            \App\Models\February_day::create([
                'room_id' => $roomId
            ]);
        }

        foreach ($roomIds as $roomId) {
            \App\Models\March_day::create([
                'room_id' => $roomId
            ]);
        }
        
        foreach ($roomIds as $roomId) {
            \App\Models\April_day::create([
                'room_id' => $roomId
            ]);
        }

        foreach ($roomIds as $roomId) {
            \App\Models\May_day::create([
                'room_id' => $roomId
            ]);
        }

        foreach ($roomIds as $roomId) {
            \App\Models\June_day::create([
                'room_id' => $roomId
            ]);
        }

        foreach ($roomIds as $roomId) {
            \App\Models\July_day::create([
                'room_id' => $roomId
            ]);
        }
        
        foreach ($roomIds as $roomId) {
            \App\Models\August_day::create([
                'room_id' => $roomId
            ]);
        }
        
        foreach ($roomIds as $roomId) {
            \App\Models\September_day::create([
                'room_id' => $roomId
            ]);
        }

        foreach ($roomIds as $roomId) {
            \App\Models\October_day::create([
                'room_id' => $roomId
            ]);
        }

        foreach ($roomIds as $roomId) {
            \App\Models\November_day::create([
                'room_id' => $roomId
            ]);
        }


    }

}
