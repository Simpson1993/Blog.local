/**
 * Created by simpson on 15.12.16.
 */
// Send message
$('.sendMessageForm').on('submit', function(e) {
    e.preventDefault();

    var $form = $(this),
        $inputData = $form.serialize();

    $form.find('.has-error').removeClass('has-error');
    $form.find('[type = "submit"]').attr('disabled', true);

    $.post($form.attr('action'), $inputData, function(data){
        $form.find('[type = "submit"]').attr('disabled', false);
        $form[0].reset();
    }, 'json')
        .success(function(data) {
            swal({
                title: data.message,
                type: "success",
                showCancelButton: false,
                confirmButtonText: "Натисніть, щоб продовжити",
                closeOnConfirm: false,
                closeOnCancel: false
            });
        })
        .error(function(data) {
            $.each(data.responseJSON, function(el, index) {
                $form.find('[type = "submit"]').attr('disabled', false);
                $form.find('[name="' + el + '"]').siblings('.text-error')
                    .text(index[0]).parent().addClass('has-error');
            })
        });

    return false;
});