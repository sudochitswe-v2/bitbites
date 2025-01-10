<?php
function showMessage(string $title, string $message, string $type = 'success')
{
    echo
    "<script>
    Swal.fire({
        title: '$title',
        text: '$message',
        icon: '$type',
        confirmButtonText: 'Ok'
    })
    </script>";
}
