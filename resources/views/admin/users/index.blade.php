@extends('admin.layouts.app')

{{-- @section('navigation-title', 'Contacts')

@include('admin.management.contacts.partials.include._navigation') --}}

@section('content')

    @if ($users->isNotEmpty())
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
                        {{ __('global.first_name') }}
                    </th>
                    <th scope="col" class="text-center px-3">
                        {{ __('global.last_name') }}
                    </th>
                    {{-- <th scope="col" width="220" class="text-center px-3">
                        {{ __('global.country') }}
                    </th> --}}
                    <th scope="col" width="240" class="text-end px-3">
                        {{ __('global.created_at') }}
                    </th>
                    <th scope="col" width="240" class="text-end px-3">
                        {{ __('global.actions') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @each('admin.users.partials._row', $users, 'user')
            </tbody>
        </x-card-list>
        @if ($view == 'index')
            <x-footer-list>
                <x-text-pagination :text="$text_pagination" :links="$users" />
            </x-footer-list>
        @endif
    @else
        <x-empty-text :view="$view" />
    @endif

{{-- @include('admin.users.partials.include.modal.new_or_edit_user') --}}

@endsection
