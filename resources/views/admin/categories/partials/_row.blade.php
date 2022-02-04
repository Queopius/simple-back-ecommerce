<tr>
    <td class="px-3 text-gray-900 text-start align-middle">
        {{ $category->id }}
    </td>
    <td class="px-3 text-gray-900 text-start align-middle">
        {{ $category->name }}
    </td>
    <td class="px-3 text-gray-900 text-center align-middle">
        {{ $category->description }}
    </td>
    <td class="px-3 text-gray-900 text-end align-middle">
        {{ $category->created_at->diffForHumans() }}
    </td>
    <td class="px-3 text-gray-900 text-end align-middle">
        @if($category->trashed())
            <x-btn-group>
                <x-modal.btn-restore :target="$category->id" />
                <x-modal.btn-destroy :target="$category->id" />
            </x-btn-group>
            <x-modal.restore
                title="Restore Product {{ $category->name }}"
                href="{{ route('admin.categories.restore', $category->id) }}"
                :id="$category->id" />
        @else
            <x-btn-group>
                <x-edit
                    href="{{ route('admin.categories.edit', $category) }}"
                    target="{{ $category->id }}"
                >
                    @include('vendor.material.icons.edit')
                </x-edit>
                <x-modal.btn-delete :target="$category->id" />
            </x-btn-group>
            <x-modal.delete
                title="Delete Category {{ $category->name }}"
                action="{{ route('admin.categories.trash', $category) }}"
                :id="$category->id" />
        @endif
    </td>
</tr>

<x-modal.destroy
    title="Destroy Product {{ $category->name }}"
    action="{{ route('admin.categories.destroy', $category->id) }}"
    :id="$category->id" />
