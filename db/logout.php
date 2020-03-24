<?php 
session_start();

unset($_SESSION['nome']);
unset($_SESSION['email']);
unset($_SESSION['id_perfil_fk']);

session_destroy();

    echo "<script>
location.href='http://localhost/bootstrap2/index.php';
</script>";

?>