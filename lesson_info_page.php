<?php
include('template/head.php');

$workshop_role = !empty($_GET['lesson']) ? trim($_GET['lesson']) : '';
if(!$workshop_role){
    header('location: index.php');die;
}

$workshop = new Workshop();
$workshops = $workshop->getWorkShops($workshop_role);die;
echo '<pre>';
print_r($workshops);die;
?>

<?php include('template/footer.php') ?>
