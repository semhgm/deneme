<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::create(['title' => 'Laravel Blade Nedir?', 'content' => 'Blade, Laravel\'in basit ama güçlü şablon motorudur...']);
        Article::create(['title' => 'Eloquent ORM\'e Giriş', 'content' => 'Eloquent, veritabanı tablolarıyla etkileşim kurmayı keyifli hale getirir...']);
        Article::create(['title' => 'API Rotaları ve Web Rotaları Arasındaki Fark', 'content' => 'routes/api.php state-less iken routes/web.php session durumlarını korur...']);
    }
}
