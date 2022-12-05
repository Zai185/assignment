<?php
session_start();

$id = $_GET['id'];
$query = "SELECT * FROM books WHERE id='$id'";
$result = mysqli_query($conn, $query);
if(!$result){
    mysqli_connect_error();
}
?>



<?php include 'layout/header.php' ?>

<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="<?php ?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>

<?php include 'layout/footer.php' ?>