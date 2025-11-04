<?php

// database/seeders/TaskSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task; // Task modelini import etmeyi unutmayın!

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        Task::create(['title' => 'Laravel projesini tamamla', 'completed' => false]);
        Task::create(['title' => 'API dokümantasyonunu yaz', 'completed' => false]);
        Task::create(['title' => 'Sunucuya deploy et', 'completed' => true]);
        Task::create(['title' => 'Müşteriye demo yap', 'completed' => true]);
        Task::create(['title' => 'Yeni özellikleri planla', 'completed' => false]);
    }
}
