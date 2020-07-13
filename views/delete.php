<?php 

include_once '../controllers/UserController.php';
include_once '../controllers/TreatmentController.php';
include_once '../controllers/ItemController.php';


$controller =  new UserController();
$controller->Delete($_GET['id']);

$tController =  new TreatmentController();
$tController->Delete($_GET['id']);

$iController =  new ItemController();
$iController->Delete($_GET['id']);


header("location: adminForm.php");
