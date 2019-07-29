<?php

include('config/db_connect.php');

$subscription_name = $subscription_category = $subscription_price ='';

$errors = array('subscription_name'=>'', 'subscription_category'=>'','subscription_price'=>'');

if(isset($_POST['submit'])){
    //verification formulaire nom abo

    if (empty($_POST['subscription_name'])) {
        $errors['subscription_name'] = 'Un nom d\'abonnement est requis' .'<br>';
    }else{
        $subscription_name = $_POST['subscription_name'];
        if(!preg_match('/^[a-zA-Z]{1,100}$/',$subscription_name )){
            $errors['subscription_name'] = 'Nom d\'abonnement trop long' . '<br>';
        }
    }
    //verification formulaire catégorie

    if (empty($_POST['subscription_category'])) {
        $errors['subscription_category'] = 'Une catégorie est requise' .'<br>';
    }else{
       $category_name = $_POST['subscription_category'];
       if(!preg_match('/^[a-zA-Z]{1,100}$/',$category_name )){
        $errors['subscription_category'] =  'Nom de catégorie trop longue';
       }
    }
    //verification formulaire prix de l'abo

    if (empty($_POST['subscription_price'])) {
        $errors['subscription_price'] = 'Un prix d\'abonnement est requis' .'<br>';
    }else{
        $subscription_price = $_POST['subscription_price'];
        if(!preg_match('/^[0-9]{1,2}[,..]{0,1}[0-9]{0,2}$/', $subscription_price)){
            $errors['subscription_price'] = 'Erreur de saisie ou abonnement superieur à 10000€ non prit en compte';
        // }else{
        //     echo 'l'abo vaut' . $subscription_price;
        }
    }

    if (array_filter($errors)) {
        echo 'erreurs dans le formulaire';
    } else {
        $subscription_name= mysqli_real_escape_string($conn, $_POST['subscription_name']);
        $subscription_category= mysqli_real_escape_string($conn, $_POST['subscription_category']);
        $subscription_price= mysqli_real_escape_string($conn, $_POST['subscription_price']);

    //create SQL

    $sql = "INSERT INTO `subscription`(`subscription_name`,`subscription_category`,`subscription_price`) VALUES('$subscription_name','$category_name','$subscription_price')";
    
    // Sauvegarder dans la bdd et vérifer

    if(mysqli_query($conn,$sql)){
        //succès
        header('Location: index.php');
    }else{
        //erreur
        echo 'erreur: '. mysqli_error($conn);
    }
        
    }

    

    

} // fin des vérifications du POST


?>
<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php') ?>

<section class="container grey-text">
    <h4 class="center"> Ajouter un abonnement</h4>
    <form action="" class="white" action ="add.php" method="POST">
        <label for="">Nom de l'abonnement</label>
        <input type="text"  name="subscription_name" value="<?php echo htmlspecialchars($subscription_name) ?>">
        <div class="red-text"><?php echo $errors['subscription_name']; ?></div>
        <label for="">Catégorie</label>
        <input type="text"  name="subscription_category" value="<?php echo htmlspecialchars($subscription_category) ?>">
        <div class="red-text"><?php echo $errors['subscription_category']; ?></div>
        <label for="">Prix de l'abonnement</label>
        <input type="text"  name="subscription_price" value="<?php echo htmlspecialchars($subscription_price) ?>">
        <div class="red-text"><?php echo $errors['subscription_price']; ?></div>
        <div class="center">
            <input type="submit" name="submit" value="Ajouter cet abonnement" class="btn brand ">
        </div>
    </form>

</section>

<?php include('templates/footer.php'); ?>
    

</html>