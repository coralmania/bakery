<?php
session_start();
include('Recipes.php');
if (isset($_POST['submit'])) {
  $id_teacher = strval($_SESSION['user_id']);
  $title = !empty($_POST['title']) ? trim($_POST['title']) : '';
  $preparation = !empty($_POST['preparation']) ? trim($_POST['preparation']) : '';
  $time_frame = !empty($_POST['time_frame']) ? trim($_POST['time_frame']) : '';
  $ingredients = !empty($_POST['ingredients']) ? trim($_POST['ingredients']) : '';



  if ($id_teacher && $title && $preparation && $time_frame &&  isset($_FILES) && $_FILES['error'] == 0) {
    $recipe = new Recipes();
    $newRecipe = [
      'id_teacher' => $id_teacher,
      'title' => $title,
      'preparation' => $preparation,
      'time_frame' => $time_frame,
      'image' => $_FILES,
      'ingredients' => $ingredients,
      ];
    if ($recipe->addRecipe($newRecipe)) {
      header('location: ../addRecipe.php');
    }
  }
}






 ?>
