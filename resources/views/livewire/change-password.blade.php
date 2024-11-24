<div class="d-inline" x-data="{ open: false }">
    <button @click="open = true" type="button" class="dropdown-item p-2" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
        Change password
    </button>

    @teleport('body')
    <div x-show="open">
        <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
                        <button @click="open = false" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="container-fluid" wire:submit="changeUserPassword">
                            <div class="mt-2">
                                <label class="form-label mb-1">Old Password</label>
                                <input class="form-control" type="password" wire:model.defer="oldPassword">
                                <div class="mt-1">
                                    @error('oldPassword') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="mt-2">
                                <label class="form-label mb-1">New Password Confirmation</label>
                                <input class="form-control" type="password" wire:model.defer="newPassword">
                                <div class="mt-1">
                                    @error('newPassword') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="mt-2">
                                <label class="form-label mb-1">New Password</label>
                                <input class="form-control" type="password" wire:model.defer="newPassword_confirmation">
                                <div class="mt-1">
                                    @error('newPassword_confirmation') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="d-grid gap-2 col-6 mx-auto mt-3 p-2">
                                <button class="btn btn-primary" type="submit">Change</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endteleport
</div>
