$('.saveLocalSchedule').click(function (event) {
    event.preventDefault();

    let lessonName = $('input[name="lessonName"]').val(),
        lessonType = $('input[name="lessonType"]').val(),
        building = $('input[name="building"]').val(),
        audience = $('input[name="audience"]').val(),
        teacher = $('input[name="teacher"]').val(),
        date = $('input[name="date"]').val(),
        time = $('input[name="time"]').val();

    $.ajax({
        url: '../../../vendor/schedulePro/schedule/addSchedule.php',
        type: 'POST',
        dataType: 'json',
        data: {
            lessonName: lessonName,
            lessonType: lessonType,
            building: building,
            audience: audience,
            teacher: teacher,
            date: date,
            time: time
        },
        success (data) {

            if (data.status) {
                alert('Занятие успешно сохранено')
                document.location.href = '../../../php/schedulePro/addSchedule.php'
            } else {
                if (data.type === 1) {
                    alert('Вы не ввели никакие данные. Мы не можем сохранить пустое занятие.')
                } else if (data.type === 2) {
                    alert('Вы не выбрали дату. Выбор даты обязателен')
                } else if (data.type === 3) {
                    alert('Вы не выбрали время. Выбор времени обязателен')
                }
            }
        }
    });
});