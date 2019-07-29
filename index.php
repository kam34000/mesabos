<?php

if (empty($_SESSION['mesabos']['logged'])) {
    header('Location: /home.php');
    exit;
}

include('config/db_connect.php');

$prix = 'Prix : ';
$commited = 'Engagé : ';
$comment = 'Commentaires : ';


//
$sql = 'SELECT * FROM `subscription` ';

// make query & get result

$result = mysqli_query($conn, $sql);

//fetch result as an array
$subscriptions = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free the $result from memory (good practise)
// mysqli_free_result($result);

// // close connection
// mysqli_close($conn);

// print_r($subscriptions);



?>
<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php') ?>

<section class="container grey-text">
    <h4 class="center">Vos abonnements &#x1F4B0;</h4>
    <div class="container">
        <div class="row">
            <?php foreach ($subscriptions as $subscription) { ?>

                <div class="col s6 md3">
                    <div class="card z-depth-0">
                        <div class="card-content center">
                            <h6><?php echo htmlspecialchars($subscription['subscription_name']);  ?></h6>
                            <div><?php echo $prix . htmlspecialchars($subscription['subscription_price']) . '€';  ?></div>
                            <div><?php echo $commited  . htmlspecialchars($subscription['subscription_commited']);  ?></div>
                            <div><?php echo $comment . htmlspecialchars($subscription['subscription_comments']);  ?></div>

                        </div>
                        <div class="card-action right-align">
                            <a class="brand_text" href="details.php?id=<?php echo $subscription['subscription_id'] ?>">Plus d'infos</a>

                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

</section>

<?php include('templates/footer.php'); ?>



</html>