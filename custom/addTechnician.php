<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }

  $TechnicianId = strtoupper($_POST['TechnicianNumber']);
  $TechnicianName = $_POST['TechnicianName'];
  $TechnicianPhone =  $_POST['TechnicianPhone'];
  $TechnicianEmail =  $_POST['TechnicianEmail'];
  $TechnicianTown =  $_POST['TechnicianTown'];
  $AddedBy = $_SESSION['usersfullname'];
  $DateAdded = date('Y-m-d H:i:s');



  if(!$user->TechnicianExists($TechnicianId) == $TechnicianId){
    $stmt = $db->prepare('INSERT INTO new_technicianr (TechnicianNumber, TechnicianName, TechnicianPhone, TechnicianEmail, TechnicianTown, DateAdded, AddedBy) VALUES (:TechnicianNumber, :TechnicianName, :TechnicianPhone, :TechnicianEmail, :TechnicianTown, :DateAdded, :AddedBy) ') ;
    $stmt->execute(array(
     ':TechnicianNumber' => $TechnicianId,
     ':TechnicianName' => $TechnicianName,
     ':TechnicianPhone' => $TechnicianPhone,
     ':TechnicianEmail' => $TechnicianEmail,
     ':TechnicianTown' => $TechnicianTown,
     ':DateAdded' => $DateAdded,
     ':AddedBy' => $AddedBy
    ));

      echo "Thank you! Your information was successfully saved!";
  }else {
    echo "Technician with a similar Technician number already exists ";
  }

  $Desc ="Added new Technician, $TechnicianName";

  $user->setActivity($Desc);
  ?>
