@extends('admin.layouts.app')
@include('admin.categories.partials.include._navigation')
@section('content')
    @if ($categories->isNotEmpty())
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
                    <th scope="col" width="240" class="text-end px-3">
                        {{ __('global.created_at') }}
                    </th>
                    <th scope="col" width="240" class="text-end px-3">
                        {{ __('global.actions') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @each('admin.categories.partials._row', $categories, 'category')
            </tbody>
        </x-card-list>
        @if ($view == 'index')
            <x-footer-list>
                <x-text-pagination :text="$text_pagination" :links="$categories" />
            </x-footer-list>
        @endif
    @else
        <x-empty-text :view="$view" />
    @endif
@endsection
