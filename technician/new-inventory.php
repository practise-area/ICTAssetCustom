<?php
	require('../func/config.php');
	if(!$user->is_logged_in()){ header('Location: login'); }

	$pagetitle ="New inventory";
	$activeParent = "active open";
	$activeViewAsset= "active";
	$activeAddAsset = "active open";
	if(isset($_GET['id'])){
    $id = base64_decode($_GET['id']);
    $stmt = $db->prepare('SELECT * FROM new_item WHERE Id = :assetId');
    $stmt->execute(array(':assetId' =>$id));
    $row_fechAsset = $stmt->fetch();
    //ifpost does not exists redirect user.
    if($row_fechAsset['Id'] == ''){
    //  header('Location: view-asset');
      exit;
    }

  }else {
    # code...
    header('Location: view-asset');
    exit;
  }
?>
  <?php include('includes/header.php');?>
			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>

							<li>
								<a href="#">Assets</a>
							</li>
							<li class="active">Inventory</li>
						</ul><!-- /.breadcrumb -->

					<?php include('includes/nav-setings.php');?>

						<div class="page-header">
							<h1>
								Take inventory

							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="widget-box">
									<div class="widget-header widget-header-blue widget-header-flat">

									</div>

									<div class="widget-body">
										<div class="widget-main">
											<div id="fuelux-wizard-container">
												<div>
													<ul class="steps">
														<li data-step="1" class="active hidden">

														</li>

													</ul>
												</div>

												<div class="step-content pos-rel">
													<div class="step-pane active" data-step="1">
														<h3 class="lighter block green">Enter the following information</h3>


														<form class="form-horizontal" id="office-form" method="get">

															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="InventoryDate">Last Inventory Date:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" id="InventoryDate" name="InventoryDate" class="col-xs-12 col-sm-8" disabled="true" value="<?php echo $user->getLastInventoryDate($row_fechAsset['SerialNumber'], $row_fechAsset['AssetNumber']); ?>" />
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="assetNumber">Asset Number:</label>

																<div class="col-xs-12 col-sm-9">
																	<input type="text" id="assetNumber" name="assetNumber" class="col-xs-12 col-sm-8" disabled="true" value="<?php echo $row_fechAsset['AssetNumber']; ?>"/>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="assetSerial">Serial Number:</label>

																<div class="col-xs-12 col-sm-9">
																	<input type="text" id="assetSerial" name="assetSerial" class="col-xs-12 col-sm-8"  disabled="true" value="<?php echo $row_fechAsset['SerialNumber']; ?>"/>
																</div>
						 									</div>

															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="Custodian">Custodian:</label>

																<div class="col-xs-12 col-sm-9">
																	<select id="Custodian" name="Custodian" class="select2" data-placeholder="Click to Choose...">
																		<option value="">&nbsp;</option>
																		<option value="N/A">N/A</option>
																		<?php

																		$AssNum = $row_fechAsset['AssetNumber'];
																		$SerialNum = $row_fechAsset['SerialNumber'];
																			$stmt = $db->query("SELECT AssignedUser FROM assigneditems WHERE SerialNumber = '$AssNum' OR  SerialNumber = '$SerialNum' ");
																			while($row = $stmt->fetch())
																			{
																				?>
																				<option> <?php echo $user->getAssignedUserName($row['AssignedUser']);?></option>
																				<?php
																			}
																		 ?>
																	</select>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="Office">Office:</label>

																<div class="col-xs-12 col-sm-9">
																	<select id="Office" name="Office" class="select2" data-placeholder="Click to Choose...">
																		<option value="">&nbsp;</option>
																		<option value="N/A">N/A</option>
																		<?php
																			$AssNum = $row_fechAsset['AssetNumber'];
																			$SerialNum = $row_fechAsset['SerialNumber'];

																			$stmt = $db->query("SELECT OfficeName FROM assigneditems WHERE SerialNumber = '$AssNum' OR  SerialNumber = '$SerialNum' ");

																			while($row = $stmt->fetch())
																			{
																				?>
																				<option> <?php echo $row['OfficeName'];?></option>
																				<?php
																			}
																		 ?>
																	</select>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="Department">Department:</label>

																<div class="col-xs-12 col-sm-9">
																	<select id="Department" name="Department" class="select2" data-placeholder="Click to Choose...">
																		<option value="">&nbsp;</option>
																		<option value="N/A">N/A</option>
																		<?php
																			$AssNum = $row_fechAsset['AssetNumber'];
																			$SerialNum = $row_fechAsset['SerialNumber'];

																			$stmt = $db->query("SELECT DepartmentName FROM assigneditems WHERE SerialNumber = '$AssNum' OR  SerialNumber = '$SerialNum' ");
																			while($row = $stmt->fetch())
																			{
																				?>
																				<option> <?php echo $row['DepartmentName'];?></option>
																				<?php
																			}
																		 ?>
																	</select>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="assetStatus">Status:</label>

																<div class="col-xs-12 col-sm-9">
																	<select id="assetStatus" name="assetStatus" class="select2" data-placeholder="Click to Choose...">
																		<option value="">&nbsp;</option>
																		<option value="N/A">N/A</option>
																		<?php
																			$stmt = $db->query('SELECT Status FROM asset_status ORDER BY Status ASC');
																			while($row_status = $stmt->fetch())
																			{
																				?>
																					<option value="<?php echo $row_status['Status']; ?>" > <?php echo $row_status['Status'];?></option>
																				<?php
																			}
																		 ?>
																	</select>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="assetCondition">Condition:</label>

																<div class="col-xs-12 col-sm-9">
																	<select id="assetCondition" name="assetCondition" class="select2" data-placeholder="Click to Choose...">
																		<option value="">&nbsp;</option>
																		<option value="N/A">N/A</option>
																		<?php
																			$stmt = $db->query('SELECT AssetCondition FROM asset_Condition ORDER BY AssetCondition ASC');
																			while($row_Condition = $stmt->fetch())
																			{
																				?>
																					<option value="<?php echo $row_Condition['AssetCondition']; ?>" > <?php echo $row_Condition['AssetCondition'];?></option>
																				<?php
																			}
																		 ?>
																	</select>
																</div>
															</div>

															<div class="space-2"></div>

														</form>
													</div>


												</div>
											</div>

											<hr />
											<div class="wizard-actions center">

												<button class="btn btn-white btn-info btn-bold btn-next" data-last="Finish">
													<i class="ace-icon fa fa-floppy-o bigger-120 green"></i>
													Save
												</button>

												<button class="btn btn-white btn-default btn-bold">
													<i class="ace-icon fa fa-times red2"></i>
													Cancel
												</button>

											</div>

										</div><!-- /.widget-main -->
									</div><!-- /.widget-body -->
								</div>
							 <!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<?php  include('includes/footer.php'); ?>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
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
		<script src="../assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="../assets/js/wizard.min.js"></script>
		<script src="../assets/js/jquery.validate.min.js"></script>
		<script src="../assets/js/jquery-additional-methods.min.js"></script>
		<script src="../assets/js/bootbox.js"></script>
		<script src="../assets/js/jquery.maskedinput.min.js"></script>
		<script src="../assets/js/select2.min.js"></script>

		<script src="../assets/js/jquery-ui.min.js"></script>
		<script src="../assets/js/jquery.ui.touch-punch.min.js"></script>

		<!-- ace scripts -->
		<script src="../assets/js/ace-elements.min.js"></script>
		<script src="../assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {

				$('[data-rel=tooltip]').tooltip();

				$('.select2').css('width','200px').select2({allowClear:true})
				.on('change', function(){
					$(this).closest('form').validate().element($(this));
				});



				var $validation = true;
				$('#fuelux-wizard-container')
				.ace_wizard({
					//step: 2 //optional argument. wizard will jump to step "2" at first
				 	//buttons: '.wizard-actions:eq(0)'
				})
				.on('actionclicked.fu.wizard' , function(e, info){
					if(info.step == 1 && $validation) {
						if(!$('#office-form').valid()) e.preventDefault();
					}
				})
				//.on('changed.fu.wizard', function() {
				//})
				.on('finished.fu.wizard', function(e) {
					$.post('../custom/addInventory.php',
				  {
				    assetSerial: $('[name=assetSerial]').val(), assetNumber: $('[name=assetNumber]').val(), assetStatus:  $('[name=assetStatus]').val(),
						 assetCondition: $('[name=assetCondition]').val(), Custodian: $('[name=Custodian]').val(), Office:  $('[name=Office]').val(),
						  Department: $('[name=Department]').val()
				  },
				  function(data){
						bootbox.dialog({
							message: data,
							buttons: {
								"success" : {
									"label" : "OK",
									"className" : "btn-sm btn-primary"
								}
							}
						});

				  });
				}).on('stepclick.fu.wizard', function(e){
				  //e.preventDefault();//this will prevent clicking and selecting steps
				});

				$('#office-form').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					ignore: "",
					rules: {
						assetStatus: {
				      required: true
				    },
				    assetCondition: {
				      required: true,
				    },
				    Custodian: {
				      required: true,
				    },
				    Office: {
				      required: true,
				    },
				    Department: {
				      required: true,
				    }
					},

					messages: {
						assetStatus: "Please select an asset status",
				    assetCondition: "Please select an asset condition",
				    Custodian: "Please select a user in charge of athe asset",
						Office: "Please select an office",
				    Department: "Please select a department"
					},


					highlight: function (e) {
						$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
					},

					success: function (e) {
						$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
						$(e).remove();
					},

					errorPlacement: function (error, element) {
						if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
							var controls = element.closest('div[class*="col-"]');
							if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
							else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
						}
						else if(element.is('.select2')) {
							error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
						}
						else if(element.is('.chosen-select')) {
							error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
						}
						else error.insertAfter(element.parent());
					},

					submitHandler: function (form) {
					},
					invalidHandler: function (form) {
					}
				});

				$(document).one('ajaxloadstart.page', function(e) {
					//in ajax mode, remove remaining elements before leaving page
					$('[class*=select2]').remove();
				});
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
      	$( "#delete-dialog" ).on('click', function(e) {
				//	e.preventDefault();
					if(!$('#office-form').valid()){
						e.preventDefault();
					}else {
						$( "#dialog-confirm" ).removeClass('hide').dialog({
							resizable: false,
							width: '320',
							modal: true,
							title: "<div class='widget-header'><h4 class='smaller'><i class='ace-icon fa fa-exclamation-triangle red'></i> Empty this office?</h4></div>",
							title_html: true,
							buttons: [
								{
									html: "<i class='ace-icon fa fa-trash-o bigger-110'></i>&nbsp; Delete office",
									"class" : "btn btn-danger btn-minier",
									click: function() {
	                  ///php magic here

	                  $.post('../custom/deleteOffice.php',
	        				  {
	        				    OfficeId: $('[name=OfficeId]').val()
	        				  },
	        				  function(){
	                    $('[name=OfficeId]').val('');//clearing/resetting
	        				  });
	////////////////////////////////////////
	                  $( this ).dialog( "close" );
	                  var dialog = $( "#dialog-message" ).removeClass('hide').dialog({
	        						modal: true,
	        						title: "<div class='widget-header widget-header-small'><h4 class='smaller'><i class='ace-icon fa fa-check'></i> Action Succesful</h4></div>",
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

									}
								}
								,
								{
									html: "<i class='ace-icon fa fa-times bigger-110'></i>&nbsp; Cancel",
									"class" : "btn btn-minier",
									click: function() {
										$( this ).dialog( "close" );
									}
								}
							]
						});
					}
				});


			});
		</script>
	</body>
</html>
