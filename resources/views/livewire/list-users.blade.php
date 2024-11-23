<div>
    <ul class="list-group mb-3">
        @foreach ($users as $user)
            <li class="list-group-item my-1 border border-2 rounded-3" >
                {{ 'User with id: ' . $user->id . ' and name: ' . $user->name }}
            </li>
        @endforeach
    </ul>
    <div>{{ $users->links() }}</div>
</div>


