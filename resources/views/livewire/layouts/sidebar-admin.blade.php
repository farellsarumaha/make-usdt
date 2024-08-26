<aside id="logo-sidebar"
    class="fixed top-0 md:top-24 left-0 z-40 w-64 h-screen pt-32 bg-white transition-transform -translate-x-full md:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto">
        <ul class="space-y-2 font-medium">
            <li>
                <x-alinks :href="route('admin.dashboard')"
                    class="{{ request()->routeIs('admin.dashboard') ? 'bg-gray-100' : '' }} w-full hover:bg-gray-100 px-4 py-3 rounded-lg flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205 3 1m1.5.5-1.5-.5M6.75 7.364V3h-3v18m3-13.636 10.5-3.819" />
                    </svg>
                    Dashboard
                </x-alinks>
            </li>
            <li>
                <x-alinks :href="route('admin.users')"
                    class="{{ request()->routeIs('admin.users') ? 'bg-gray-100' : '' }} w-full hover:bg-gray-100 px-4 py-3 rounded-lg flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                    </svg>
                    Users
                </x-alinks>
            </li>
        </ul>
    </div>
</aside>
