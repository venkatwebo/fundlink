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