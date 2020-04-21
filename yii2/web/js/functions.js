jQuery(function($) {
    $('#users_table').DataTable({
    	// ordering: true
    });

    $(document).on("pjax:success", function () {
        $('#users_table').DataTable({
            // ordering: true
        });
    });
});