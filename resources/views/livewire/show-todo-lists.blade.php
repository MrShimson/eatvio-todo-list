<div class="list-group">
    @foreach($todoLists as $todoList)
        <div class="list-group-item d-inline-flex justify-content-between border-0 pt-0 px-2">
            <button wire:click="setCurrentTodoList({{ $todoList->id }})" type="button" class="btn border border-2 rounded-3 text-center w-75">
                {{ $todoList->name }}
            </button>
            <a wire:click.prevent="deleteTodoList({{ $todoList->id }})" href="#" class="justify-content-end align-self-center">
                <img style="width: 32px; height: 32px;" src="https://img.icons8.com/?size=100&id=G3ke6AwujrRv&format=png&color=000000" alt="Delete icon">
            </a>
        </div>
    @endforeach
    <div class="list-group-item d-inline-flex justify-content-between border-0 pt-0 px-2">
        <button wire:click="addTodoList()"  type="button" class="btn border border-2 rounded-3 text-center px-1 w-75">
            Add new Todo List
        </button>
    </div>
</div>
