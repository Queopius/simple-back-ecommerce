<div class="row mt-2 px-3">
    <div class="col-md-3 pl-3 pt-4">
        <div>
            <h5 class="text-lg">
                {{ trans('Data Product') }}
            </h5>
            <p class="mt-1 text-sm tw-text-gray-600">
                {{ trans('With an photo this product is more pretty.') }}
            </p>
        </div>
    </div>
    <div class="col-md-9 p-md-4 bg-white rounded-lg shadow-sm">
        <div class="row">
            <div class="col-md-12">
                <div class="mt-2 flex items-center mb-3">
                    <span class="overflow-hidden tw-bg-gray-100">
                        <label for="photo"></label>
                        <img src="{{ $product->photo_path }}" class="rounded-circle" width="120" height="120" id="preview_img">
                    </span>
                    <input
                        type="file"
                        name="photo"
                        id="inputGroupFile02"
                        accept="image/*"
                        onchange="loadPreview(this)"
                        class="ml-5 bg-white py-2 px-3 border text-sm rounded"
                    >
                </div>
            </div>

            <x-form.field name="name"
                type="text"
                label="Username"
                value="{{ old('name', $product->name ?? '' ) }}"
            />

            <x-form.field name="price"
                type="text"
                label="Price"
                value="{{ old('price', $product->price ?? '' ) }}"
            />

            <div class="form-group col-12 mt-3">
                <label class="control-label tw-text-gray-800" for="category_id">
                    {{ __('Categories') }}
                    <span class="m-l-5 tw-text-red-400"> *</span>
                </label>
                <select name="category_id"
                    id="category_id"
                    class="form-select">
                    <option value="0">
                        {{ __('Select Category') }}
                    </option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $product->category_id) == $category->id ? ' selected' : '' }}
                            >
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <div class="invalid-feedback active">
                    <i class="fa fa-exclamation-circle fa-fw"></i>
                        @error('category_id') <span>{{ $message }}</span> @enderror
                </div>
            </div>

            <x-form.field name="description"
                type="text"
                label="Description"
                value="{{ old('description', $product->description ?? '' ) }}"
            />

        </div>
    </div>
</div>
