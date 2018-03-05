$(document).ready(function () {

    $("select#registration_country").change(function () {
        var $form = $(this).closest('form');

        var data = {};

        data[$('#registration_first').attr('name')] = $('#registration_first').val();
        data[$('#registration_last').attr('name')] = $('#registration_last').val();
        data[$('#registration_email').attr('name')] = $('#registration_email').val();

        data[$('#registration_country').attr('name')] = $('#registration_country').val();
        data[$('#registration_city').attr('name')] = $('#registration_city').val();

        $.ajax({
            url: $form.attr('action'),
            type: $form.attr('method'),
            data: data,
            success: function (html) {
                $('#registration_city').replaceWith(
                    $(html).find('#registration_city')
                );
            }
        });
    });
});
