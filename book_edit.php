<?php

include 'connection.php';
$id = $_GET['id'];
$query = "SELECT * FROM books WHERE id='$id'";
$result = mysqli_query($conn, $query);
$book = mysqli_fetch_assoc($result);
if ($result) {
    $title = $book['title'];
    $author = $book['author'];
    $published_at = $book['published_at'];
    $about = $book['about'];
    $cover = $book['cover'];
    $pdf = $book['pdf'];

    if (isset($_POST['edit_book'])) {
        $title = trim(addslashes($_POST['title']));
        $author = trim(addslashes($_POST['author']));
        $published_at = trim($_POST['published_at']);
        $about = trim(addslashes($_POST['about']));
        $cover = $_FILES['cover'];
        $pdf = $_FILES['bookPDF'];
        $error = [];

        empty($title) ? $error[] = "Book title is required" : "";
        empty($author) ? $error[] = "Author Name is required" : "";
        empty($published_at) ? $error[] = "Published date is required" : "";
        empty($about) ? $error[] = "Book Description(About) is required" : "";

        if (is_uploaded_file($cover['tmp_name']) and is_uploaded_file($pdf['tmp_name'])) {
            $cover_path = "img/" . $cover['name'];
            move_uploaded_file($cover['tmp_name'], $cover_path);
            $pdf_path = "pdf/" . $pdf['name'];
            move_uploaded_file($pdf['tmp_name'], $pdf_path);
            $query = "UPDATE books SET title='$title', author='$author',published_at='$published_at',about='$about',cover='$cover_path',pdf='$pdf_path' WHERE id='$id'";

        } elseif (is_uploaded_file($cover['tmp_name'])) {
            $cover_path = "img/" . $cover['name'];
            move_uploaded_file($cover['tmp_name'], $cover_path);
            $query = "UPDATE books SET title='$title', author='$author',published_at='$published_at',about='$about', cover='$cover_path' WHERE id='$id'";

        } elseif (is_uploaded_file($pdf['tmp_name'])) {
            $pdf_path = "pdf/" . $pdf['name'];
            move_uploaded_file($pdf['tmp_name'], $pdf_path);
            $query = "UPDATE books SET title='$title', author='$author',published_at='$published_at',about='$about', pdf='$pdf' WHERE id='$id'";

        } else {
            $query = "UPDATE books SET title='$title', author='$author',published_at='$published_at',about='$about' WHERE id='$id'";
        }
        $result = mysqli_query($conn, $query);
        if ($result) {
            header("location: index.php");
        } else {
            echo mysqli_connect_error();
        }
    }

} else {
    echo mysqli_connect_error();
}
?>





<?php include 'layout/header.php'; ?>

<h1>Edit Book</h1>
<?php include 'layout/error.php'; ?>
<form action="" method="post" class="ms-5" enctype="multipart/form-data">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="title" name="title"
            value="<?= $title ?>">
        <label>Book Title</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="author" name="author"
            value="<?= $author ?>">
        <label>Author</label>
    </div>
    <div class="mb-3">
        <label>Published_at</label>
        <input type="date" class="form-control" id="floatingPassword" placeholder="published_at" name="published_at"
            value="<?= $published_at ?>">
    </div>
    <div class="mb-3">
        <label>About: </label>
        <textarea name="about" cols="30" rows="10"
            style="resize: none; width: 100%; padding: 3px;"><?= $about ?></textarea>
    </div>
    <div class="mb-3">
        <label>Book Cover: </label>
        <input type="file" class="form-control" name="cover" accept="image/*">
    </div>
    <div class="mb-3">
        <label>Book PDF: </label>
        <input type="file" class="form-control" name="bookPDF" accept=".pdf">
    </div>
    <div class="mt-2">
        <button type="submit" name="edit_book" class="btn btn-primary">Edit</button>
        <a href="index.php" class="btn btn-primary mx-1">Back to Home</a>
    </div>
</form>

<?php include 'layout/footer.php'; ?>