<div class="row">
    <div id="menu" class="col-2 px-2 pt-3 pb-1 border-end border-2">
        <livewire:show-todo-lists wire:model="todoLists" />
    </div>
    <div id="content" class="col-5 mx-auto mt-3">
        @if(!empty($todoLists))
            <livewire:todo-list wire:model="currentTodoList" />
        @endif
    </div>
</div>
