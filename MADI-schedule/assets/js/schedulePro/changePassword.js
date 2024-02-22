$('.btnChangePassword').click(function (event) {
    event.preventDefault();

    $(`input`).removeClass('error')

    let password = $('input[name="password"]').val(),
        passwordConfirm = $('input[name="passwordConfirm"]').val();

    $.ajax({
        url: '../../vendor/schedulePro/profile/changePassword.php',
        type: 'POST',
        dataType: 'json',
        data: {
            password: password,
            passwordConfirm: passwordConfirm,
        },
        success (data) {

            if (data.status) {
                alert('Пароль успешно изменен')
                document.location.href = '../../../php/schedulePro/profile.php'
            } else {
                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass('error');
                    })
                }
                $('.msg').removeClass('none').text(data.message);
            }
        }
    });
});