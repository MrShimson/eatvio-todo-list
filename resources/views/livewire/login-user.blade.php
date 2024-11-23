<div x-data="{ open: false }">
    <button @click="open = true" type="button" class="btn btn-outline-light me-2" data-bs-toggle="modal" data-bs-target="#signInModal">
        Sign-in
    </button>

    @teleport('#signInModalBody')
    <div x-show="open">
        <form class="container-fluid" wire:submit="login">
            <div class="mt-2">
                <label class="form-label mb-1">Email</label>
                <input class="form-control" type="email" wire:model="email">
                <div class="mt-1">
                    @error('email') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mt-2">
                <label class="form-label mb-1">Password</label>
                <input class="form-control" type="password" wire:model="password">
                <div class="mt-1">
                    @error('password') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="d-grid gap-2 col-6 mx-auto p-2">
                <button class="btn btn-primary" type="submit">SignIn</button>
            </div>
        </form>
    </div>
    @endteleport
</div>
