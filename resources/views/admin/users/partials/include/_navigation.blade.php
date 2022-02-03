@section('title')
    @if ($view == 'index')
        <h4>{{ trans('Users') }}</h4>
    @elseif($view == 'trash')
        <h4>{{ trans('User Trashed') }}</h4>
    @elseif($view == 'edit')
        <h4>{{ trans('Edit User') }}</b></h4>
    @endif
@endsection

@section('buttons')
    <x-create
        class="bg-primary text-white"
        target="newUser" />
    <x-trashed
        route="admin.users.trashed"
        :trashed="$trashed" />
    @if ($view == 'trash' || $view == 'edit')
        <x-back
            :route="url()->previous()" />
    @else
        <x-refresh
            :route="url()->current()" />
    @endif
@endsection
