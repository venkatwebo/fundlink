var search_json = new Object();
if ($('.dt').hasClass('cmslist') === true) {
    var column = [
        { "data": "id" },
        { "data": "title" },
        { "data": "last_update" },
        { "data": "action" }
    ];
    datatable(base_url + "dt/cms-list", { search_json: search_json }, column);
}

$(document).ready(function() {
    $(function() {
        // [ Initialize validation ] start
        $('form').validate({
            rules: {
               
            }, submitHandler: function (form) {
                form.submit();
            }
        });
    });
});