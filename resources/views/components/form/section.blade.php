<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center border-0">
             {{-- style="display: flex; overflow-y: scroll" --}}
            <div class="col-md-12 border-0">
                <div {{ $attributes->merge(['class' => 'card border-0 bg-transparent ']) }}>

                    {{ $slot }}

                </div>
            </div>
        </div>
    </div>
</section>
