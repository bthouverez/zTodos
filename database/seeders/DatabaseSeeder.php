<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\TodoList;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->count(2)->sequence([
            'name' => 'Bastien',
            'email' => 'bastien.thouverez@gmail.com',
            'is_admin' => true,
        ],[
            'name' => 'Marion',
            'email' => 'marion.beche@gmail.com',
        ]  )->create();

#        TodoList::factory(50)->hasTasks(13)->create();
    }
}
