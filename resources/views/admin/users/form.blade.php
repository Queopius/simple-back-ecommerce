@extends('admin.layouts.app')
@include('admin.users.partials.include._navigation')
@section('content')
    @if($user->exists)
        <x-form.form method="PATCH"
            action="{{ route('admin.users.update', $user) }}"
        >
            @include('admin.users.partials.fields.personal_information')
            @include('admin.users.partials.fields.password')
            <x-form.cancel-save route="admin.users"></x-form.cancel-save>
        </x-form.form>
    @else
        <x-form.form method="PATCH"
            action="{{ route('admin.users.store') }}"
        >
            @include('admin.users.partials.fields.personal_information')
            @include('admin.users.partials.fields.password')
            <x-form.cancel-save route="admin.users"></x-form.cancel-save>
        </x-form.form>
    @endif
@endsection
