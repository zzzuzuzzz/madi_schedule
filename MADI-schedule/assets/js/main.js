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

$('.btnEnter').click(function (event) {
    event.preventDefault();

    $(`input`).removeClass('error')

    let email = $('input[name="email"]').val(),
        password = $('input[name="password"]').val();

    $.ajax({
        url: 'vendor/signin.php',
        type: 'POST',
        dataType: 'json',
        data: {
            email: email,
            password: password
        },
        success (data) {

            if (data.status) {
                document.location.href = '../../php/profile.php'
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
        fullName = $('input[name="fullName"]').val(),
        select = $('select[name="select"]').val();

    $.ajax({
        url: '../vendor/signup.php',
        type: 'POST',
        dataType: 'json',
        data: {
            email: email,
            password: password,
            passwordConfirm: passwordConfirm,
            fullName: fullName,
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