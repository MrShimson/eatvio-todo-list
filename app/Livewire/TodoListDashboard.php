<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Dashboard')]
class TodoListDashboard extends Component
{
    public $todoList;

    public function boot()
    {
        $this->todoList = \App\Models\TodoList::find(1);
    }

    public function render()
    {
        return view('livewire.todo-list-dashboard');
    }
}
