<?php
				if(isset($_POST['register_now']))
                      {
                        $user_email = trim($_POST['UserEmail']);
                        $user_payroll = trim($_POST['PayrollNumber']);

                        if(!isset($errMSG)){
                          // check if email or payroll number already enchant_broker_dict_exists
                            if(!$user->EmailExists($user_email)){


                              if(!$user->PayrollExists($user_payroll)){
                                //random code
                                $code = md5(uniqid(rand()));
                                $blank = "";
                                $statusP = "P";
                                $role = "5";
                                $myDate = date('Y/m/d');
                                $date = str_replace('/', '-', $myDate);
                                $DateAdded = date('Y-m-d', strtotime($date));
                                //insert to db

                                $stmt = $db->prepare('INSERT INTO profilemaster(PayrollNumber, Name, Email, Username, PhoneNumber, Password, Office, Department, OfficeTelephone, Role, Status, tokenCode, DateAdded) VALUES (:PayrollNumber, :Name, :Email, :Username, :PhoneNumber, :Password, :Office, :Department, :OfficeTelephone, :Role, :Status, :tokenCode, :DateAdded)');
                                $stmt->bindParam(':PayrollNumber',$user_payroll);
                                $stmt->bindParam(':Name',$blank);
                                $stmt->bindParam(':Email',$user_email);
                                $stmt->bindParam(':Username',$blank);
                                $stmt->bindParam(':PhoneNumber',$blank);
                                $stmt->bindParam(':Password',$blank);
                                $stmt->bindParam(':Office',$blank);
                                $stmt->bindParam(':Department',$blank);
                                $stmt->bindParam(':OfficeTelephone',$blank);
                                $stmt->bindParam(':Role',$role);
                                $stmt->bindParam(':Status',$statusP);
                                $stmt->bindParam(':tokenCode',$code);
                                $stmt->bindParam(':DateAdded',$DateAdded);
                                if($stmt->execute())
                                {
                                    $SuccessMessage = "";

                                }
                                else
                                {
                                  $errMSG = "System could not save the data.";
                                }
                              }else if($user->PayrollExists($user_payroll) && $user_payroll=="0000"){
                                //random code
                                $code = md5(uniqid(rand()));
                                $blank = "";
                                $statusP = "P";
                                $role = "5";
                                $myDate = date('Y/m/d');
                                $date = str_replace('/', '-', $myDate);
                                $DateAdded = date('Y-m-d', strtotime($date));
                                //insert to db

                                $stmt = $db->prepare('INSERT INTO profilemaster(PayrollNumber, Name, Email, Username, PhoneNumber, Password, Office, Department, OfficeTelephone, Role, Status, tokenCode, DateAdded) VALUES (:PayrollNumber, :Name, :Email, :Username, :PhoneNumber, :Password, :Office, :Department, :OfficeTelephone, :Role, :Status, :tokenCode, :DateAdded)');
                                $stmt->bindParam(':PayrollNumber',$user_payroll);
                                $stmt->bindParam(':Name',$blank);
                                $stmt->bindParam(':Email',$user_email);
                                $stmt->bindParam(':Username',$blank);
                                $stmt->bindParam(':PhoneNumber',$blank);
                                $stmt->bindParam(':Password',$blank);
                                $stmt->bindParam(':Office',$blank);
                                $stmt->bindParam(':Department',$blank);
                                $stmt->bindParam(':OfficeTelephone',$blank);
                                $stmt->bindParam(':Role',$role);
                                $stmt->bindParam(':Status',$statusP);
                                $stmt->bindParam(':tokenCode',$code);
                                $stmt->bindParam(':DateAdded',$DateAdded);
                                if($stmt->execute())
                                {
                                    $SuccessMessage = "";

                                }
                                else
                                {
                                  $errMSG = "System could not save the data.";
                                }
                              }else {
                              $errMSG = "A user with the payroll number provided already exists in the system.";
                              }
                            }else{
                            $errMSG = "A user with the email address provided already exists in the system. Please use a different email.";
                            }
                        }
                      }

                      if(isset($errMSG)){
                        echo "<div class='alert alert-danger'>
    											<button type='button' class='close' data-dismiss='alert'>
    												<i class='ace-icon fa fa-times'></i>
    											</button>

    											<strong>
    												<i class='ace-icon fa fa-times'></i>
    												An error occured!
    											</strong>

    											$errMSG
    											<br />
    										</div>";
                      }
                      if(isset($SuccessMessage)){
                      echo "<div class='alert alert-success'>
                        <button type='button' class='close' data-dismiss='alert'>
                          <i class='ace-icon fa fa-times'></i>
                        </button>

                        <strong>
                          <i class='ace-icon fa fa-times'></i>
                          Reigstration Success!
                        </strong>

                        We have succesfully recieved your application, now pending is the admin approval. We will get back to you soon.
                        <br />
                      </div>";
                    }
	?>