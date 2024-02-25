let today = new Date();
new AirDatepicker('#calendar', {
    inline: true,
    buttons: ('today'),
    dateFormat: 'yyyy-MM-dd',
    selectedDates: [today],
    onSelect (formattedDate) {

        const links = document.querySelectorAll('.sqlResult');
        links.forEach(link => link.parentNode.removeChild(link));

        let date = formattedDate['formattedDate'];

        $.ajax({
            url: '../../vendor/schedulePro/task/viewTask.php',
            type: 'POST',
            dataType: 'json',
            data: {
                date: date
            },
            success (data) {

                if (data.status) {
                    document.location.href = 'task.php'
                } else {
                    if (data.type === 1) {
                        alert('Вы не ввели никакие данные. Мы не можем сохранить пустое задание.')
                    } else if (data.type === 2) {
                        alert('Вы не выбрали дату. Выбор даты обязателен')
                    }
                }
            }
        })
    }
})