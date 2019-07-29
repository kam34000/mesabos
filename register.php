<?php

include('config/db_connect.php');

$user_firstname = $user_name = $user_number = $user_email = $user_password ='';

$errors = array ('user_firstname'=>'', 'user_name'=>'','user_number'=>'','user_email'=>'','user_password'=>'');


if(isset($_POST['submit'])){
    //verification formulaire du prénom

    if (empty($_POST['user_firstname'])) {
        $errors['user_firstname'] ='Un prénom est requis' .'<br>';
    }else{
        $user_firstname = $_POST['user_firstname'];
        if(!preg_match('/^[a-zA-Z\s]{2,70}$/', $user_firstname)){
            $errors['user_firstname'] = 'le prénom est trop long' . '<br>';
        }
    }
    //verification formulaire du nom 

    if (empty($_POST['user_name'])) {
        $errors['user_name'] = 'Un nom est requis' .'<br>';
    }else{
        $user_name = $_POST['user_name'];
        if(!preg_match('/^[a-zA-Z\s]{2,70}$/', $user_name)){
            $errors['user_name'] = 'le nom est trop long' . '<br>';
        }
    }
    //verification formulaire nunéro de tel

    if (empty($_POST['user_number'])) {
        $errors['user_number'] ='Un numéro de téléphone est requis' .'<br>';
    }else{
        $user_number = $_POST['user_number'];
        if(!preg_match('/^0\d{9}$/', $user_number)){
            $errors['user_number'] = 'Format du numéro de téléphone non valide';
        }
    }
    //verification formulaire email
    if (empty($_POST['user_email'])) {
        $errors['user_email'] = 'Un Email est requis' .'<br>';
     }else{
         $user_email = $_POST['user_email'];
         if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
            $errors['user_email'] = 'Adresse email non valide' . '<br>';
         }
         
    }
     //verification formulaire pmot de passe
     if (empty($_POST['user_password'])) {
        $errors['user_password'] = 'Un mot de passe est requis' .'<br>';
     }else{
        $user_password = $_POST['user_password'];
        if(!preg_match('/^[a-zA-Z0-9]{6,}$/', $user_password)){
            $errors['user_password'] = 'Mot de passe non valide' . '<br>' ;
        }
        
    }

    if (array_filter($errors)) {
        echo 'erreurs dans le formulaire';
    } else {

        $user_firstname= mysqli_real_escape_string($conn, $_POST['user_firstname']);
        $user_name= mysqli_real_escape_string($conn, $_POST['user_name']);
        $usernumber= mysqli_real_escape_string($conn, $_POST['user_number']);
        $user_email= mysqli_real_escape_string($conn, $_POST['user_email']);
        $user_password= mysqli_real_escape_string($conn, $_POST['user_password']);
 
        //create SQL

    $sql = "INSERT INTO `user`(`user_firstname`,`user_name`,`user_number`,'user_email','user_password') VALUES('$user_firstname','$user_name','$user_number','$user_email','$user_password)";
    
    // Sauvegarder dans la bdd et vérifer

    if(mysqli_query($conn,$sql)){
        //succès
        header('Location: login.php');
    }else{
        //erreur
        echo 'erreur: '. mysqli_error($conn);
    }



        header('location: index.php');
    }

    
} // fin des vérifications du POST


?>
<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php') ?>

<section class="container grey-text">
    <h4 class="center"> L'inscription est gratuite</h4>
    <form action="" class="white" action ="add.php" method="POST">
        <label for="">Prénom</label>
        <input type="text"  name="user_firstname" value="<?php echo htmlspecialchars($user_firstname) ?>">
        <div class="red-text"><?php echo $errors['user_firstname']; ?></div>
        <label for="">Nom</label>
        <input type="text"  name="user_name" value="<?php echo htmlspecialchars($user_name) ?>">
        <div class="red-text"><?php echo $errors['user_name']; ?></div>
        <label for="">Numéro de téléphone</label>
        <input type="text"  name="user_number" value="<?php echo htmlspecialchars($user_number) ?>">
        <div class="red-text"><?php echo $errors['user_number']; ?></div>
        <label for="">E-mail</label>
        <input type="text"  name="user_email" value="<?php echo htmlspecialchars($user_email) ?>">
        <div class="red-text"><?php echo $errors['user_email']; ?></div>
        <label for="">Mot de passe</label>
        <input type="password"  name="user_password" value="<?php echo htmlspecialchars($user_password) ?>">
        <div class="red-text"><?php echo $errors['user_password']; ?></div>
        <div class="center">
            <input type="submit" name="submit" value="s'incrire" class="btn brand ">
        </div>
    </form>

</section>

<?php include('templates/footer.php'); ?>
    