<?php
session_start();
include 'connection.php';
$id = $_GET['id'];
$query = "SELECT * FROM books WHERE id='$id'";
$result = mysqli_query($conn, $query);
$book = mysqli_fetch_assoc($result);
if ($result) {
    $title = $book['title'];
    $author = $book['author'];
    $about = $book['about'];
    $cover = $book['cover'];
    $pdf = $book['pdf'];
} else {
    echo mysqli_connect_error();
}
?>

<?php include 'layout/header.php' ?>

<div class="card mx-auto" style=" display: none;width: 50%; min-width: 380px; max-width: 50%;">
    <img class="card-img-top" src="<?php echo $cover ?>" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title">Title:
            <?php echo $title ?>
        </h5>
        <h5 class="card-title">Author:
            <?php echo $author ?>
        </h5>
        <p class="card-text" style="height: 300px;overflow-y: scroll;">
            <?php echo $about ?>
        </p>
        <a href="index.php" class="btn btn-primary">Back to Main</a>
        <a href="<?php echo $pdf ?>" class="btn btn-primary" download="<?php echo $title ?>">Download</a>
    </div>
</div>

<?php include 'layout/footer.php' ?>