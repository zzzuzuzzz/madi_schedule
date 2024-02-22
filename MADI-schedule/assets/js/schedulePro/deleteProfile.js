$('.btnDeleteProfile').click(function (event) {

    let alertToDelete = confirm("Вы точно хотите удалить свой аккаунт?");

    if (alertToDelete) {
        $.ajax({
            url: '../../../vendor/schedulePro/profile/deleteProfile.php',
            type: 'POST',
            dataType: 'json',
            success (data) {
                if (data.status) {
                    document.location.href = '../../../php/bye.php';
                }
            }
        });
    }
});