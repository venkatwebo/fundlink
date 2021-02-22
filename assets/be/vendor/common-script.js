'use strict';
    $(function() {
        // [ Add phone validator ] start
        $.validator.addMethod('phone_format', function(value, element) { return this.optional(element) || /^\(\d{3}\)[ ]\d{3}\-\d{4}$/.test(value); }, 'Invalid phone number.');
        // [ Initialize validation ] start
        $("form").validate({
            ignore: '.ignore, .select2-input',
            focusInvalid: false,
            rules: {
                'validation-email': {
                    required: true,
                    email: true
                },
                'validation-password': {
                    required: true,
                    minlength: 6,
                    maxlength: 20
                },
                'validation-password-confirmation': {
                    required: true,
                    minlength: 6,
                    equalTo: 'input[name="validation-password"]'
                },
                'validation-required': {
                    required: true
                },
                'validation-url': {
                    required: true,
                    url: true
                },
                'validation-phone': {
                    required: true,
                    phone_format: true
                },
                'validation-select': {
                    required: true
                },
                'validation-bs-tagsinput': {
                    required: true
                },
                'validation-text': {
                    required: true
                },
                'validation-file': {
                    required: true
                },
                'validation-switcher': {
                    required: true
                },
                'validation-radios': {
                    required: true
                },
                'validation-radios-custom': {
                    required: true
                },
                'validation-checkbox': {
                    required: true
                },
                'validation-checkbox-custom': {
                    required: true
                },

                // Checkbox groups  //
            },
            // Errors //
            errorPlacement: function errorPlacement(error, element) {
                var $parent = $(element).parents('.form-group');
                // Do not duplicate errors
                if ($parent.find('.jquery-validation-error').length) {
                    return;
                }
                $parent.append(
                    error.addClass('jquery-validation-error small form-text invalid-feedback')
                );
            },
            highlight: function (element) {
                var $el = $(element);
                var $parent = $el.parents('.form-group');
                $el.addClass('is-invalid');
                // Select2 and Tagsinput
                if ($el.hasClass('select2-hidden-accessible') || $el.attr('data-role') === 'tagsinput') {
                    $el.parent().addClass('is-invalid');
                }
            },
            unhighlight: function(element) {
                $(element).parents('.form-group').find('.is-invalid').removeClass('is-invalid');
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });

/* notification starts here*/
function alertPopup(title, message) {
    var from = 'top';
    var align = 'right';
    var icon = 'feather icon-bell';
    var type = title;
    var animIn = 'fadeInRight';
    var animOut = 'fadeOutRight';

    $.growl({
        icon: icon,
        // title: title,
        message: message,
        url: ''
    }, {
        element: 'body',
        type: type,
        allow_dismiss: true,
        placement: {
            from: from,
            align: align
        },
        offset: {
            x: 30,
            y: 30
        },
        spacing: 10,
        z_index: 999999,
        delay: 500,
        timer: 5000,
        url_target: '_blank',
        mouse_over: true,
        animate: {
            enter: animIn,
            exit: animOut
        },
        icon_type: 'class',
        template: '<div data-growl="container" class="alert" role="alert">' + '<button type="button" class="close" data-growl="dismiss">' + '<span aria-hidden="true">&times;</span>' + '<span class="sr-only">Close</span>' + '</button>' + '<span data-growl="icon"></span> ' + '<span data-growl="title"></span>' + '<span data-growl="message" class="text-bold"></span>' + '<a href="javascript:" data-growl="url"></a>' + '</div>'
    });
};
/* notification ends here */

/* common datatable starts here */
var dataDT = false;
function datatable(url, data, column) {
    var ajax = { "url": url, "type": "POST", "data": data};
    dataDT = $('.dt').DataTable({
        fixedHeader: true,
        responsive: true,
        "processing": true,
        "serverSide": true,
        "ajax": ajax,
        "columns": column
    });
}
/* common datatable ends here */

/* modals section starts here */
function confirm_modal(method,url,data) {
    Swal.fire({
        title: 'Are you sure?',
        text: "Don't want to proceed?, you can click cancel.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
      }).then((result) => {
          if (result.isConfirmed) {
              $.ajax({
                  type: method,
                  url: url,
                  data: data,
                  dataType: "json",
                  success: function (response) {
                      console.log(response);
                    if (response.status == "success") {
                        alertPopup('success', response.message);
                    } else if (response.status == "error") {
                        alertPopup('error', response.message);
                    }
                  }
              });
              dataDT.ajax.reload();
        }
      })
}
    
var modal_form = $('#form_modal');
function form_modal(heading, view_url, form_action, form_method) {
    modal_form.find('#modal-heading').text(heading);
    (view_url != "") ? modal_form.find('#modal-body-content').load(view_url) : "";
    modal_form.find('form').attr('action', form_action);
    var method = (form_method != "") ? form_method : "GET";
    modal_form.find('form').attr('method', method);
    modal_form.addClass('md-show');
}

/* $('#form_modal_button').on('click', function () {
    var data = $(this).closest('form');
    var method = data.attr('method');
    var url = data.attr('action');
    form_modal_submit(method, url, data);
}); */

/* custom ajax starts here */
function form_modal_submit(method, url, data,table) {
    $.ajax({
        type: method,
        url: url,
        data: new FormData(data[0]),
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {
            if (response.status == "success") {
                alertPopup('success', response.message);
            } else if (response.status == "error") {
                alertPopup('error', response.message);
            }
            if(table==""){dataDT.ajax.reload();}
            $('.md-modal').removeClass('md-show');
        }
    });
}
/* custom ajax ends here */

var view = $('#view_modal');
function view_modal(heading,content,url) {
    view.find('#modal-heading').text(heading);
    if (content != ""){
        view.find('#modal-body-content').text(content);
    } 
    if (url != "") {
        view.find('#modal-body-content').load(url);
    }

    view.find('#modal-body-content').html(content);
    view.addClass('md-show');
}

/* common cancel modal */
$('.cancelButton').click(function(e) {
    e.preventDefault();
    $('.md-modal').removeClass('md-show');
});
/* common cancel modal */
/* modals section ends here */