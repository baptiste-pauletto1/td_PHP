<?php
    include 'utils.inc.php';
    start_page('Page connectée !');
?>

<?php
    $login = $_POST['login'];
    $mdp = $_POST['passwd'];

    require 'connection.php';

    $query = "SELECT PSEUDO,MDP FROM USER WHERE PSEUDO = '$login' AND MDP = '$mdp'";

    if(!($dbResult = mysqli_query($conn, $query)))
    {
        echo 'Erreur dans requête<br />';
        // Affiche le type d'erreur.
        echo 'Erreur : ' . mysqli_error($conn) . '<br/>';
        // Affiche la requête envoyée.
        echo 'Requête : ' . $query . '<br/>';
        exit();
    }
        $dbRow = mysqli_fetch_assoc($dbResult);

if ($login == $dbRow['PSEUDO'] && $login !=null && $mdp == $dbRow['MDP']){

    session_start();
    $_SESSION['mdp']= 'ok';
    $_SESSION['login']='ok';

    echo 'Bravo tu es bien identifié ', $login;
    header('Location: pageConnectee.php');

}
else{
    header('Location: login.php?step=ERROR');
}
?>

<?php
    end_page();
?>

