<?php

include("db.php");

if(isset($_GET['id_book'])) {
  $stmt = $conn->prepare("DELETE FROM books WHERE id_book = ?");
  $stmt->bind_param('i', $id_book);
  $id_book = $_GET['id_book'];
  $stmt->execute();
  $stmt->close();
  header('Location: index.php');
}

?>
