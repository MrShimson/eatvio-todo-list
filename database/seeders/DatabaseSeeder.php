<?php

namespace Database\Seeders;

use App\Models\TodoList;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        for ($i = 3; $i <= 3; $i++) {
            User::factory()->create([
                'name'     => 'Test User',
                'email'    => "test{$i}@example.com",
                'password' => 'Qwe12345',
                'status'   => 'public',
            ]);
            for ($io = 7; $io <= 9; $io++) {
                TodoList::create([
                    'name'     => "Test List {$io}",
                    'status'   => 'public',
                ]);
                DB::table('users_todo_lists')->insert([
                    'user_id' => $i,
                    'todo_list_id' => $io,
                ]);
            }

        }
    }
}
