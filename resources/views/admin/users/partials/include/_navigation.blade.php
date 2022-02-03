@section('title')
    @if ($view == 'index')
        {{ trans('Users') }}
    @elseif($view == 'trash')
        {{ trans('User Trashed') }}
    @elseif($view == 'create')
        {{ trans('Create User') }}
    @elseif($view == 'edit')
        {{ trans('Edit User') }}
    @endif
@endsection

@section('buttons')
    <x-create
        class="bg-primary text-white"
        route="{{ route('admin.users.create') }}" />

    <x-trashed
        route="admin.users.trashed"
        :trashed="$trashed" />

    @if ($view == 'trash' || $view == 'edit')
        <x-back
            route="{{ route('admin.users') }}" />
    @else
        <x-refresh
            :route="url()->current()" />
    @endif
@endsection
