<main>
    @yield('child-navbar')
    <div class="container-fluid border-bottom-0">
        <div class="row pe-2">
            <div class="col-md-2 pt-3 mt-4">
                <div class="ps-3">
                    @yield('title')
                </div>
                @yield('sidebar')
            </div>
            <div class="col-md-10">
                <div class="row justify-content-between pe-3">
                    <div class="col-md-4 pt-3 mt-4">
                        @yield('subtitle')
                        @yield('filter-status')
                    </div>
                    <div class="col-md-7 pt-3 mt-3">
                        @yield('buttons')
                    </div>
                    <div class="col-12">
                        <div class="collapse collapsing" id="collapseExample" data-bs-auto-close="outside">
                            <div class="card card-body rounded-5 border-0 shadow">
                                @yield('search')
                            </div>
                        </div>
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    @yield('content-fluid')
</main>
