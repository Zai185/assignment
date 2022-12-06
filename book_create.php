<?php
session_start();
include 'connection.php';

if (isset($_POST['create_book'])) {
    $title = trim(addslashes($_POST['title']));
    $author = trim(addslashes($_POST['author']));
    $published_at = trim($_POST['published_at']);
    $about = trim(addslashes($_POST['about']));
    $cover = $_FILES['cover'];

    $error = [];

    empty($title) ? $error[] = "Book title is required" : "";
    empty($author) ? $error[] = "Author Name is required" : "";
    empty($published_at) ? $error[] = "Published date is required" : "";
    empty($about) ? $error[] = "Book Description(About) is required" : "";
    !is_uploaded_file($cover['tmp_name']) ? $error[] = "Book Cover is required" : "";

    if (!$error) {
        $cover_path = "img/".$cover['name'];
        move_uploaded_file($cover['tmp_name'], $cover_path);
        $userEmail = $_SESSION['email'];
        $query = "INSERT INTO books (title, author, published_at, about, cover, uploader) VALUES ('$title', '$author','$published_at', '$about', '$cover_path','$userEmail')";
        $result = mysqli_query($conn, $query);
        if($result){
            header("location: index.php");
        } else{
            echo mysqli_connect_error();
        }
    }
}

?>







<?php include 'layout/header.php'; ?>
<h1>Add New Book</h1>
<?php include 'layout/error.php'; ?>
<form action="" method="post" class="ms-5" style="width: 600px;" enctype="multipart/form-data">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="title" name="title">
        <label>Book Title</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="author" name="author">
        <label>Author</label>
    </div>
    <div class="mb-3">
        <label>Published_at</label>
        <input type="date" class="form-control" id="floatingPassword" placeholder="published_at" name="published_at">
    </div>
    <div class="mb-3">
        <label>About: </label>
        <textarea name="about" cols="30" rows="10" style="resize: none; width: 100%; padding: 3px;"></textarea>
    </div>
    <div class="mb-3">
        <label>Book Cover: </label>
        <input type="file" class="form-control" name="cover">
    </div>
    <div class="mb-3">
        <label>Book PDF: </label>
        <input type="file" class="form-control" name="cover">
    </div>
    <div>
        <button type="submit" name="create_book" class="btn btn-primary mt-3">Create</button>
    </div>
</form>

<?php include 'layout/footer.php'; ?>

