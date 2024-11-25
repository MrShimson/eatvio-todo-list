<?php

namespace App\Livewire;

use App\Models\TodoList as TDList;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Todo List')]
class TodoList extends Component
{
    public TDlist $todoList;
    public string $name;
    public string $status;
    public array  $todos;

    protected $listeners = [
        'todo-changed' => 'updateTodo',
        'delete-todo'  => 'deleteTodo',
    ];

    public function boot()
    {
        $this->name   = $this->todoList->getAttribute('name');
        $this->status = $this->todoList->getAttribute('status');
        $this->todos  = $this->todoList->getAttribute('todos');
    }

    public function rendering($view, $data)
    {
        return;
    }

    public function changeTodoListName()
    {
        $this->todoList->setAttribute('name', $this->name);
        $this->todoList->save();
    }

    public function changeTodoListStatus()
    {
        $this->todoList->setAttribute('status', $this->status);
        $this->todoList->save();
    }

    public function addTodo()
    {
        $id = collect($this->todos)->max('id') + 1;

        $this->todos[] = [
            'id'   => $id,
            'name' => '',
        ];
    }

    public function reorderTodos($order)
    {
        $this->todos = collect($order)->map(function ($id) {
            return collect($this->todos)->where('id', (int)$id)->first();
        })->toArray();
    }

    public function updateTodo(array $todo)
    {
        $index = collect($this->todos)->search(function (array $item) use ($todo) {
            return $item['id'] === $todo['id'];
        });

        $this->todos = collect($this->todos)->replace([$index => $todo])->all();
        $this->save();
    }

    public function deleteTodo(int $todoId)
    {
        $this->todos = collect($this->todos)->where('id', '!==', $todoId)->all();
        $this->save();
    }

    public function save()
    {
        $this->todoList->setAttribute('todos', $this->todos);
        $this->todoList->save();
    }

    public function render()
    {
        return view('livewire.todo-list');
    }
}
