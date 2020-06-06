<?php
	require('../func/config.php');
      $MethodId = $_GET['DepreciationMethod'];
			$Assetid = $_GET['id'];

			//$id = base64_decode($_GET['id']);
	    $stmt = $db->prepare('SELECT * FROM new_item WHERE Id = :assetId');
	    $stmt->execute(array(':assetId' =>$Assetid));
	    $row = $stmt->fetch();


				$AssetPurchasePrice = $row['PurchasePrice'];

				$OriginalAssetCost =  $row['PurchasePrice'];

				$SalvageValue = $row['ScrapValue'];

				$ExpectedLifespanInYears = $row['ExpectedAssetLife'];
				// $AssetPurchasePrice = 1000;
				//
				// $OriginalAssetCost =  1000;
				//
				// $SalvageValue = 200;
				//
				// $ExpectedLifespanInYears = 5;


  		if($MethodId=="1"){

				//sum of years depreciationMethod

			  $BeginningBookValue = 0;
			  $TotalDeprecibleCost = 0;//costantValue
			  $DepreciationRate = 0;
			  $DepreciationExpenses = 0;
			  $AccumulatedDepreciation = 0;
			  $EndingBookValue = 0;
				$SalvageValue = $asset->getSalvageValue($Assetid);
	  	//step 1
			  $TotalDeprecibleCost = $OriginalAssetCost - $SalvageValue;

				$start = 1;
			  $end = $ExpectedLifespanInYears;

			  $SumOfYears = 0;
			  for ($i = $start; $i <= $end; $i++) {
			    $SumOfYears += $i;
			  }

			  $start = $ExpectedLifespanInYears;
			  $end = 1;

			  $BeginningBookValue = $OriginalAssetCost;
			  $BeginningBookValue_ = $BeginningBookValue;

			echo '<table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">'
					.'<thead>';
				echo '<tr>'
								.'<th class="center">'
									.'Beggining Book Value'
								.'</th>'
								.'<th >Total Depreciable Cost</th>'
								.'<th>Depreciation Rate</th>'

								.'<th class="hidden-480">Depreciation Expenses</th>'

								.'<th>'
									.'Accumulated Depreciation'
								.'</th>'
								.'<th class="hidden-480">Ending Book Value</th>'

							.'</tr>'
						.'</thead>'

					.'<tbody>';
				for ($i = $start; $i >= $end; $i--)
				{
							echo '<tr>'
									.'<td class="center">'
										.round($BeginningBookValue,2)
									.'</td>';
									$DepreciationExpenses = $i/$SumOfYears * $TotalDeprecibleCost;
							    $DepreciationRate = $i/$SumOfYears * 100;
							    $EndingBookValue = $BeginningBookValue - $DepreciationExpenses;
							    $BeginningBookValue = $EndingBookValue;
							    $AccumulatedDepreciation = $OriginalAssetCost - $EndingBookValue;

							echo '<td>'
										.round($TotalDeprecibleCost,2)
									.'</td>'
									.'<td>'.round($DepreciationRate,2).'</td>'
									.'<td class="hidden-480">'.round($DepreciationExpenses,2).'</td>'
									.'<td>'.round($AccumulatedDepreciation,2).'</td>'

									.'<td class="hidden-480">'
										.round($EndingBookValue,2)
									.'</td>'
								.'</tr>';
				}
				echo '</tbody>'
					.'</table>';

			}else if($MethodId=="2"){

			  $DepreciationRate = (100/$ExpectedLifespanInYears)*2;
			  $AssetPurchasePrice = $asset->getPurchasePrice($Assetid);
			  $SalvageValue = $AssetPurchasePrice/$ExpectedLifespanInYears;
			  $DepreciableValue = $AssetPurchasePrice;
			  $AnnualDepreciation = 0;
			  $start = 1;
			  $end = $ExpectedLifespanInYears;

				echo '<table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">'
						.'<thead>';
					echo '<tr>'
									.'<th class="center">'
										.'Year'
									.'</th>'
									.'<th>Salvage Value</th>'
									.'<th>Depreciable Cost</th>'
								.'</tr>'
							.'</thead>'

						.'<tbody>';
			  for ($i = $start; $i <= $end; $i++) {
			    $DepreciableValue = $DepreciableValue - $AnnualDepreciation;
			    $AnnualDepreciation = $DepreciableValue * $DepreciationRate/100;

			    if($DepreciableValue > $SalvageValue){

						echo '<td>'
									.$i
								.'</td>'
								.'<td>'.$SalvageValue.'</td>'
								.'<td class="hidden-480">'.$DepreciableValue.'</td>'
							.'</tr>';
			    }
			  }
			}else if($MethodId=="3"){

					$AssetPurchasePrice = $asset->getPurchasePrice($Assetid);
					$SalvageValue = $asset->getSalvageValue($Assetid);
					$DepreciableValue = $AssetPurchasePrice - $SalvageValue;
					$Depreciation = $DepreciableValue/$ExpectedLifespanInYears;

					echo '<table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">'
							.'<thead>';
						echo '<tr>'
										.'<th class="center">'
											.'Expected Life'
										.'</th>'
										.'<th>Salvage Value</th>'
										.'<th>$Depreciable Value</th>'

										.'<th class="hidden-480">Depreciation</th>'

									.'</tr>'
								.'</thead>'

							.'<tbody>';
				echo '<td>'
										.$ExpectedLifespanInYears
									.'</td>'
									.'<td>'.$SalvageValue.'</td>'
									.'<td class="hidden-480">'.$DepreciableValue.'</td>'
									.'<td class="hidden-480">'.$Depreciation.'</td>'
								.'</tr>';
			}

 // Connection Closed
?>
