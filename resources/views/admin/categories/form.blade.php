@extends('admin.layouts.app')
@include('admin.categories.partials.include._navigation')
@section('content')
    @if($category->exists)
        <x-form.form method="PATCH"
            action="{{ route('admin.categories.update', $category) }}"
        >
            @include('admin.categories.partials.fields.fields')
            <x-form.cancel-save route="admin.categories"></x-form.cancel-save>
        </x-form.form>
    @else
        <x-form.form method="PATCH"
            action="{{ route('admin.categories.store') }}"
        >
            @include('admin.categories.partials.fields.fields')
            <x-form.cancel-save route="admin.categories"></x-form.cancel-save>
        </x-form.form>
    @endif
@endsection
