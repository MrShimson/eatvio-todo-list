<div class="d-inline" x-data="{ open: false }">
    <button @click="open = true" type="button" class="btn btn-outline-light me-2 d-inline" data-bs-toggle="modal" data-bs-target="#signInModal">
        Sign-in
    </button>

    @teleport('body')
    <div x-show="open">
        <div class="modal fade" id="signInModal" tabindex="-1" aria-labelledby="signInModalLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="signInModalLabel">Sign In</h5>
                        <button @click="open = false" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="container-fluid" wire:submit="login">
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
                            <div class="d-grid gap-2 col-6 mx-auto mt-3 p-2">
                                <button class="btn btn-primary" type="submit">SignIn</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endteleport
</div>
