<?php

namespace App\Livewire;

use Livewire\Attributes\Reactive;
use Livewire\Component;

class Todo extends Component
{
    public array $todo;
    public string $name;
    public bool $hasPrivateVisibility;
    public string $bgColorClass;

    public function boot()
    {
        $this->hasPrivateVisibility = $this->todo['visibility'] === 'private';
        $this->bgColorClass = $this->getBgColorClassByStatus($this->todo['status']);
    }

    public function rendering($view, $data)
    {
        return;
    }
    public function changeName()
    {
        $this->todo['name'] = $this->name;
        $this->dispatch('todo-changed', $this->todo);
    }

    public function changeVisibility()
    {
        $this->todo['visibility'] = $this->hasPrivateVisibility ? 'public' : 'private';
        $this->dispatch('todo-changed', $this->todo);
    }

    public function changeStatus(string $status)
    {
        $this->todo['status'] = $status;
        $this->bgColorClass = $this->getBgColorClassByStatus($status);
        $this->dispatch('todo-changed', $this->todo);
    }

    public function render()
    {
        return view('livewire.todo');
    }

    public function delete()
    {
        $this->dispatch('delete-todo', $this->todo['id']);
    }

    private function getBgColorClassByStatus(string $status)
    {
        $classes = [
            'in_progress' => '',
            'finished'    => 'bg-done',
            'cancelled'   => 'bg-cancel',
        ];

        return $classes[$status];
    }
}
