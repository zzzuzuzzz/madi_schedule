$('.saveClassVar').click(function (event) {
    event.preventDefault();

    $(`select`).removeClass('error')

    let select = $('select[name="select"]').val();

    $.ajax({
        url: '../../../vendor/schedulePro/teacher/profileVendorTeacher.php',
        type: 'POST',
        dataType: 'json',
        data: {
            select: select
        },
        success (data) {

            if (data.status) {
                document.location.href = '../../../php/schedulePro/teacher/profileTeacher.php'
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

$('.saveLanguage').click(function (event) {
    event.preventDefault();

    $(`select`).removeClass('error')

    let select = $('select[name="select"]').val();

    $.ajax({
        url: '../../../vendor/schedulePro/teacher/profileSettingTeacherLanguage.php',
        type: 'POST',
        dataType: 'json',
        data: {
            select: select
        },
        success (data) {

            if (data.status) {
                document.location.href = '../../../php/schedulePro/teacher/profileTeacher.php'
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

$('.saveBackground').click(function (event) {
    event.preventDefault();

    $(`select`).removeClass('error')

    let select = $('select[name="select"]').val();

    $.ajax({
        url: '../../../vendor/schedulePro/teacher/profileSettingTeacherBackground.php',
        type: 'POST',
        dataType: 'json',
        data: {
            select: select
        },
        success (data) {

            if (data.status) {
                document.location.href = '../../../php/schedulePro/teacher/profileTeacher.php'
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