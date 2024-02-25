$('.saveLocalTask').click(function (event) {
    event.preventDefault();

    let title = $('input[name="title"]').val(),
        text = $('input[name="text"]').val(),
        date = $('input[name="date"]').val();

    $.ajax({
        url: '../../../vendor/schedulePro/task/addTask.php',
        type: 'POST',
        dataType: 'json',
        data: {
            title: title,
            text: text,
            date: date
        },
        success (data) {

            if (data.status) {
                alert('Задание успешно сохранено')
                document.location.href = '../../../php/schedulePro/addTask.php'
            } else {
                if (data.type === 1) {
                    alert('Вы не ввели никакие данные. Мы не можем сохранить пустое задание.')
                } else if (data.type === 2) {
                    alert('Вы не выбрали дату. Выбор даты обязателен')
                }
            }
        }
    });
});