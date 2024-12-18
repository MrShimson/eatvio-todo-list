<div>
    @auth
        <div class="dropdown">
            <a class="btn btn-outline-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                Profile
            </a>

            <ul class="dropdown-menu py-0 text-center" aria-labelledby="dropdownMenuLink">
                <li>
                    <span class="dropdown-item-text p-2">
                    <img style="width: 16px; height: 16px;" class="me-1 mb-1" src="https://img.icons8.com/?size=100&id=7819&format=png&color=000000" alt="User icon">
                    Logged as {{ auth()->user()->getAttribute('name') }}
                    </span>
                </li>
                <li><hr class="dropdown-divider m-0"></li>
                <li>
                    <livewire:change-status/>
                </li>
                <li>
                    <livewire:change-password/>
                </li>
                <li><hr class="dropdown-divider m-0"></li>
                <li><button wire:click="logout" class="dropdown-item p-2" type="button">Sign Out</button></li>
            </ul>
        </div>
    @endauth
    @guest
        <livewire:login-user/>
        <livewire:create-user/>
    @endguest
</div>
