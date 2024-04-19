<?php
function alerta($texto) {
    echo "<script> alert('$texto') </script>";
}

function redirect($pagina) {
    echo "<script>window.location.replace('$pagina')</script>";
}
