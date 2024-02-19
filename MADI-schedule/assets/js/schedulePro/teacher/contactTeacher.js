$('.foundButton').click(function (event) {
    event.preventDefault();

    const links = document.querySelectorAll('.sqlResult');
    links.forEach(link => link.parentNode.removeChild(link));

    $(`input`).removeClass('error')

    let firstName = $('input[name="firstName"]').val(),
        lastName = $('input[name="lastName"]').val();

    $.ajax({
        url: '../../../../vendor/schedulePro/teacher/contactFoundTeacher.php',
        type: 'POST',
        dataType: 'json',
        data: {
            firstName: firstName,
            lastName: lastName
        },
        success (data) {

            if (data.status) {
                document.location.href = '../../../../php/schedulePro/teacher/addContact.php'
            } else {
                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass('error')
                    })
                } else if (data.type === 2) {
                    $('.msg').removeClass('none').text(data.message);
                }
            }
        }
    });
});