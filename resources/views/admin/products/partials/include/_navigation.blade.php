@section('title')
    @if ($view == 'index')
        {{ trans('Products') }}
    @elseif($view == 'trash')
        {{ trans('Product Trashed') }}
    @elseif($view == 'create')
        {{ trans('Create Product') }}
    @elseif($view == 'edit')
        {{ trans('Edit Product') }}
    @endif
@endsection

@section('buttons')
    <x-create
        class="bg-primary text-white"
        route="{{ route('admin.products.create') }}" />

    <x-trashed
        route="admin.products.trashed"
        :trashed="$trashed" />

    @if ($view == 'trash' || $view == 'edit')
        <x-back
            route="{{ route('admin.products') }}" />
    @else
        <x-refresh
            :route="url()->current()" />
    @endif
@endsection
