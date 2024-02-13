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
                if (data.type === 2) {
                    document.location.href = '../../../php/schedulePro/teacher/scheduleTeacher.php'
                } else if (data.type === 3) {
                    document.location.href = '../../../php/schedulePro/student/scheduleStudent.php'
                }
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