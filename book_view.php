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
    $uploader = $book['uploader'];
} else {
    echo mysqli_connect_error();
}
?>

<?php include 'layout/header.php' ?>

<div class="card mx-auto" style="width: 50%; min-width: 380px; max-width: 50%;">
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
        <?php if (isset($_SESSION['auth']) and $uploader == $_SESSION['email']): ?>
        <a href="book_edit.php?id=<?php echo $id ?>" class="btn btn-info"><i class="bi bi-pencil-square me-1"></i>Edit</a>
        <a href="book_delete.php?id=<?php echo $id ?>" class="btn btn-danger"><i class="bi bi-trash-fill me-1"></i>Delete</a>
        <?php endif; ?>
        <div class="my-1">
            <a href="index.php" class="btn btn-primary">Back to Main</a>
            <a href="<?php echo $pdf ?>" class="btn btn-primary" download="<?php echo $title ?>"><i class="bi bi-download me-1"></i>Download</a>
        </div>
    </div>
</div>

<?php include 'layout/footer.php' ?>