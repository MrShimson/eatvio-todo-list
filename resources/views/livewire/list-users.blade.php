<div class="row">
    <div id="content" class="col-2 mx-auto">
        <div class="list-group my-3">
            @foreach ($users as $user)
                <div class="btn-group dropend my-1 border border-2 rounded-3 text-center">
                    <button type="button" class="btn btn-light">{{ $user->name }}</button>
                    <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu p-0 mx-3">
                        <div class="list-group">
                            @foreach($usersTodoLists[$user->id] as $todoList)
                                <a href="/todo-lists/{{$todoList['id']}}" class="list-group-item text-decoration-none text-dark">
                                    {{ $todoList['name'] }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div>{{ $users->links() }}</div>
    </div>
</div>


