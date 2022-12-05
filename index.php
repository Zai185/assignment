<?php
include 'connection.php';
$query = "SELECT * FROM books";
$result = mysqli_query($conn, $query);
?>

<?php include 'layout/header.php'; ?>

<!-- nav and modal -->
<nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><i class="bi bi-book me-1"></i>Multi-Library</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php if (isset($_SESSION['auth'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <a class="nav-link" style="cursor: pointer">Log Out</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-1">
                        <a href="book_create.php" class="btn btn-info rounded-pill my-auto"><i
                                class="bi bi-plus-circle me-1"></i>Add Book</a>
                    </li>
                    <li class="nav-item user-item mx-1">
                        <a class="btn btn-primary rounded-pill">
                            <i class="bi bi-person-circle">
                                <?php echo $_SESSION['uid'] ?></i>
                        </a>
                    </li>
                    <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link " href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Log In</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- modal  -->
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    You Are Logging Out of from account "
                    <?php echo $_SESSION['uid'] ?>", Are You Sure?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary"><a href="logout.php" class="text-white"
                            style="text-decoration: none;">Confirm</a></button>
                </div>
            </div>
        </div>
    </div>

<!-- carousel section  -->
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
</section>
<?php include 'layout/footer.php'; ?>