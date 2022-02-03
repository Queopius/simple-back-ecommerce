<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.form-trash').submit(function(e){
        e.preventDefault();

        Swal.fire({
            title: 'Are you sure?',
            text: "You can restore by going to the trash!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                this.submit();
            }
        })
    });

    $('.form-destroy').submit(function(e){
        e.preventDefault();

        Swal.fire({
            title: 'Are you sure?',
            text: "The elimination of this data will be irreversible!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                this.submit();
            }
        })
    })
</script>