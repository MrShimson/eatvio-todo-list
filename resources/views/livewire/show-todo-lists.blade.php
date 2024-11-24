<div>
    <ul class="list-group">
        @foreach($todoLists as $todoList)
            <li class="list-group-item mb-2 border border-2 rounded-3">{{ $todoList->name }}</li>
        @endforeach
    </ul>
</div>
