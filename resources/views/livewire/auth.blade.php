<div class="text-end">
    @auth
        Logged as {{ auth()->user()->getAttribute('name') }}
    @endauth
    @guest
        <button type="button" class="btn btn-outline-light me-2" data-bs-toggle="modal" data-bs-target="#sign-in">
            <livewire:login-user />
        </button>
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#sign-up">
            <livewire:create-user />
        </button>
    @endguest
</div>
