(function () {

    var laravel = {
        initialize: function () {
            this.methodLinks = $('a[data-method]');
            this.registerEvents();
        },

        registerEvents: function () {
            this.methodLinks.on('click', this.handleMethod);
        },


        handleMethod: function (e) {
            e.preventDefault();
            var link = $(this);

            var httpMethod = link.data('method').toUpperCase();
            var allowedMethods = ['PUT', 'DELETE'];
            var extraMsg = link.data('modal-text');
            var sureMsg = link.data('modal-sure');
            var headerText = link.data('modal-header');
            var buttonOk = link.data('modal-ok');
            var buttonCancel = link.data('modal-cancel');
            var msg = sureMsg + '&nbsp;' + extraMsg;

            // If the data-method attribute is not PUT or DELETE,
            // then we don't know what to do. Just ignore.
            if ($.inArray(httpMethod, allowedMethods) === -1) {
                return;
            }

            swal({
                    title: msg,
                    type: "warning",
                    html: true,
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: buttonOk,
                    cancelButtonText: buttonCancel,
                    closeOnConfirm: false,
                    closeOnCancel: true
                },
                function (isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: link.attr('href'),
                            method: link.data('method'),
                            success: function (data) {
                                if(data.result){
                                    location.reload();
                                }
                            },
                            fail: function () {
                                alert('fail');
                            }
                        });
                    }
                }
            );
        }
    };
    laravel.initialize();
})();