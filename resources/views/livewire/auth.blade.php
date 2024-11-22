<div class="text-end">
    @auth
        <span class="mx-3">Logged as {{ auth()->user()->getAttribute('name') }}</span>
        <button type="submit" class="btn btn-outline-light me-2" wire:click="logout">Sign Out</button>
    @endauth
    @guest
        <button type="button" class="btn btn-outline-light me-2" data-bs-toggle="modal" data-bs-target="#signInModal">
            <livewire:login-user/>
        </button>
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#signUpModal">
            <livewire:create-user/>
        </button>
    @endguest
</div>
