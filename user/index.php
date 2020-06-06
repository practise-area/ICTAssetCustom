<?php
	require('../func/config.php');
	if(!$user->is_logged_in()){ header('Location: login'); }

  $pagetitle ="Dashboard";

	include('includes/header.php');

?>
	<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>
							<li class="active">Dashboard</li>
						</ul><!-- /.breadcrumb -->

					<?php include('includes/nav-setings.php');?>
						<div class="page-header">
							<h1>
								Dashboard

							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="alert alert-block alert-success">
									<button type="button" class="close" data-dismiss="alert">
										<i class="ace-icon fa fa-times"></i>
									</button>

									<i class="ace-icon fa fa-check green"></i>

									Welcome to
									<strong class="green">
										West pokot County
										Asset Manager
									</strong>, You can perform various operations on this platform

								</div>



								<div class="row">
									<div class="col-sm-12">
										<div class="widget-box transparent">
											<div class="widget-body">
												<div class="widget-main no-padding">
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Name
																</th>
																<th>
 																	Computer
																</th>
																<th>
																	 Office
																</th>
																<th>
																	 Date Installed
																</th>
																<th>
																	<i class="ace-icon fa fa-clock-o"></i>Validity Period
																</th>

																<th class="hidden-480">
																	Status
																</th>
															</tr>
														</thead>

														<tbody>
														<?php
															$myDate = date('Y/m/d');
															$date = str_replace('/', '-', $myDate);
															$form = date('Y-m-d', strtotime($date));

															$userId = $_SESSION["Id"];

															$query = "
															select `assetlicences`.`LicenceName` as Name,
															       `assetlicences`.`LicenceID` as SerialNumber,
															       `assetlicences`.`DateInstalled` as DateInstalled,
															       `assetlicences`.`AssetID` as ComputerInstalled,
															       `new_licence`.`Period`,
															       `assigneditems`.`AssignedUser`,
																		 DATEDIFF( '$form',`assetlicences`.`DateInstalled`) as days
															  from ((`assetlicences` `assetlicences`
															  inner join `new_licence` `new_licence`
															       on (`new_licence`.`SerialNumber` = `assetlicences`.`LicenceID`))
															  inner join `assigneditems` `assigneditems`
															       on (`assigneditems`.`SerialNumber` = `assetlicences`.`AssetID`))
															 where (`assigneditems`.`AssignedUser` = '$userId') AND ((`new_licence`.`ReUsable` = '2') AND DATEDIFF( '$form',`assetlicences`.`DateInstalled`) >   `new_licence`.`Period`)";
															$stmt = $db->prepare($query);
															$stmt->execute();
															if($stmt->rowCount() > 0)
															{
																while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
															 ?>
															 <tr>
 																<td><?php echo $row['Name'];?></td>

 																<td>
 																	<?php echo strtoupper($row['ComputerInstalled']); ?>
 																</td>
 																<td>
 																	<?php echo $user->getAssetOffice($row['ComputerInstalled']); ?>
 																</td>
 																<td>
 																	<?php echo $row['DateInstalled']; ?>
 																</td>
 																<td>
 																	<?php echo $row['Period']; ?>
 																</td>

 																<td class="hidden-480">
 																	<?php

 																	$period = $row['days'] - $row['Period'];

 																	if($row['days']<0){
 																		echo '<span class="label label-success arrowed-right arrowed-in">Valid '.$period.' days remaining</span>';
 																	}else {
 																		echo '<span class="label label-danger arrowed-right arrowed-in">Expired '.($period).' days ago</span>';
 																	}
 																	 ?>

 																</td>
 															</tr>
															<?php
																}
														  }
															 ?>
														</tbody>

													</table>
													</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->
								</div><!-- /.row -->

								<div class="hr hr32 hr-dotted"></div>
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
		<script src="../assets/js/jquery.dataTables.min.js"></script>
		<script src="../assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="../assets/js/dataTables.buttons.min.js"></script>
		<script src="../assets/js/buttons.flash.min.js"></script>
		<script src="../assets/js/buttons.html5.min.js"></script>
		<script src="../assets/js/buttons.print.min.js"></script>
		<script src="../assets/js/buttons.colVis.min.js"></script>
		<script src="../assets/js/dataTables.select.min.js"></script>
		<script src="../assets/js/jquery-ui.custom.min.js"></script>
		<script src="../assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="../assets/js/jquery.easypiechart.min.js"></script>
		<script src="../assets/js/jquery.sparkline.index.min.js"></script>
		<script src="../assets/js/jquery.flot.min.js"></script>
		<script src="../assets/js/jquery.flot.pie.min.js"></script>
		<script src="../assets/js/jquery.flot.resize.min.js"></script>
		<script src="../assets/js/bootbox.js"></script>
		<script src="../assets/js/chosen.jquery.min.js"></script>

		<!-- ace scripts -->
		<script src="../assets/js/ace-elements.min.js"></script>
		<script src="../assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">

		jQuery(function($) {

				if(!ace.vars['touch']) {
					$('.chosen-select').chosen({allow_single_deselect:true});
					//resize the chosen on window resize

					$(window)
					.off('resize.chosen')
					.on('resize.chosen', function() {
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					}).trigger('resize.chosen');
					//resize chosen on sidebar collapse/expand
					$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
						if(event_name != 'sidebar_collapsed') return;
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					});

				}

				$('#send_msg').on('click', function(e) {
					e.preventDefault();
					$.post('custom/sendmessage.php',
					{
						Reciepient: $('[name=To]').val(), Message: $('[name=txt_msg]').val()
				  },
					function(data){
						if(data == 'success'){
							bootbox.dialog({
								message: "Your message has been sent succesfully.",
								buttons: {
									"success" : {
										"label" : "OK",
										"className" : "btn-sm btn-primary"
									}
								}
							});
						//	var delay = 1000; //Your delay in milliseconds
						//		setTimeout(function(){ window.location = "http://localhost/wpams"; }, delay);

						} else {
							bootbox.dialog({
							 message: data,
							 buttons: {
								 "Fialed" : {
									 "label" : "OK",
									 "className" : "btn-sm btn-primary"
								 }
							 }
						 });
						}

					});
				});
				//initiate dataTables plugin

				//And for the first simple table, which doesn't have TableTools or dataTables
				//select/deselect all rows according to table header checkbox
				var active_class = 'active';
				$('#users-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header

					$(this).closest('table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
						else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
					});
				});

				//select/deselect a row when the checkbox is checked/unchecked
				$('#users-table').on('click', 'td input[type=checkbox]' , function(){
					var $row = $(this).closest('tr');
					if($row.is('.detail-row ')) return;
					if(this.checked) $row.addClass(active_class);
					else $row.removeClass(active_class);
				});



				/********************************/
				//add tooltip for small view action buttons in dropdown menu
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});

				//tooltip placement on right or left
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();

					var off2 = $source.offset();
					//var w2 = $source.width();

					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}




				/***************/
				$('.show-details-btn').on('click', function(e) {
					e.preventDefault();
					$(this).closest('tr').next().toggleClass('open');
					$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
				});
				/***************/



				$('.easy-pie-chart.percentage').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
					var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
					var size = parseInt($(this).data('size')) || 50;
					$(this).easyPieChart({
						barColor: barColor,
						trackColor: trackColor,
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: parseInt(size/10),
						animate: ace.vars['old_ie'] ? false : 1000,
						size: size
					});
				})

				$('.sparkline').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
					$(this).sparkline('html',
									 {
										tagValuesAttribute:'data-values',
										type: 'bar',
										barColor: barColor ,
										chartRangeMin:$(this).data('min') || 0
									 });
				});


				//flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
				//but sometimes it brings up errors with normal resize event handlers
				$.resize.throttleWindow = false;

				var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
				var data = [
				{ label: "Electronics",  data: "<?php echo $Electronics;?>", color: "#68BC31"},
				{ label: "Equipment",  data: "<?php echo $Equipment;?>", color: "#2091CF"},
				{ label: "Furniture",  data: "<?php echo $Furniture;?>", color: "#AF4E96"},
				{ label: "Software",  data: "<?php echo $Software;?>", color: "#DA5430"},
				{ label: "Machinery",  data: "<?php echo $Machinery;?>", color: "#FEE074"},
				{ label: "Miscalleneous",  data: "<?php echo $Miscalleneous;?>", color: "#19d767"}
				]

				function drawPieChart(placeholder, data, position) {
					$.plot(placeholder, data, {
					series: {
						pie: {
							show: true,
							tilt:0.8,
							highlight: {
								opacity: 0.25
							},
							stroke: {
								color: '#fff',
								width: 2
							},
							startAngle: 2
						}
					},
					legend: {
						show: true,
						position: position || "ne",
						labelBoxBorderColor: null,
						margin:[-30,15]
					}
					,
					grid: {
						hoverable: true,
						clickable: true
					}
				 })
				}
				drawPieChart(placeholder, data);

				/**
				we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
				so that's not needed actually.
				*/
				placeholder.data('chart', data);
				placeholder.data('draw', drawPieChart);


				//pie chart tooltip example
				var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
				var previousPoint = null;

				placeholder.on('plothover', function (event, pos, item) {
				if(item) {
					if (previousPoint != item.seriesIndex) {
						previousPoint = item.seriesIndex;
						var tip = item.series['label'] + " : " + item.series['percent']+'%';
						$tooltip.show().children(0).text(tip);
					}
					$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
				} else {
					$tooltip.hide();
					previousPoint = null;
				}

				});

				/////////////////////////////////////
				$(document).one('ajaxloadstart.page', function(e) {
					$tooltip.remove();
				});




				var d1 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d1.push([i, Math.sin(i)]);
				}

				var d2 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d2.push([i, Math.cos(i)]);
				}

				var d3 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.2) {
					d3.push([i, Math.tan(i)]);
				}


				var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});
				$.plot("#sales-charts", [
					{ label: "Domains", data: d1 },
					{ label: "Hosting", data: d2 },
					{ label: "Services", data: d3 }
				], {
					hoverable: true,
					shadowSize: 0,
					series: {
						lines: { show: true },
						points: { show: true }
					},
					xaxis: {
						tickLength: 0
					},
					yaxis: {
						ticks: 10,
						min: -2,
						max: 2,
						tickDecimals: 3
					},
					grid: {
						backgroundColor: { colors: [ "#fff", "#fff" ] },
						borderWidth: 1,
						borderColor:'#555'
					}
				});


				$('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('.tab-content')
					var off1 = $parent.offset();
					var w1 = $parent.width();

					var off2 = $source.offset();
					//var w2 = $source.width();

					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}


				$('.dialogs,.comments').ace_scroll({
					size: 300
					});


				//Android's default browser somehow is confused when tapping on label which will lead to dragging the task
				//so disable dragging when clicking on label
				var agent = navigator.userAgent.toLowerCase();
				if(ace.vars['touch'] && ace.vars['android']) {
					$('#tasks').on('touchstart', function(e){
					var li = $(e.target).closest('#tasks li');
					if(li.length == 0)return;
					var label = li.find('label.inline').get(0);
					if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
					});
				}

				$('#tasks').sortable({
					opacity:0.8,
					revert:true,
					forceHelperSize:true,
					placeholder: 'draggable-placeholder',
					forcePlaceholderSize:true,
					tolerance:'pointer',
					stop: function( event, ui ) {
						//just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
						$(ui.item).css('z-index', 'auto');
					}
					}
				);
				$('#tasks').disableSelection();
				$('#tasks input:checkbox').removeAttr('checked').on('click', function(){
					if(this.checked) $(this).closest('li').addClass('selected');
					else $(this).closest('li').removeClass('selected');
				});


				//show the dropdowns on top or bottom depending on window height and menu position
				$('#task-tab .dropdown-hover').on('mouseenter', function(e) {
					var offset = $(this).offset();

					var $w = $(window)
					if (offset.top > $w.scrollTop() + $w.innerHeight() - 100)
						$(this).addClass('dropup');
					else $(this).removeClass('dropup');
				});


			})
		</script>
	</body>
</html>
