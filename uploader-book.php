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
    <?php else: ?>
        <h1 style="text-decoration: underline;">Your Book Information</h1>
            <div class="row row-cols-4">
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
    <button class="btn btn-primary rounded-pill"><a href="index.php" style="text-decoration: none; color: #fff;" >Back to Home</a></button>
</section>




<?php include 'layout/footer.php'; ?>