@extends('admin.layouts.app')

@section('content-fluid')
    <div class="container-fluid">
        <div class="row justify-content-center px-3">
            <div class="col-lg-12">
                <h4 class="mb-n3">{{ trans('Dashboard') }}</h4>

                <div class="row mt-3">
                    <x-card-graph model="Users" count="150" title="Grafic">
                        ffffffffff
                    </x-card-graph>

                    <x-card-graph model="Products" count="150" title="Grafic">
                        ffffffffff
                    </x-card-graph>

                    <x-card-graph model="Reviews" count="150" title="Grafic">
                        ffffffffff
                    </x-card-graph>

                </div>
            </div>
        </div>
    </div>
@endsection
