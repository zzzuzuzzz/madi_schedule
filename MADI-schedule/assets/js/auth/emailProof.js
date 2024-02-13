$('.btnProofEmail').click(function (event) {
    event.preventDefault();

    $.ajax({
        url: '../../vendor/auth/emailProof.php',
        type: 'POST',
        dataType: 'json',
        success () {
            document.location.href = '../../../php/auth/auth.php'
        }
    });
});