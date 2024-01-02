$(document).ready(function () {
    'use strict';

	$('form').each(function () {
		$(this).submit((event) => {
			event.preventDefault();
			event.stopPropagation();

			const targetUrl = $(this).attr('action');
            const formContents = {};
            
            console.info('--- BEGIN FORM INFO ---');
            console.log(targetUrl);
            console.log(formContents);
            console.info('--- END FORM INFO ---');
            
			$(this)
				.find(':input')
				.each(function () {
					if ($(this).attr('type') !== 'submit') {
						formContents[$(this).attr('name')] = $(this).val();
					}
				});

			$(this)
				.find('textarea')
				.each(function () {
					formContents[$(this).attr('name')] = $(this).val();
				});

			$.post(targetUrl, formContents, 'json')
				.done(({ message, status, redirect_to }) => {
					console.log('[Status] ', status);
					console.log('[Message] ', message);

					$('#feedback').text(message);

					if (status === 'error') {
                        console.error('Server says something is not OK');
                        create_popup('red', 'Server says something is not OK');
					} else {
						console.info('Server says everything is OK');
                        create_popup('green', 'Server says everything is OK');

                        if (redirect_to) {
							console.info(`Redirecting to ${redirect_to}`);
							window.location.href = redirect_to;
						}
					}
				})
				.fail(() => {
					console.error('An error occurred while making the AJAX request');
				});
		});
	});
});
