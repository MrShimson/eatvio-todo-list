<li draggable="true" drag-item="{{ $todo['id'] }}" class="list-group-item border-0 rounded-3 p-1 mx-auto">
    <div class="d-inline-flex border rounded-3 m-0 ps-2 {{ $bgColorClass }}">
        <input wire:model="name" wire:keydown.enter="changeName" type="text" class="d-inline col-5 border border-light rounded-3 bg-light no-focus my-2 text-center" placeholder="{{ $todo['name'] }}">
        <div class="dropdown-item-text d-inline align-self-center ms-auto mx-2">
            <img style="width: 28px; height: 28px;" src="https://img.icons8.com/?size=100&id=15453&format=png&color=000000" alt="Unlock icon">
            <div class="form-switch d-inline ">
                <input wire:click="changeVisibility" class="form-check-input mt-2" type="checkbox" role="switch" id="flexSwitchCheckChecked" {{ $hasPrivateVisibility ? 'checked' : '' }}>
            </div>
            <img style="width: 28px; height: 28px;" src="https://img.icons8.com/?size=100&id=15454&format=png&color=000000" alt="Lock icon">
        </div>
        <div class="d-inline align-self-center ms-auto mx-2">
            <a wire:click.prevent="changeStatus('finished')" href="#" class="d-inline text-decoration-none">
                <img style="width: 28px; height: 28px;" src="https://img.icons8.com/?size=100&id=40902&format=png&color=000000" alt="Done icon">
            </a>
            <a wire:click.prevent="changeStatus('cancelled')" href="#" class="d-inline text-decoration-none">
                <img style="width: 28px; height: 28px;" src="https://img.icons8.com/?size=100&id=23543&format=png&color=000000" alt="Cancel icon">
            </a>
        </div>
    </div>
    <a wire:click.prevent="delete()" href="#" class="d-inline text-decoration-none">
        <img style="width: 32px; height: 32px;" src="https://img.icons8.com/?size=100&id=G3ke6AwujrRv&format=png&color=000000" alt="Delete icon">
    </a>
</li>

