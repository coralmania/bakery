<?php

session_start();
// echo '<pre>';
// print_r($_SESSION);die;
// print_r($_POST);die;


include('Recipes.php');
if (isset($_POST['submit'])) {
  $id_teacher = strval($_SESSION['user_id']);
  $title = !empty($_POST['title']) ? trim($_POST['title']) : '';
  $preparation = !empty($_POST['preparation']) ? trim($_POST['preparation']) : '';
  $time_frame = !empty($_POST['time_frame']) ? trim($_POST['time_frame']) : '';



  if ($id_teacher && $title && $preparation && $time_frame &&  isset($_FILES) && $_FILES['error'] == 0) {
    $recipe = new Recipes();
    $newRecipe = [
      'id_teacher' => $id_teacher,
      'title' => $title,
      'preparation' => $preparation,
      'time_frame' => $time_frame,
      'image' => $_FILES,
      ];
    if ($recipe->addRecipe($newRecipe)) {
    }
  }
}

header('location: ../addRecipe.php');





 ?>
