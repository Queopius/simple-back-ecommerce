<tr>
    <td class="px-3 text-gray-900 text-start align-middle">
        {{ $product->id }}
    </td>
    <td class="px-3 flex-nowrap whitespace-nowrap align-middle">
        <div class="flex d-inline-flex pt-1">
            <div class="flex-shrink-1 d-flex align-items-center">
                <x-avatar
                    :path="$product->photoPath"
                />
            </div>
            <div class="ms-3 pt-2">
                <div class="font-weight-bolder text-gray-900">
                    {{ $product->name }}
                </div>
            </div>
        </div>
    </td>
    <td class="px-3 text-gray-900 text-center align-middle">
        {{ $product->description }}
    </td>
    <td class="px-3 text-gray-900 text-center align-middle">
        {{ $product->priceFormated }}
    </td>
    <td class="px-3 align-middle text-end">
        <div class="text-gray-900">
            <span class="badge rounded-5 bg-blue-100 text-blue-600 shadow-sm px-3">
                {{ optional($product->category)->name }}
            </span>
        </div>
    </td>
    <td class="px-3 text-gray-900 text-end align-middle">
        {{ $product->created_at->diffForHumans() }}
    </td>
    <td class="px-3 text-gray-900 text-end align-middle">
        @if($product->trashed())
            <x-btn-group>
                <x-modal.btn-restore :target="$product->id" />
                <x-modal.btn-destroy :target="$product->id" />
            </x-btn-group>
            <x-modal.restore
                title="Restore Product {{ $product->name }}"
                href="{{ route('admin.products.restore', $product->id) }}"
                :id="$product->id" />
        @else
            <x-btn-group>
                <x-edit
                    href="{{ route('admin.products.edit', $product) }}"
                    target="{{ $product->id }}"
                >
                    @include('vendor.material.icons.edit')
                </x-edit>
                <x-modal.btn-delete :target="$product->id" />
            </x-btn-group>
            <x-modal.delete
                title="Delete Produdct {{ $product->name }}"
                action="{{ route('admin.products.trash', $product) }}"
                :id="$product->id" />
        @endif
    </td>
</tr>

<x-modal.destroy
    title="Destroy Product {{ $product->name }}"
    action="{{ route('admin.products.destroy', $product->id) }}"
    :id="$product->id" />
