@props(['route'])

<div class="row justify-content-end mt-2">
    <div class="col-md-9">
        <a href="{{ route($route) }}" class="btn btn-secondary mr-4 float-end ms-2 mt-3 mb-3 px-5">
            {{ __('Cancelar') }}
        </a>
        <button type="submit"
            class="btn btn-primary float-end mt-3 mb-3 px-5"
        >
            {{ __('global.save') }}
        </button>
    </div>
</div>
