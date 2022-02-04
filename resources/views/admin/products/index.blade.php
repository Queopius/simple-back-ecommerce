@extends('admin.layouts.app')
@include('admin.products.partials.include._navigation')
@section('content')
    @if ($products->isNotEmpty())
        <x-card-list>
            <thead>
                <tr class="py-2">
                    <th scope="col" class="text-start px-3">
                        {{ __('global.id') }}
                    </th>
                    <th scope="col" class="text-start px-3">
                        {{ __('global.name') }}
                    </th>
                    <th scope="col" class="text-center px-3">
                        {{ __('global.description') }}
                    </th>
                    <th scope="col" class="text-center px-3">
                        {{ __('Reviews') }}
                    </th>
                    <th scope="col" class="text-center px-3">
                        {{ __('global.price') }}
                    </th>
                    <th scope="col" class="text-end px-3">
                        {{ __('global.category') }}
                    </th>
                    <th scope="col" width="240" class="text-end px-3">
                        {{ __('global.created_at') }}
                    </th>
                    <th scope="col" width="240" class="text-end px-3">
                        {{ __('global.actions') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @each('admin.products.partials._row', $products, 'product')
            </tbody>
        </x-card-list>
        @if ($view == 'index')
            <x-footer-list>
                <x-text-pagination :text="$text_pagination" :links="$products" />
            </x-footer-list>
        @endif
    @else
        <x-empty-text :view="$view" />
    @endif
@endsection
