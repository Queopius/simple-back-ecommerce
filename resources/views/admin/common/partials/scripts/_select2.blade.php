<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $('.select2').select2({
        theme: "bootstrap-5",
        width: 'resolve',
        tags: "true",
        maximumInputLength: 20,
        minimumResultsForSearch: 20,
        allowClear: true,
        selectOnClose: true,
    });

    $('.select3').select2({
        theme: "bootstrap-5",
        width: 'resolve',
        tags: "true",
        maximumInputLength: 20,
        minimumResultsForSearch: 20,
        allowClear: true,
        selectOnClose: true,
    });

    $('.select-multiple-max-two').select2({
        theme: "bootstrap-5",
        width: 'resolve',
        tags: "true",
        maximumInputLength: 20,
        minimumResultsForSearch: 20,
        maximumSelectionLength: 2,
        allowClear: true,
        selectOnClose: true,
    });

    $('.select-multiple').select2({
        theme: "bootstrap-5",
        width: 'resolve',
        tags: "true",
        maximumInputLength: 20,
        minimumResultsForSearch: 20,
        allowClear: true,
        selectOnClose: true,
    });
    /* $( document ).ready(function() {
    }); */

    /* function format (option) {
        console.log(option);
        if (!option.id) { return option.text; }
        var baseUrl = //'{thread.author.avatarPath}';
        var ob = '<span><img src="' + baseUrl '" class="rounded-circle" /> ' + state.text + '</span>'	// replace image source with option.img (available in JSON)
        return ob;
    };

    $(".js-example-templating").select2({
        width: "50%",
        allowClear: true,
        templateResult: format,
        templateSelection: function (option) {
            if (option.id.length > 0 ) {
                return option.text + "<i class='fa fa-dot-circle-o'></i>";
            } else {
                return option.text;
            }
        },
        escapeMarkup: function (m) {
            return m;
        }
    }); */
</script>
