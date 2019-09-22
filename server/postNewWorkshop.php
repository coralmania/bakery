<?php

session_start();
// echo '<pre>';
// print_r($_SESSION);die;
// print_r($_POST);die;


include('Workshop.php');
if (isset($_POST['submit'])) {
  $id_teacher = $_SESSION['user_id'];
  $max_attending = !empty($_POST['attending']) ? trim($_POST['attending']) : '';
  $be_at = explode('/', $_POST['date']);
  $be_at = "{$be_at[2]}-{$be_at[0]}-{$be_at[1]}";
  $workshop_role = !empty($_POST['category']) ? trim($_POST['category']) : '';
  $title = !empty($_POST['subCategory']) ? trim($_POST['subCategory']) : '';
  $long_in_hours = !empty($_POST['hours']) ? trim($_POST['hours']) : '';
  $item_description = !empty($_POST['item_description']) ? trim($_POST['item_description']) : '';
  $price = !empty($_POST['price']) ? trim($_POST['price']) : '';



  if ($price && $item_description &&$id_teacher && $title && $long_in_hours && $max_attending && $be_at && $workshop_role && isset($_FILES) && $_FILES['error'] == 0) {
    $workshop = new Workshop();
    $newWorkshop = [
      'id_teacher' => $id_teacher,
      'max_attending' => $max_attending,
      'be_at' => $be_at,
      'workshop_role' => $workshop_role,
      'title' => $title,
      'long_in_hours' => $long_in_hours,
      'item_description' => $item_description,
      'image' => $_FILES,
      'price' => $price
      ];
    if ($workshop->addWorkshop($newWorkshop)) {

    }
  }
}

header('location: ../addSadna.php');





 ?>
