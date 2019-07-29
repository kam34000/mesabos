<?php 
include('config/db_connect.php');
// check GET request id param

if(isset($_GET['id'])){
		
    // escape sql chars
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    // make sql
    $sql = "SELECT * FROM subscription WHERE subscription_id = $id";
    // get the query result
    $result = mysqli_query($conn, $sql);
    // fetch result in array format
    $subscription = mysqli_fetch_assoc($result);
    // mysqli_free_result($result);
    // mysqli_close($conn);

    print_r($result);
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php') ?>

<h2>Details</h2>

<div class="container center">
		<?php if($subscription): ?>
			<h4><?php echo htmlspecialchars($subscription['subscription_name']); ?></h4>
			<p>Catégorie <?php echo htmlspecialchars($subscription['subscription_category']); ?></p>
			<p><?php echo $subscription['subscription_price']; ?></p>
			<h5>Commentaires :</h5>
			<p><?php echo $subscription['subscription_comments']; ?></p>
		<?php else: ?>
			<h5>Trop cher ?</h5>
		<?php endif ?>
	</div>

	<?php include('templates/footer.php'); ?>

</html>