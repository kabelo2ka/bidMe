/*
<a href="posts/2" data-method="delete"> <---- We want to send an HTTP DELETE request

- Or, request confirmation in the process -

<a href="posts/2" data-method="delete" data-confirm="Are you sure?">
*/

(function(window, $, undefined) {

    var Laravel = {
        initialize: function() {
            this.methodLinks = $('a[data-method]');
            this.token = $('a[data-token]');
            this.registerEvents();
        },

        registerEvents: function() {
            this.methodLinks.on('click', this.handleMethod);
        },

        handleMethod: function(e) {
            e.preventDefault();

            let link = $(this);
            let httpMethod = link.data('method').toUpperCase();
            let form;

            // If the data-method attribute is not PUT or DELETE,
            // then we don't know what to do. Just ignore.
            if ($.inArray(httpMethod, ['PUT', 'DELETE']) === -1) {
                return false
            }

            Laravel
                .verifyConfirm(link)
                .done(function () {
                    form = Laravel.createForm(link);
                    form.submit()
                })
        },

        verifyConfirm: function(link) {
            let confirm = new $.Deferred();

            let userResponse = window.confirm(link.data('confirm'));

            if (userResponse) {
                confirm.resolve(link)
            } else {
                confirm.reject(link)
            }

            // bootbox.confirm(link.data('confirm'), function(result) {
            //     if (result) {
            //         confirm.resolve(link)
            //     } else {
            //         confirm.reject(link)
            //     }
            // })

            return confirm.promise()
        },

        createForm: function(link) {
            let form =
                $('<form>', {
                    'method': 'POST',
                    'action': link.attr('href')
                });

            let token =
                $('<input>', {
                    'type': 'hidden',
                    'name': '_token',
                    'value': link.data('token') ? link.data('token') : $('meta[name=csrf-token]')[0].content
                });

            let hiddenInput =
                $('<input>', {
                    'name': '_method',
                    'type': 'hidden',
                    'value': link.data('method')
                });

            return form.append(token, hiddenInput)
                .appendTo('body');
        }
    };

    Laravel.initialize();

})(window, jQuery);