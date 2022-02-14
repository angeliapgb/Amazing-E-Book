<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EbookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ebook')->insert([
            'id' => 1,
            'title' => '[The title of the e-book 1 goes here]',
            'author' => 'Author 1',
            'description' => 'abcabc',
        ]);

        DB::table('ebook')->insert([
            'id' => 2,
            'title' => '[The title of the e-book 2 goes here]',
            'author' => 'Author 2',
            'description' => 'abcabc',
        ]);

        DB::table('ebook')->insert([
            'id' => 3,
            'title' => '[The title of the e-book 3 goes here]',
            'author' => 'Author 3',
            'description' => 'abcabc',
        ]);

        DB::table('ebook')->insert([
            'id' => 4,
            'title' => '[The title of the e-book 4 goes here]',
            'author' => 'Author 4',
            'description' => 'abcabc',
        ]);

        DB::table('ebook')->insert([
            'id' => 5,
            'title' => '[The title of the e-book 5 goes here]',
            'author' => 'Author 5',
            'description' => 'abcabc',
        ]);

        DB::table('ebook')->insert([
            'id' => 6,
            'title' => '[The title of the e-book 6 goes here]',
            'author' => 'Author 6',
            'description' => 'abcabc',
        ]);

        DB::table('ebook')->insert([
            'id' => 7,
            'title' => '[The title of the e-book 7 goes here]',
            'author' => 'Author 7',
            'description' => 'abcabc',
        ]);
    }
}
