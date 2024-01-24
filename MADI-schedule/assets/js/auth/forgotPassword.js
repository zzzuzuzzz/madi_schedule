$('.btnEnterToProof').click(function (event) {
    event.preventDefault();

    $(`input`).removeClass('error')

    let email = $('input[name="email"]').val();

    $.ajax({
        url: '../../vendor/auth/forgotPassword.php',
        type: 'POST',
        dataType: 'json',
        data: {
            email: email
        },
        success (data) {

            if (data.status) {
                document.location.href = '../../../php/auth/proof.php'
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
$('.btnEnterToChangePassword').click(function (event) {
    event.preventDefault();

    $(`input`).removeClass('error')

    let codeProof = $('input[name="codeProof"]').val();

    $.ajax({
        url: '../../vendor/auth/proof.php',
        type: 'POST',
        dataType: 'json',
        data: {
            codeProof: codeProof
        },
        success (data) {

            if (data.status) {
                document.location.href = '../../../php/auth/changePassword.php'
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
$('.btnEnterToAuthFromChangePassword').click(function (event) {
    event.preventDefault();

    $(`input`).removeClass('error')

    let password = $('input[name="password"]').val(),
        passwordConfirm = $('input[name="passwordConfirm"]').val();

    $.ajax({
        url: '../../vendor/auth/changePassword.php',
        type: 'POST',
        dataType: 'json',
        data: {
            password: password,
            passwordConfirm: passwordConfirm,
        },
        success (data) {

            if (data.status) {
                document.location.href = '../../../php/auth/auth.php'
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