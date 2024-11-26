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
        $userId     = 1;
        $todoListId = 1;

        do {
            User::create([
                'name'     => 'Test User',
                'email'    => "test{$userId}@example.com",
                'password' => 'Qwe12345',
                'status'   => 'public',
            ]);

            for ($i = 0; $i < 5; $i++) {
                $todoSeeder = function () {
                    $todos = [];

                    for ($i = 1; $i <= 5; $i++) {
                        $todos[] = [
                            'id'         => $i,
                            'name'       => "Test Todo {$i}",
                            'visibility' => 'public',
                            'status'     => 'in_progress',
                        ];
                    }

                    return $todos;
                };

                TodoList::create([
                    'name'   => "Test List {$todoListId}",
                    'status' => 'public',
                    'todos'  => [
                        ...$todoSeeder(),
                    ]
                ]);

                DB::table('users_todo_lists')->insert([
                    'user_id' => $userId,
                    'todo_list_id' => $todoListId,
                ]);

                $todoListId++;

            }

            $userId++;

        } while ($userId <= 10);
    }
}
