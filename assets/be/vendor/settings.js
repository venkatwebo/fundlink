'use strict';
$(document).ready(function() {
    $(function() {
        // [ Initialize validation ] start
        $('#settingsform').validate({
            rules: {
                "sitename":{
                    required: true,
                },
                "author":{
                    required: true,
                },
                "meta_keyword":{
                    required: true,
                },
                "meta_description":{
                    required: true,
                },
                "logo":{
                    required: false, accept: "image/jpg,image/jpeg,image/png"
                },
                "favicon":{
                    required: false, accept: "image/x-icon,image/x-ico,image/vnd.microsoft.icon"
                }
            }, submitHandler: function (form) {
                form.submit();
                // var url = base_url + "settings";
                // var data = $("#settingsform");
                // customajax("POST", url, data);
            }
        });
    });
});

