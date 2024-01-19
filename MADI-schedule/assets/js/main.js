/*
    Переход в scheduleLite
*/

$('.btnEnterToScheduleLite').click(function (event) {
    event.preventDefault();

    $(`select`).removeClass('error')

    let select = $('select[name="select"]').val();

    $.ajax({
        url: 'vendor/scheduleLite/session.php',
        type: 'POST',
        dataType: 'json',
        data: {
            select: select
        },
        success (data) {

            if (data.status) {
                if (select === "teacher") {
                    document.location.href = '../../php/scheduleLite/scheduleTeacher.php'
                } else if (select === "student") {
                    document.location.href = '../../php/scheduleLite/scheduleStudent.php'
                }
            } else {
                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`select[name="${field}"]`).addClass('error')
                    })
                }
                $('.msg').removeClass('none').text(data.message);
            }
        }
    });
});


/*
    Авторизация
*/

$('.btnEnterToSchedulePro').click(function (event) {
    event.preventDefault();

    $(`input`).removeClass('error')

    let email = $('input[name="email"]').val(),
        password = $('input[name="password"]').val();

    $.ajax({
        url: '../../vendor/auth/signin.php',
        type: 'POST',
        dataType: 'json',
        data: {
            email: email,
            password: password
        },
        success (data) {

            if (data.status) {
                document.location.href = '../../php/schedulePro/profile.php'
            } else {
                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass('error')
                    })
                }
                $('.msg').removeClass('none').text(data.message);
            }
        }
    });
});


/*
    Регистрация
*/

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


/*
    Востановление пароля
*/

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
                document.location.href = '../../php/auth/proof.php'
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
                document.location.href = '../../php/auth/changePassword.php'
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
                document.location.href = '../../php/auth/auth.php'
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


$('.btnEnterToAuth').click(function () {
    document.location.href = '../../php/auth/auth.php'
})