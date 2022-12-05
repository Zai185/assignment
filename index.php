<?php
include 'connection.php';
$query = "SELECT * FROM books";
$result = mysqli_query($conn, $query);
?>

<?php include 'layout/header.php'; ?>

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="carousel-bg-gradient"
                style="background: linear-gradient(90deg, rgba(0,0,0,0.5) 0%, rgba(0,0,0,0.75) 25%, rgba(0,0,0,0.75) 75%, rgba(0,0,0,0.5) 100%), url(https://images.pexels.com/photos/1370295/pexels-photo-1370295.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1) !important">
            </div>
            <div class="carousel-self-textbox one">
                <h1>All Books available in one place</h1>
                <p>Free ebooks in every language, open-source for every readers</p>
                <?php if (!isset($_SESSION['auth'])): ?>
                <div>
                    <button type="button" class="btn btn-danger mx-1"><a href="register.php"
                            style="color: white; text-decoration:none;">Register</a></button>
                    <button type="button" class="btn btn-primary mx-1"><a href="login.php"
                            style="color: white; text-decoration:none;">Log in</a></button>
                </div>
                <?php endif; ?>
            </div>
            <div class="carousel-caption d-none d-md-block">
            </div>
        </div>
        <div class="carousel-item">
            <div class="carousel-bg-gradient"
                style="background: linear-gradient(90deg, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0.7) 40%, rgba(0, 0, 0, 0.8) 60%, rgba(0, 0, 0, 0.85) 100%), url(https://images.pexels.com/photos/279222/pexels-photo-279222.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1); background-size: cover !important">
            </div>

            <div class="carousel-caption d-none d-md-block">
            </div>
        </div>
        <div class="carousel-item">
            <div class="carousel-bg-gradient"
                style="background: linear-gradient(90deg, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0.7) 40%, rgba(0, 0, 0, 0.8) 60%, rgba(0, 0, 0, 0.85) 100%), url('https://images.pexels.com/photos/1370295/pexels-photo-1370295.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'); background-size: contain;">
            </div>
            <div class="carousel-self-textbox text-center">
                <h1>All Books available in one place</h1>
                <p>Free ebooks in every language, open-source for every readers</p>
            </div>
            <div class="carousel-caption d-none d-md-block">
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<section class="library-section">
    <h1 class="text-center my-4">WELCOME TO THE LIBRARY, READERS!</h1>
    <div class="row row-cols-4">
        <?php foreach ($result as $book): ?>
        <div class="book-showcase col">
            <img class="book-img" src="<?php echo $book['cover'] ?>" alt=""
                style="object-fit: contain; width: 100%; height: 100%;">
            <div class="book-textbox text-white text-bold text-center">
                <a href="book_view.php?id=<?php echo $book['id']?>" style="color: white; text-decoration: none;">
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
</section>
<?php include 'layout/footer.php'; ?>