<div class="dropdown-item-text p-2">
    Private
    <div class="form-switch d-inline m-1">
        <input wire:click="changeUserStatus" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" {{ $hasPrivateStatus ? '' : 'checked' }}>
    </div>
    Public
</div>
