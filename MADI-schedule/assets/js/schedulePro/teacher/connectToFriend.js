$('.sqlResultButtonToFriends').click(function (event) {

    let id = this.id

    $.ajax({
        url: '../../../../vendor/schedulePro/teacher/connectToFriend.php',
        type: 'POST',
        dataType: 'json',
        data: {
            id: id
        },
        success (data) {

            if (data.status) {
                alert('Запрос успешно отправлен. Когда пользователь одобрит его, он появится у вас в контактах.')
            } else {
                if (data.type === 1) {
                    alert('Запрос уже отправлен. Если вы этого не делали, обратитесь в службу поддержки.')
                } else if (data.type === 2) {
                    alert('Пользователь уже у вас в друзьях.')
                }
            }
        }
    });
});