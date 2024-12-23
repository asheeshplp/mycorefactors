<?php 
use Illuminate\Support\Facades\DB;

if($isResultreleased == 0) {
?>
<div class="tab-pane fade show active" id="eq-skills-content" role="tabpanel" aria-labelledby="reported-results-tab">
	<div class="tab-content py-4 px-4">
		<div class="alert alert-warning">
		  <strong>Sorry!</strong> Result for this report is not yet released.
		</div>
	</div>
</div>

<?php 
die;
}
if(!$surveyResults) {
?>
<div class="tab-pane fade show active" id="eq-skills-content" role="tabpanel" aria-labelledby="reported-results-tab">
                          <div class="tab-content py-4 px-4">
<div class="alert alert-warning">
  <strong>Sorry!</strong> No Content to display.
</div>

<div class="btn-info d-flex justify-content-center gap-3" style="margin-top: 20px;">
                                <a class=" btn-info-comman btn-previous" onclick="showContent('interpretingtab');" href="javascript:void(0);">Previous</a>
                                <a class="btn-info-comman btn-next" onclick="showContent('eqdimensioncompetencies');" href="javascript:void(0);">Next</a>
                            </div>
                            </div>
                            </div>
<?php
} else {
$data = $surveyResults->results;
$survey_score = json_decode($data);
$contaner1ImageCareerPath = "https://pro.corefactors.com/pro/_library/ubold/assets/graph_img/surveyId_" . $surveyId . "_container2.png";
$n = ['R' => $survey_score->finalscalscoreAR, 'I' => $survey_score->finalscalscoreAI, 'A' => $survey_score->finalscalscoreAA, 'S' => $survey_score->finalscalscoreAS, 'E' => $survey_score->finalscalscoreAE, 'C' => $survey_score->finalscalscoreAC];
arsort($n);
$top3 = array_slice($n, 0, 3);	
$getinterest = '';
foreach($top3 as $key => $value) { 
	$getinterest .= $key;
}
$firstVal = substr($getinterest, 0, 1);
$secondVal = substr($getinterest, 1, 1);
$thirdVal = substr($getinterest, 2, 1);
$valueArray = array();
$valueArray['R'] = 1;
$valueArray['I'] = 2;
$valueArray['A'] = 3;
$valueArray['S'] = 4;
$valueArray['E'] = 5;
$valueArray['C'] = 6;

$data = DB::connection('mysql')->select('SELECT DISTINCT onetsoc_code FROM interests i Where Exists (Select * From interests Where onetsoc_code = i.onetsoc_code And scale_id = "IH" AND data_value = '.$valueArray[$firstVal].') And Exists (Select * From interests Where onetsoc_code = i.onetsoc_code And scale_id = "IH" AND data_value = '.$valueArray[$secondVal].') AND Exists (Select * From interests Where onetsoc_code = i.onetsoc_code And scale_id = "IH" AND data_value = '.$valueArray[$thirdVal].')');
$occupationResult = [];
$count=0;
foreach($data as  $code){
	$cde =	$code->onetsoc_code;
	$sqlQueryForOccupationTitle = DB::connection('')->select('select title from  occupation_data where onetsoc_code="'.$cde.'"');
	$sqlQueryForJobZone = DB::connection('mysql')->select('select job_zone from  job_zones where onetsoc_code="'.$cde.'"');
    $sqlQueryForInterstCode = DB::connection('mysql')->select('select data_value from  interests where scale_id="IH" AND onetsoc_code="'.$cde.'"');
    $intrstRslt = json_decode(json_encode($sqlQueryForInterstCode), true);                        
	$intrstStrng = '';
	foreach($intrstRslt as $intrstVal){ 
		$intrstStrng .= array_search($intrstVal['data_value'],$valueArray);
	}
	$occupationResult[$count]['interest_code'] = $intrstStrng;
	$occupationResult[$count]['title'] = $sqlQueryForOccupationTitle[0]->title;
	$occupationResult[$count]['title_link'] = 'https://www.onetonline.org/link/summary/'.$cde;
	$occupationResult[$count]['job_zone'] = $sqlQueryForJobZone[0]->job_zone;
	$occupationResult[$count]['onetsoc_code'] = $cde;
	$count++;			
} 
$dataCount = count($occupationResult);
if($dataCount>0 ){

?>
<div class="tab-content tabs-vertical" id="myTabContent">
<div class="tab-pane fade show active" id="introduction" role="tabpanel" aria-labelledby="home-tab">
  <div class="tab-content py-4 px-4">
	<h1>Occupational Code Appendix</h1>                           
	<div class="table-responsive">
	  <table class="table table-borderd table-border-black">
		<thead>
		  <tr>
			<th scope="col">GIA Code</th>
			<th scope="col">Occupation</th>
			<th scope="col">NOC</th>
		  </tr>
		</thead>
		<tbody>
		<?php 
		foreach($occupationResult as $key => $value) {
		?>
		<tr>
			<td><?php echo $value['interest_code']; ?></td>
			<td><a href="<?php echo $value['title_link']; ?>" target="_blank"><?php echo $value['title']; ?></a></td>
			<td><?php echo $value['onetsoc_code']; ?></td>
		</tr>		
		<?php } ?>
	  </table>
	</div>
	<p>You can search for more interests code : <a href="{{ url('careerexplorer') }}">here</a></p>
	<hr/>

	<div class="btn-info d-flex justify-content-center gap-3">
		<a class=" btn-info-comman btn-previous" onclick="showContentcp('careerexploration');" href="javascript:void(0);">Previous</a>
		<a class="btn-info-comman btn-next disabled bg-transparent" href="javascript:void(0);">Next</a>
	</div>
  </div>
</div>                        
</div>                    
<?php 
} else {
?>
<div class="tab-pane fade show active" id="eq-skills-content" role="tabpanel" aria-labelledby="reported-results-tab">
	<div class="tab-content py-4 px-4">
		<div class="alert alert-warning">
		  <strong>Sorry!</strong> No Content to display.
		</div>
	</div>
</div>
<?php
}
} 
?>                   