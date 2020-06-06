<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }

  $TechnicianId = base64_decode($_REQUEST['Id']);
  $TechnicianName = $_REQUEST['TechnicianName'];
  $TechnicianPhone =  $_REQUEST['TechnicianPhone'];
  $TechnicianEmail =  $_REQUEST['TechnicianEmail'];
  $TechnicianTown =  $_REQUEST['TechnicianTown'];
  $AddedBy = $_SESSION['usersfullname'];
  $DateAdded = date('Y-m-d H:i:s');


    $stmt = $db->prepare('UPDATE new_technicianr SET TechnicianName =:TechnicianName, TechnicianPhone =:TechnicianPhone ,TechnicianEmail =:TechnicianEmail, TechnicianTown =:TechnicianTown, DateAdded =:DateAdded, AddedBy =:AddedBy WHERE Id =:Id') ;
    $stmt->bindParam(':Id',$TechnicianId);
    $stmt->bindParam(':TechnicianName',$TechnicianName);
    $stmt->bindParam(':TechnicianPhone',$TechnicianPhone);
    $stmt->bindParam(':TechnicianEmail',$TechnicianEmail);
    $stmt->bindParam(':TechnicianTown',$TechnicianTown);
    $stmt->bindParam(':DateAdded',$DateAdded);
    $stmt->bindParam(':AddedBy',$AddedBy);
    if($stmt->execute()){
      echo "Thank you! Your information was successfully updated!";
    }else {
      echo "Failed to update";
    }


  ?>
