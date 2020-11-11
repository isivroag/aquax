imprimirdocumento()({
    $.ajax({
        url: 'ticket.php',
        type: 'POST',
        success: function(response) {
            if (response == 1) {
                alert('Imprimiendo....');
            } else {
                alert('Error');
            }
        }
    });
});