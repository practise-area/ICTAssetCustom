<?php
  require('../func/config.php');
  //if not logged in redirect to login page
  if(!$user->is_logged_in()){ header('Location: login'); }

  if ($_REQUEST['delete']) {

		$pid = $_REQUEST['delete'];
		$query = "select `assigneditems`.`SerialNumber`,
                   `assigneditems`.`DateAssigned`,
                   `assigneditems`.`AssignedBy`,
                   `assigneditems`.`AssignmentPeriod`,
                   `assigneditems`.`Returned`,
                   `profilemaster`.`Name`
              from (`assigneditems` `assigneditems`
              inner join `profilemaster` `profilemaster`
                   on (`profilemaster`.`Id` = `assigneditems`.`AssignedUser`))
             where ((`assigneditems`.`Returned` = 'NO')
                   and (`assigneditems`.`AssignedUser` = '$pid'))
            ";
		$stmt = $db->prepare( $query );
		$stmt->execute(array(':pid'=>$pid));

    if($stmt->rowCount() > 0)
    {
			echo "User Cannot be deleted. He/she has assets in custody.\n";
      while($row=$stmt->fetch(PDO::FETCH_ASSOC))
      {
        echo "\n";
        echo "Serial Number: ".$row['SerialNumber']."\n";
      }
		}else if($stmt->rowCount() == 0){

      $query = "DELETE FROM profilemaster WHERE Id=:pid";
      $stmt = $db->prepare( $query );
      $stmt->execute(array(':pid'=>$pid));

      if ($stmt) {
        echo "User has been successfully deleted";
      }
		}

    $Desc ="Deleted user, id $pid";

    $user->setActivity($Desc);


	}

  ?>
