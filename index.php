<?php include("db.php"); ?>
<?php include('includes/header.php'); ?>
<?php
$title = '';
$author = '';
$number_pages = '';
$publication_date = '';
$accion = "Agregar";
$id_book = "";

if (isset($_GET['id_book'])) {
  $result_books = $conn->query("SELECT * FROM books WHERE id_book=" . $_GET['id_book']);
  if (mysqli_num_rows($result_books) == 1) {
    $row = mysqli_fetch_array($result_books);
    $title = $row['title'];
    $author = $row['author'];
    $number_pages = $row['number_pages'];
    $publication_date = $row['publication_date'];
    $id_book = $row['id_book'];
    $accion = "Modificar";
  }
}
?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">

      <!-- ADD BOOKS FORM-->
      <div class="card card-body">
        <form action="save_book.php" method="POST">
          <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Título" value="<?php echo $title ?>" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="author" class="form-control" placeholder="Autor" value="<?php echo $author ?>">
          </div>
          <div class="form-group">
            <input type="number" name="number_pages" class="form-control" placeholder="Num Páginas" min="1" value="<?php echo $number_pages ?>">
          </div>
          <div class="form-group">
            <input type="date" name="publication_date" class="form-control" placeholder="Fecha de publicación" value="<?php echo $publication_date ?>">
          </div>
          <div class="form-group">
            <input type="hidden" name="id_book" class="form-control" value="<?php echo $id_book; ?>">
          </div>
          <div class="form-group">
            <input type="hidden" name="accion" class="form-control" value="<?php echo $accion; ?>">
          </div>
          <input type="submit" name="save_book" class="btn btn-success btn-block" value="<?php echo $accion; ?>">
        </form>
      </div>
    </div>

    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Id</th>
            <th>Titulo</th>
            <th>Autor</th>
            <th>Número Páginas</th>
            <th>Fecha Publicación</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $result_books = $conn->query("SELECT * FROM books");

          while ($row = mysqli_fetch_assoc($result_books)) { ?>
            <tr>
              <td><?php echo $row['id_book']; ?></td>
              <td><?php echo $row['title']; ?></td>
              <td><?php echo $row['author']; ?></td>
              <td><?php echo $row['number_pages']; ?></td>
              <td><?php echo $row['publication_date']; ?></td>
              <td>
                <a href="index.php?id_book=<?php echo $row['id_book'] ?>" class="btn btn-secondary">
                  <i class="fas fa-marker"></i>
                </a>
                <a href="delete_book.php?id_book=<?php echo $row['id_book'] ?>" class="btn btn-danger">
                  <i class="far fa-trash-alt"></i>
                </a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>