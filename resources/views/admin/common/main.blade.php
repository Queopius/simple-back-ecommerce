<main>
    <div class="container-fluid border-bottom-0">
        <div class="row justify-content-center">
            <div class="col-md-2 pt-3 mt-4">
                <div class="ps-3 h4">
                    @yield('title')
                </div>
            </div>
            <div class="col-md-8 pt-3 mt-3">
                @yield('buttons')
            </div>
            <div class="col-md-10">
                @yield('content')
            </div>
        </div>
    </div>
</main>
