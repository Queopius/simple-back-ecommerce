@extends('admin.layouts.app')
@include('admin.products.partials.include._navigation')
@section('content')
    @if($product->exists)
        <x-form.form method="PATCH"
            action="{{ route('admin.products.update', $product) }}"
        >
            @include('admin.products.partials.fields.fields')
            <x-form.cancel-save route="admin.products"></x-form.cancel-save>
        </x-form.form>
    @else
        <x-form.form method="PATCH"
            action="{{ route('admin.products.store') }}"
        >
            @include('admin.products.partials.fields.fields')
            <x-form.cancel-save route="admin.products"></x-form.cancel-save>
        </x-form.form>
    @endif
@endsection

@push('styles')
@include('admin.common.partials.styles._select2')
@endpush

@push('scripts')
@include('admin.common.partials.scripts._select2')
@endpush
