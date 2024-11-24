<div class="d-inline" x-data="{ open: false }">
    <button @click="open = true" type="button" class="btn btn-warning d-inline" data-bs-toggle="modal" data-bs-target="#signUpModal">
        Sign-up
    </button>

    @teleport('body')
    <div x-show="open">
        <div class="modal fade" id="signUpModal" tabindex="-1" aria-labelledby="signUpModalLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="signUpModalLabel">Sign Up</h5>
                        <button @click="open = false" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit="createUser">
                            <div class="mt-2">
                                <label class="form-label mb-1">Name</label>
                                <input class="form-control" type="text" wire:model.defer="name">
                                <div class="mt-1">
                                    @error('name') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="mt-2">
                                <label class="form-label mb-1">Email</label>
                                <input class="form-control" type="email" wire:model.defer="email">
                                <div class="mt-1">
                                    @error('email') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="mt-2">
                                <label class="form-label mb-1">Password</label>
                                <input class="form-control" type="password" wire:model.defer="password">
                                <div class="mt-1">
                                    @error('password') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="mt-2">
                                <label class="form-label mb-1">Profile Status</label>
                                <div class="form-check">
                                    <label class="form-check-label">Public</label>
                                    <input class="form-check-input" type="radio" name="status" value="public" wire:model.defer="status">
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">Private</label>
                                    <input class="form-check-input" type="radio" name="status" value="private" wire:model.defer="status">
                                </div>
                                <div class="mt-1">
                                    @error('status') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="d-grid gap-2 col-6 mx-auto mt-3 p-2">
                                <button class="btn btn-primary" type="submit">Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endteleport
</div>
