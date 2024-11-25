<?php

namespace App\Livewire;

use App\Models\TodoList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ShowTodoLists extends Component
{
    public string $userId;

    public function mount(string $userId)
    {
        $this->userId = $userId;
    }

    public function render()
    {
        return view('livewire.show-todo-lists', [
            'todoLists' => $this->getTodoLists(),
        ]);
    }

    public function getTodoLists()
    {
        $todoListsIds  = $this->getAllUserTodoListsIds();
        $isCurrentUser = Auth::user()->getAuthIdentifier() === $this->userId;

        $query = TodoList::whereIn('id', $todoListsIds);

        if (!$isCurrentUser) {
            $query->where('status', 'public');
        }

        $todoLists = $query->get();
        $this->dispatch('todo-lists-get', $todoLists);

        return $todoLists;
    }

    private function getAllUserTodoListsIds()
    {
        $todoListsIds = DB::table('users_todo_lists')
            ->select('todo_list_id as id')
            ->where('user_id', $this->userId)
            ->get()
        ;

        return $todoListsIds->map(fn($todoList) => $todoList->id)->toArray();
    }
}
