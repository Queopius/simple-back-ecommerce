<tr>
    <td class="px-3 text-gray-900 text-start align-middle">
        {{ $user->id }}
    </td>
    <td class="px-3 flex-nowrap whitespace-nowrap align-middle">
        <div class="flex d-inline-flex">
            <div class="flex-shrink-1 d-flex align-items-center">
                <x-avatar
                    :path="$user->avatarPath"
                />

            </div>
            <div class="ms-3">
                <div class="font-weight-bolder text-gray-900">
                    {{ $user->username }}

                </div>
                <div class="text-sm text-gray-600">
                    {{ $user->email }}
                </div>
            </div>
        </div>
    </td>
    <td class="px-3 text-gray-900 text-center align-middle">
        {{ $user->first_name }}
    </td>
    <td class="px-3 text-gray-900 text-center align-middle">
        {{ $user->last_name }}
    </td>
    {{-- <td class="px-3 align-middle">
        <div class="text-gray-900">
            {{ optional($user->country)->name }}
        </div>
    </td> --}}
    <td class="px-3 text-gray-900 text-end align-middle">
        {{ $user->created_at->diffForHumans() }}
    </td>
    <td class="px-3 text-gray-900 text-end align-middle">
        @if($user->trashed())
            <x-btn-group>
                <x-modal.btn-restore :target="$user->id" />
                <x-modal.btn-destroy :target="$user->id" />
            </x-btn-group>
            <x-modal.restore
                title="Restore User {{ $user->username }}"
                href="{{ route('admin.users.restore', $user->id) }}"
                :id="$user->id" />
        @else
            <x-btn-group>
                <x-edit
                    href="{{ route('admin.users.edit', $user) }}"
                    target="{{ $user->id }}"
                >
                    @include('vendor.material.icons.edit')
                </x-edit>

                @if ($user->id !== 1)
                    <x-modal.btn-delete :target="$user->id" />
                @else
                @endif
            </x-btn-group>
            <x-modal.delete
                title="Delete Collaborator {{ $user->username }}"
                action="{{ route('admin.users.trash', $user) }}"
                :id="$user->id" />
        @endif
    </td>
</tr>

<x-modal.destroy
    title="Destroy User {{ $user->username }}"
    action="{{ route('admin.users.destroy', $user->id) }}"
    :id="$user->id" />
