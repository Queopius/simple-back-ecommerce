<div class="row mt-2 px-3">
    <div class="col-md-3 pl-3 pt-4">
        <div>
            <h5 class="text-lg">
                {{ trans('Data Category') }}
            </h5>
            <p class="mt-1 text-sm tw-text-gray-600">
                {{ trans('With an photo this category is more pretty.') }}
            </p>
        </div>
    </div>
    <div class="col-md-9 p-md-4 bg-white rounded-lg shadow-sm">
        <div class="row">
            <x-form.field name="name"
                type="text"
                label="Name"
                value="{{ old('name', $category->name ?? '' ) }}"
            />

            <x-form.field name="description"
                type="text"
                label="Description"
                value="{{ old('description', $category->description ?? '' ) }}"
            />

        </div>
    </div>
</div>
