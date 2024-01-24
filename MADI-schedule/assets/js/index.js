$('.btnEnterToAuth').click(function () {
    document.location.href = '../../php/auth/auth.php'
})

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