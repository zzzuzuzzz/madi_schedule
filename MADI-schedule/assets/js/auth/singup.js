$('.btnRegister').click(function (event) {
    event.preventDefault();

    $(`input`).removeClass('error')
    $(`select`).removeClass('error')


    let email = $('input[name="email"]').val(),
        password = $('input[name="password"]').val(),
        passwordConfirm = $('input[name="passwordConfirm"]').val(),
        firstName = $('input[name="firstName"]').val(),
        lastName = $('input[name="lastName"]').val(),
        select = $('select[name="select"]').val();

    $.ajax({
        url: '../../vendor/auth/signup.php',
        type: 'POST',
        dataType: 'json',
        data: {
            email: email,
            password: password,
            passwordConfirm: passwordConfirm,
            firstName: firstName,
            lastName: lastName,
            select: select
        },
        success (data) {

            if (data.status) {
                document.location.href = '../../php/auth/auth.php'
            } else {
                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass('error');
                        $(`select[name="${field}"]`).addClass('error')
                    })
                }
                $('.msg').removeClass('none').text(data.message);
            }
        }
    });
});
