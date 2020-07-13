<?php

include('db.php');

if (isset($_POST['save_book']) && $_POST['accion'] == "Agregar") {
  $stmt = $conn->prepare("INSERT INTO books (title, author, number_pages, publication_date) VALUES (?,?,?,?)");
  $stmt->bind_param('ssis', $title, $author, $number_pages, $publication_date);
  $title = $_POST['title'];
  $author = $_POST['author'];
  $number_pages = $_POST['number_pages'];
  $publication_date = $_POST['publication_date'];
  $stmt->execute();
  $stmt->close();
  header('Location: index.php');
} elseif (isset($_POST['save_book']) && $_POST['accion'] == "Modificar") {
  echo $_POST['id_book'];
  echo $_POST['title'];
  $stmt = $conn->prepare("UPDATE books SET title=? , author=? ,number_pages =?, publication_date=? WHERE id_book=" . $_POST['id_book']);
  $stmt->bind_param('ssis', $title, $author, $number_pages, $publication_date);
  $title = $_POST['title'];
  $author = $_POST['author'];
  $number_pages = $_POST['number_pages'];
  $publication_date = $_POST['publication_date'];
  $accion = "Agregar";
  $stmt->execute();
  $stmt->close();
  header('Location: index.php');
}
