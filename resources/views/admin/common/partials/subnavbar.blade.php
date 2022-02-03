@auth
<x-subnavbar>
    <x-links title="Dashboard"
        route="admin.dashboard">
        @include('vendor.material.icons.dashboard')
    </x-links>

    <x-links title="Management"
        route="admin.management.collaborators.index">
        @include('vendor.material.icons.management')
    </x-links>

    <x-links title="Web Manager"
        route="admin.web.index">
        @include('vendor.material.icons.web')
    </x-links>

    <x-links title="Settings"
        route="admin.settings.index">
        @include('vendor.material.icons.settings')
    </x-links>
</x-subnavbar>
@endauth
