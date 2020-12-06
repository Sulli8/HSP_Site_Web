<?php
//On démarre une session_start
    session_start();
    //Ensuite on détruie la session
    session_destroy();
    //On rédirige vers l'accueil
    header("location: ../view/index.php");
    //Fin de programme
    exit();

?>
