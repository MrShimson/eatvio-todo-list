<div class="list-group">
    @foreach($todoLists as $todoList)
        <a wire:click.prevent="setCurrentTodoList({{ $todoList->id }})" href="#" class="list-group-item list-group-item-action mb-2 border border-2 rounded-3">{{ $todoList->name }}</a>
    @endforeach
</div>
