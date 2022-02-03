<div class="col-9 mb-3">
    <div class="card-body bg-white rounded-5 shadow mb-3">
        <div>
            <h5 class="text-lg text-bold">
                {{ trans('Add Permissions') }}
            </h5>
            <p class="mt-1 text-sm tw-text-gray-600">
                {{ trans('Modify permissions and role') }} {{ $role->name }}
            </p>
        </div>
        <div class="form-row mb-3">
            <div class="form-group col-md-12 col-sm-12">
                <div class="row">
                    @include('admin.settings.security.roles.partials.fields.shared_permissions_groupby')
                </div>
            </div>
        </div>
    </div>
</div>
