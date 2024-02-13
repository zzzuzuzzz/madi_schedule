$('.saveClassVar').click(function (event) {
    event.preventDefault();

    $(`selectClass`).removeClass('error')

    let select = $('select[name="selectClass"]').val();

    $.ajax({
        url: '../../../vendor/schedulePro/teacher/profileVendorTeacherClassVar.php',
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

$('.saveLanguageVar').click(function (event) {
    event.preventDefault();

    $(`selectLanguage`).removeClass('error')

    let select = $('select[name="selectLanguage"]').val();

    $.ajax({
        url: '../../../vendor/schedulePro/forStudentAndTeacher/profileSettingLanguage.php',
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

$('.saveBackgroundVar').click(function (event) {
    event.preventDefault();

    $(`selectBackground`).removeClass('error')

    let select = $('select[name="selectBackground"]').val();

    $.ajax({
        url: '../../../vendor/schedulePro/forStudentAndTeacher/profileSettingBackground.php',
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