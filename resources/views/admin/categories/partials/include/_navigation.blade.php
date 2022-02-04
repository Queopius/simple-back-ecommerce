@section('title')
    @if ($view == 'index')
        {{ trans('Categories') }}
    @elseif($view == 'trash')
        {{ trans('Category Trashed') }}
    @elseif($view == 'create')
        {{ trans('Create Category') }}
    @elseif($view == 'edit')
        {{ trans('Edit Category') }}
    @endif
@endsection

@section('buttons')
    <x-create
        class="bg-primary text-white"
        route="{{ route('admin.categories.create') }}" />

    <x-trashed
        route="admin.categories.trashed"
        :trashed="$trashed" />

    @if ($view == 'trash' || $view == 'edit')
        <x-back
            route="{{ route('admin.categories') }}" />
    @else
        <x-refresh
            :route="url()->current()" />
    @endif
@endsection
