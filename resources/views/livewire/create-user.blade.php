<div>
    <!-- Modal -->
    <div x-data="{ open: false }">
        <div @click="open = ! open">Sign-up</div>

        @teleport('#signUpModalBody')
        <div x-show="open">
            <form wire:submit="save">
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
                <button class="btn btn-primary" type="submit">Sign Up</button>
            </form>
        </div>
        @endteleport
    </div>
</div>
