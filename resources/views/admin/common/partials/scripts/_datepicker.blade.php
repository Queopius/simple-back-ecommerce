<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" charset="UTF-8"></script>

{{-- <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script> --}}

<script type="text/javascript">
    $(function() {
        $('#from').datepicker({
            language: "es",
            format: 'dd/mm/yyyy',
            todayHighlight: true,
            todayBtn: "linked",
            toggleActive: true,
            orientation: 'bottom',
            calendarWeeks: true,
            /* container: 'body', */
            /* template: {
                leftArrow: '&laquo;',
                rightArrow: '&raquo;'
            } */
        });

        $('#to').datepicker({
            language: "es",
            format: 'dd/mm/yyyy',
            todayHighlight: true,
            todayBtn: "linked",
            toggleActive: true,
            orientation: 'bottom',
            calendarWeeks: true,
            /* container: 'body', */
            /* template: {
                leftArrow: '&laquo;',
                rightArrow: '&raquo;'
            } */
        });

        $('#published_at').datepicker({
            language: "es",
            format: 'dd/mm/yyyy',
            todayHighlight: true,
            todayBtn: "linked",
            toggleActive: true,
            orientation: 'bottom',
            calendarWeeks: true,
            /* container: 'body', */
            /* template: {
                leftArrow: '&laquo;',
                rightArrow: '&raquo;'
            } */
        });
        //$('#datepicker').datepicker();
        /* $('.collapse').on('click', function () {
            $('.collapse').toggleClass('active');
        }); */
    });

    /* $(document).on('click',function(){
        $('.collapse').collapse('show');
    }) */
</script>

