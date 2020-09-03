(function ($)
{ "use strict"

    // filter products //
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#products_table tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });


})(jQuery);