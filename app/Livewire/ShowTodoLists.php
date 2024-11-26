<?php

namespace App\Livewire;

use App\Models\TodoList;
use Livewire\Attributes\Modelable;
use Livewire\Component;

class ShowTodoLists extends Component
{
    /**
     * @var TodoList[]
     */
    #[Modelable]
    public array $todoLists;

    public function setCurrentTodoList(string $todoListId)
    {
        $this->dispatch('set-current-todo-list', $todoListId);
    }

    public function addTodoList()
    {
        $this->dispatch('add-todo-list');
    }

    public function deleteTodoList(string $todoListId)
    {
        $this->dispatch('delete-todo-list', $todoListId);
    }

    public function render()
    {
        return view('livewire.show-todo-lists');
    }
}
