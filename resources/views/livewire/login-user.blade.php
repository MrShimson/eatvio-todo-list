<div>
    <!-- Modal -->
    <div x-data="{ open: false }">
        <div @click="open = ! open">Sign-in</div>

        @teleport('body')
        <div x-show="open">
            <div class="modal fade" id="sign-in" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="sign-in-label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="sign-in-label">Sign In</h5>
                            <button @click="open = false" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid" wire:submit="login">
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
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="d-grid gap-2 col-6 mx-auto p-2">
                                <button class="btn btn-primary" type="submit">SignIn</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endteleport
    </div>
</div>
