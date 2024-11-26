<?php

namespace App\Livewire;

use App\Models\TodoList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Dashboard')]
class TodoListDashboard extends Component
{
    /**
     * @var TodoList[]
     */
    public array $todoLists;
    public TodoList $currentTodoList;

    protected $listeners = [
        'set-current-todo-list' => 'setTodoListById',
    ];

    public function mount()
    {
        $this->todoLists = $this->getAllUserTodoLists();
        $id = collect($this->todoLists)->min('id');
        $this->setTodoListById($id);
    }

    public function setTodoListById(string $id)
    {
        $this->currentTodoList = collect($this->todoLists)->where('id', $id)->first();
    }

    private function getAllUserTodoLists()
    {
        $userId = Auth::user()->getAuthIdentifier();
        $userTodoListsIds = DB::table('users_todo_lists')
            ->select('todo_list_id as id')
            ->where('user_id', $userId)
            ->get()
            ->map(fn($todoList) => $todoList->id)
            ->toArray();
        ;

        return TodoList::whereIn('id', $userTodoListsIds)->get()->all();
    }

    public function render()
    {
        return view('livewire.todo-list-dashboard');
    }
}
