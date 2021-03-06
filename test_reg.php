<?php
   require('func/config.php');
   if( $user->is_logged_in() ){ header('Location: index'); }
 ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Register - Asset Manager</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" />
    <link rel="stylesheet" href="assets/css/select2.min.css" />
		<link rel="stylesheet" href="assets/css/jquery-ui.min.css" />
		<link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="assets/css/fullcalendar.min.css" />

		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

	</head>

	<body class="login-layout light-login">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<i class="ace-icon fa fa-folder green"></i>
									<span class="red">Asset</span>
									<span class="grey" id="id-text2">Manager</span>
								</h1>
								<h4 class="blue" id="id-company-text">&copy; West Pokot County</h4>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">

								<div id="signup-box" class="signup-box widget-box no-border visible">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header green lighter bigger">
												<i class="ace-icon fa fa-users blue"></i>
												New User Registration
											</h4>

											<div class="space-6"></div>
											<p> Enter your details to begin: </p>
											

											<form id="registration-form" method="post" action="">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" class="form-control" placeholder="Email" name = "UserEmail" required id="UserEmail" value='<?php if(isset($errMSG)){ echo $_POST['UserEmail'];}?>'/>
															<i class="ace-icon fa fa-envelope"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
                              <!-- min='4' pattern='^[0-9]{4}$' title='4 or moreNumbers only' -->
															<input type="text" class="form-control" placeholder="Payroll Number" name="PayrollNumber" required  id="PayrollNumber" value='<?php if(isset($errMSG)){ echo $_POST['PayrollNumber'];}?>'/>
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<div class="space-24"></div>

													<div class="clearfix">
														<button type="reset" class="width-30 pull-left btn btn-sm"  >
															<i class="ace-icon fa fa-refresh"></i>
															<span class="bigger-110">Reset</span>
														</button>

														<button name="register_now" type="submit" class="width-65 pull-right btn btn-sm btn-success">
															<span class="bigger-110">Register</span>

															<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
														</button>
													</div>
												</fieldset>
											</form>
										</div>
                    <div id="dialog-message" class="hide">
                      <p>
                      Office Deleted successfully.
                      </p>

                    </div><!-- #dialog-message -->
                    <div id="dialog-error" class="hide">
                      <p>
                      Office Deleted successfully.
                      </p>

                    </div><!-- #dialog-message -->
										<div class="toolbar center">
											<a href="login" class="back-to-login-link">
												<i class="ace-icon fa fa-arrow-left"></i>
												Back to login
											</a>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.signup-box -->
                	<div class="center"><h2> <a href="index"><i class="ace-icon fa fa-home"></i></a><h2> </div>
							</div><!-- /.position-relative -->

						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->
        
		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="../assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="../assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="../assets/js/jquery.validate.min.js"></script>
    <script src="../assets/js/wizard.min.js"></script>
		<script src="../assets/js/jquery.validate.min.js"></script>
		<script src="../assets/js/jquery-additional-methods.min.js"></script>
		<script src="../assets/js/bootbox.js"></script>
		<script src="../assets/js/jquery.maskedinput.min.js"></script>
		<script src="../assets/js/select2.min.js"></script>

		<script src="../assets/js/jquery-ui.min.js"></script>
		<script src="../assets/js/jquery.ui.touch-punch.min.js"></script>
		<!-- inline scripts related to this page -->
		<script type="text/javascript">

		//you don't need this, just used for changing background
			jQuery(function($) {

        //override dialog's title function to allow for HTML titles
				$.widget("ui.dialog", $.extend({}, $.ui.dialog.prototype, {
					_title: function(title) {
						var $title = this.options.title || '&nbsp;'
						if( ("title_html" in this.options) && this.options.title_html == true )
							title.html($title);
						else title.text($title);
					}
				}));

        ////////////////////
			 $('#btn-register').on('click', function(e) {
         $.post('../custom/register-user.php',
        {
          UserEmail: "dro", PayrollNumber: "3456"
        },
        function(data){
            var dialog = $('#dialog-error').removeClass('hide').dialog({
              modal: true,
              title: "<div class='widget-header widget-header-small'><h4 class='smaller'><i class='ace-icon fa fa-check'></i> Action </h4></div>",
              title_html: true,
              buttons: [
                {
                  text: "OK",
                  "class" : "btn btn-primary btn-minier",
                  click: function() {
                    $( this ).dialog( "close" );

                  }
                }
              ]
            });

        });
        e.preventDefault();
			 });
			});
		</script>
	</body>
</html>


<?php
// 		isset($_POST['register_now'])
		if(isset($_POST['action']))
		
                      {
                          
                          echo '<br />The ' . $_POST['submit'] . ' submit button was pressed<br />';
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

                     
                      
	?>
