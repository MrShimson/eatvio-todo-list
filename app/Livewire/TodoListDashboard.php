<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Dashboard')]
class TodoListDashboard extends Component
{
    public function render()
    {
        return view('livewire.todo-list-dashboard');
    }
}
