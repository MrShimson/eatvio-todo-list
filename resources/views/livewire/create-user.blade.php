<form class="container-fluid" wire:submit="save">
    <div class="mt-2">
        <label class="form-label mb-1">Name</label>
        <input class="form-control" type="text" wire:model="name">
        <div class="mt-1">
            @error('name') <span class="error">{{ $message }}</span> @enderror
        </div>
    </div>
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
    <div class="mt-2">
        <label class="form-label mb-1">Profile Status</label>
        <div class="form-check">
            <label class="form-check-label">Public</label>
            <input class="form-check-input" type="radio" name="status" value="public" wire:model="status">
        </div>
        <div class="form-check">
            <label class="form-check-label">Private</label>
            <input class="form-check-input" type="radio" name="status" value="private" wire:model="status">
        </div>
        <div class="mt-1">
            @error('status') <span class="error">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="row justify-content-center mt-2 px-1">
        <div class="d-grid gap-2 col-6 mx-auto p-2">
            <button class="btn btn-primary" type="submit">Save</button>
        </div>
        <div class="col-6 text-center py-3 px-0">
            <a class="link-secondary text-decoration-none" href="/signin">Have an account? Sign In</a>
        </div>
    </div>
</form>
