<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $author1 = Author::create(['name' => 'J.R.R. Tolkien']);

        // Bu yazara ait kitapları oluştur
        Book::create(['title' => 'Yüzüklerin Efendisi', 'author_id' => $author1->id]);
        Book::create(['title' => 'Hobbit', 'author_id' => $author1->id]);

        // 2. Yazarı oluştur
        $author2 = Author::create(['name' => 'George Orwell']);

        // Bu yazara ait kitapları oluştur
        Book::create(['title' => '1984', 'author_id' => $author2->id]);
        Book::create(['title' => 'Hayvan Çiftliği', 'author_id' => $author2->id]);
    }
}
