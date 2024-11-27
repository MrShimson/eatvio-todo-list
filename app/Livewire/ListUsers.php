<?php

namespace App\Livewire;

use App\Models\TodoList;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Users')]
class ListUsers extends Component
{
    use WithPagination;

    public array $usersTodoLists;

    protected $listeners = ['status-changed' => 'refresh'];

    public function mount()
    {
        $this->usersTodoLists = $this->getUsersTodoLists();
    }

    public function render()
    {
        $users = User::where('status', 'public')->paginate(5);
        return view('livewire.list-users', [
            'users' => $users,
        ]);
    }

    private function getUsersTodoLists()
    {
        $todoListsByUser = DB::table('users_todo_lists')
            ->join('users', 'users.id', '=', 'user_id')
            ->join('todo_lists', 'todo_lists.id', '=', 'todo_list_id')
            ->select([
                    'users.id as user_id',
                    'todo_lists.id as id',
                    'todo_lists.name',
                    'todo_lists.status',
                    'todo_lists.todos',
            ])
            ->where('users.status', 'public')
            ->where('todo_lists.status', 'public')
            ->whereNull('todo_lists.deleted_at')
            ->get()
        ;

        $deleteUserIdAfterGrouping = function ($array) {
            return collect($array)
                ->map(fn($todoList) => collect($todoList)->forget('user_id')->toArray())
                ->toArray();
        };

        return $todoListsByUser
            ->groupBy('user_id')
            ->map($deleteUserIdAfterGrouping)
            ->toArray();
    }
}
