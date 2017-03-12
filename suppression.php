<?php
session_start();
include 'api.php';
$conn = connexion_bdd();
$id=$_GET['film'];
$type=$_GET['type'];
$idu=$_SESSION['idu'];
if ($type=='revoir') {
  $sql="DELETE FROM liste WHERE idf='$id' AND idu='$idu' AND revoir='1'";
}
if ($type=='voir') {
  $sql="DELETE FROM liste WHERE idf='$id' AND idu='$idu' AND voir='1'";
}
if ($type=='decouvrir') {
  $sql="DELETE FROM liste WHERE idf='$id' AND idu='$idu' AND decouvrir='1'";
}

if($conn->query($sql)==TRUE){
  echo"OK";
}
header ('location: ma_page.php');
?>
