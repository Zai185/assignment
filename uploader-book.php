<?php

include 'connection.php';
$userEmail = $_GET['e'];
$query = "SELECT * FROM books WHERE uploader='$userEmail'";
$result = mysqli_query($conn, $query);
$noOfBook = mysqli_num_rows($result);
?>
<?php include 'layout/header.php'; ?>
<section class="library-section">
    <?php if ($noOfBook <= 0): ?>
    <h1 class='text-center'>You Don't Have Any Book Uploaded</h1>
    <a href="book_create.php" class="btn btn-primary rounded-pill me-1"><i class="bi bi-plus-circle me-1"></i>Add New
        Book</a>
    <a href="index.php" class="btn btn-primary rounded-pill"><i class="bi bi-house me-1"></i>Back to Home</a>
    <?php else: ?>
    <h1 style="text-decoration: underline;">Your Book Information</h1>
    <a href="book_create.php" class="btn btn-primary rounded-pill me-1"><i class="bi bi-plus-circle me-1"></i>Add New
        Book</a>
    <a href="index.php" class="btn btn-primary rounded-pill"><i class="bi bi-house me-1"></i>Back to Home</a>
    <div class="row row-cols-4 mt-3">
        <?php foreach ($result as $book): ?>
        <div class="book-showcase col">
            <img class="book-img" src="<?php echo $book['cover'] ?>" alt=""
                style="object-fit: contain; width: 100%; height: 100%;">
            <div class="book-textbox text-white text-bold text-center">
                <a href="book_view.php?id=<?php echo $book['id'] ?>" style="color: white; text-decoration: none;">
                    <h6>
                        <?php echo $book['title']; ?>
                    </h6>
                    <h6>By</h6>
                    <h6>
                        <?php echo $book['author']; ?>
                    </h6>
                </a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</section>




<?php include 'layout/footer.php'; ?>