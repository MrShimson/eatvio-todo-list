<div>
    <h3 class="mb-3"> {{ $name }}</h3>
    <ul class="list-group" drag-root="reorder">
        @foreach($todos as $todo)
            <li wire:key="{{ $todo['id'] }}" draggable="true" drag-item="{{ $todo['id'] }}" class="list-group-item my-1 border border-2 rounded-3" >
                {{ $todo['name'] }}
            </li>
        @endforeach
    </ul>
</div>
