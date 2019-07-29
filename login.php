<?php

if(isset($_POST['submit'])){
    //verification formulaire nom abo

  //verification formulaire email
  if (empty($_POST['user_email'])) {
    echo 'Un Email est requis' .'<br>';
 }else{
     echo htmlspecialchars($_POST['user_email']) . '<br>';
}
 //verification formulaire pmot de passe
 if (empty($_POST['user_password'])) {
    echo 'Un mot de passe est requis' .'<br>';
 }else{
     echo htmlspecialchars($_POST['user_password']) . '<br>';
}

} // fin des vérifications du POST


?>
<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php') ?>

<section class="container grey-text">
    <h4 class="center">Bon retour parmi nous &#x1F493;</h4>
    <form action="" class="white" action ="add.php" method="POST">
    <label for="">E-mail</label>
        <input type="email"  name="user_email">
        <label for="">Nom de l'abonnement</label>
        <label for="">Mot de passe</label>
        <input type="password"  name="user_password">
        
        <div class="center">
            <input type="submit" name="submit" value="Se connecter" class="btn brand ">
        </div>
    </form>

</section>

<?php include('templates/footer.php'); ?>
    