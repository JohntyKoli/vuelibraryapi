<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $response = file_get_contents('https://fakerapi.it/api/v1/books?_quantity=100');
        $response = json_decode($response);
        foreach ($response->data as $key => $value) {
        DB::table('books')->insert([
            'title'=> $value->title,
            'author'=>$value->author,
            'genre'=>$value->genre,
            'description'=>$value->description,
            'isbn'=>$value->isbn,
            'image'=>$value->image,
            'publisher'=>$value->publisher,
            'published'=>$value->published,
            
            
        ]);
    }
    }
}
