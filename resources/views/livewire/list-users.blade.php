<div class="row">
    <div id="content" class="col-3 mx-auto">
        <div class="list-group my-3 px-5">
            @foreach ($users as $user)
                <div class="btn-group dropend my-1 border border-2 rounded-3 text-center">
                    <button type="button" class="btn btn-light">{{ $user->name }}</button>
                    <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                        <div class="dropdown-menu p-0 mx-3">
                            <div class="list-group">
                                @if (isset($usersTodoLists[$user->id]))
                                    @foreach($usersTodoLists[$user->id] as $todoList)
                                        <a href="/todo-lists/{{ $todoList['id'] }}" class="list-group-item list-group-item-action text-decoration-none text-dark text-center">
                                            {{ $todoList['name'] }}
                                        </a>
                                    @endforeach
                                @else
                                    <div class="list-group-item text-center">This User does not have any Todo Lists yet</div>
                                @endif
                            </div>
                        </div>
                </div>
            @endforeach
        </div>
        <div>{{ $users->links() }}</div>
    </div>
</div>


