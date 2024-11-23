<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Todo List')]
class TodoList extends Component
{
    public string $name = 'Todo List Name';
    public array $todos = [
        ['id' => 1, 'name' => 'Test1'],
        ['id' => 2, 'name' => 'Test2'],
        ['id' => 3, 'name' => 'Test3'],
        ['id' => 4, 'name' => 'Test4'],
        ['id' => 5, 'name' => 'Test5'],
    ];

    public function reorder($order)
    {
        $this->todos = collect($order)->map(function ($orderItem) {
            return collect($this->todos)->where('id', (int)$orderItem)->first();
        })->toArray();
    }

    public function render()
    {
        return view('livewire.todo-list');
    }
}
