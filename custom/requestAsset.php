<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }

  $AssetNumber = $_POST['assetNumber'];

  $SerialNumber = $_POST['assetSerial'];

  if($AssetNumber =="N/A"){
    $ass = $SerialNumber;
  }else if($SerialNumber=="N/A"){
    $ass = $AssetNumber;
  }

  $AssPeriod = $_POST['AssignmentPeriod'];

  if($AssPeriod=="1"){
    $AssignmentPeriod = 1;
  }else if($AssPeriod=="2"){
    $AssignmentPeriod = 2;
  }

  $AssignedUser =  $_SESSION["Id"];

  $NumberOfDays =  $_POST['NumberOfDays'];

  $DateRequested = date('Y-m-d');
  //check if assigneditems
  if(!($user->checkIfAssigned($ass)==$ass)){

    $stmt = $db->prepare('INSERT INTO requested_assets(User, SerialNumber, Period, Days, DateRequested) VALUES (:User, :SerialNumber, :Period, :Days, :DateRequested)') ;
    $stmt->execute(array(
     ':SerialNumber' => $ass,
     ':User' => $AssignedUser,
     ':Period' => $AssignmentPeriod,
     ':Days' => $NumberOfDays,
     ':DateRequested' => $DateRequested
    ));

    echo "Thank you! Your information was successfully sent to the admin! Once the administrator approves you will be able to download the issuance form in your inbox";
  }else {
    echo "The item is not available for assigning";
  }


  ?>
