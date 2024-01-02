$(document).ready(function() {
    $('.action-save').on('click', function(e) {
        e.preventDefault();
        console.log('save action');

        let name = $(this).attr('data-name');
        let value = $(this).parent().find('input[name="' + name + '"]').val();

        let form = $(this).closest('form');
        let action = form.attr('action');

        let data = {
            [name]: value
        };

        $.post(action, data, 'json')
            .done(({
                message,
                status,
                redirect_to
            }) => {
                console.log('status[' + status + ']');
                console.log('message[' + message + ']');
                console.log('redirect_to[' + redirect_to + ']');
                $('#feedback').text(message);

                if (status === 'success') {
                    if (typeof create_popup === 'function') {
                        create_popup('green', 'information saved!');
                    } else {
                        alert('[no popup] information saved!');
                    }
                } else {
                    if (typeof create_popup === 'function') {
                        create_popup('red', 'information not saved!');
                    } else {
                        alert('[no popup] information not saved!');
                    }
                }
            })
    });
});