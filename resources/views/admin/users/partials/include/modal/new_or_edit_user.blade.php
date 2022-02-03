@if($user->exists)
    @can('update user')
    <x-form.form method="PATCH"
        action="{{ route('admin.users.update', $user) }}"
    >
        <x-modal.modal id="{{$user->id}}"
            title="Update Role {{ $user->username }}"
            text="Create Role"
        >
            <div class="modal-body px-4">
                <div class="row mt-3">
                    {{-- @include('user.admin.users.partials.fields.information')

                    @include('user.admin.users.partials.fields.permissions') --}}
                </div>
            </div>
        </x-modal.modal>

    </x-form.form>
    @endcan
@else
    @can('create user')
    <x-form.form method="PATCH"
        action="{{ route('admin.users.store') }}"
    >
        <x-modal.modal id="newCollaborator"
            title="Create a New Collaborator"
            text="Create Collaborator"
        >
            <div class="modal-body px-4">
                <div class="row mt-3">
                    {{-- @include('user.user.management.roles.partials.fields.information')

                    @include('user.user.management.roles.partials.fields.permissions') --}}
                </div>
            </div>
        </x-modal.modal>
    </x-form.form>
    @endcan
@endif

