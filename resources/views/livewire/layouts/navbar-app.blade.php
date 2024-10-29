<nav class="flex items-center justify-between px-4 md:px-20 py-4">
    <div class="flex items-center gap-4">
        <x-app-icon />
        <h6 class="font-extrabold hidden md:flex">{{ config('app.name') }}</h6>
    </div>
    <div class="hidden md:flex items-center gap-4">
        <x-navbar.a-default request="home" name="Home"/>
    </div>
    <div class="flex items-center gap-1">
        <x-buttons.default-button data-dropdown-toggle="usersDropdown">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
            </svg>
        </x-buttons.default-button>
        <x-dropdown.menu id="usersDropdown">
            @if (Auth::check())
                <ul class="py-2 text-sm text-gray-700">
                    <li><x-dropdown.a-default request="admin.dashboard" name="Dashboard"/></li>
                    <li><x-dropdown.a-default request="profile" name="Profile Information"/></li>
                    <li><x-dropdown.button wire:click="logout()" name="Logout"/></li>
                </ul>
            @else
                <ul class="py-2 text-sm text-gray-700">
                    <li><x-dropdown.a-default request="login" name="Login"/></li>
                    <li><x-dropdown.a-default request="register" name="Register"/></li>
                </ul>
            @endif
        </x-dropdown.menu>
        <x-buttons.default-button data-dropdown-toggle="pagesDropdown" class="flex md:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5M12 17.25h8.25" />
            </svg>
        </x-buttons.default-button>
        <x-dropdown.menu id="pagesDropdown">
            <ul class="py-2 text-sm text-gray-700">
                <li><x-dropdown.a-default request="home" name="Home"/></li>
            </ul>
        </x-dropdown.menu>
    </div>
</nav>
