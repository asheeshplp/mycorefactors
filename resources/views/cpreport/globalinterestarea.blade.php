<?php 
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
// echo '<pre>'; print_r($top3); die; 
?>
<div class="tab-content tabs-vertical" id="globalInterestAreaContent">
	<div class="tab-content py-4 px-4">
		<h1>Your Global Interest Area (GIA) Profile</h1> 
		<p>Your results for the six Global Interest Area (GIA) scales are found in the bar chart below. Review your highest and lowest areas
		  of interest. These results represent your overall pattern or style of interest. We are attracted to our high-interest area
		  environments and individuals. Your responses to lower interest areas may range from no response to a strong aversion to a
		  particular area. Your practitioner can help you apply this information more effectively to explore your relationship with
		  individuals and occupational environments.</p>
		
		  <div class="row-colum">
			<div class="text-center p-2 title-bg-modified">Your Global Interest Area (GIA) Profile</div>
			<div class="overflow-x-auto">
			<div class="colum_box_wrap wight_bg colum_box_wrap_1 d-flex modified-report-global report-2-section">
			 
			  <div class="left-text">
				<ul class="list-none modified-report">
				  <li>Working With Physical Things (R)</li>
				  <li>Working With Mental Information (I)</li>
				  <li>Creativity and Art (A)</li>
				  <li>Helping and Serving Others (S)</li>
				  <li>Persuading and Leading Others (E)</li>
				  <li>Organizing Work and Environments (C)</li>                                     
				</ul>
			  </div>
			  <div class="colum_chart">
				<div class="d-flex top-text justify-content-center">
				  <h5 class="mb-2 fw-600 text-black">Interest Level</h5>                                      
				</div>
				<div class="top-bottom">
				  <ul class="d-flex list-none justify-content-evenly mb-0 ps-5">
					<li>Low</li>
					<li>Moderate</li>
					<li>Strong</li>
					<li>Very Strong</li>                                      
				  </ul>
				</div>
				<div class="chart_row_colum">

				  <div class="row__column_bg top-img-1 modified-report-img">
					<div class="management">
					  <img src="<?php echo $contaner1ImageCareerPath; ?>" alt="container1">
					</div>
				  </div>

				</div>
			  </div>
			</div>
		  </div>
		  </div>
		
		  <div id="gia-result-career" class="mt-4 pt-3">
			  <h2 class="heading-inner-comman">Using Your GIA Results to Assist in Career Decisions</h2>
			  <p>These six areas are considered general areas that most people and work environments will fit into. The Global Interest Area
				(GIA) results provide you with a common 3-letter GIA code. The wealth of information that matches the code directly to specific
				occupations makes the Global Interest Areas helpful in developing a well-thought-out occupational choice. Your three strongest
				areas of interest represent your three-letter occupational code.</p>
				
				<div class="understand-pref table-responsive">
				  <table class="table-striped-custom  mt-3" style="width:100%">
					<thead>
					  <tr>
						<th>GIA Code </th>
						<th>Global Interest Areas (GIA)</th>
						<th>Interest Percentage</th>
					  </tr>
				  </thead>
					<tbody>
					  <tr>
						<td>R</td>
						<td>Working With Physical Things</td>
						<td><?php echo $survey_score->finalscalscoreAR; ?>%</td>
					</tr>
					<tr>
					  <td>I</td>
					  <td>Working With Mental Information</td>
					  <td><?php echo $survey_score->finalscalscoreAI; ?>%</td>
					</tr>
					<tr>
					  <td>A</td>
					  <td>Creativity and Art</td>
					  <td><?php echo $survey_score->finalscalscoreAA; ?>%</td>
					</tr>
					<tr>
					  <td>S</td>
					  <td>Helping and Serving Others </td>
					  <td><?php echo $survey_score->finalscalscoreAS; ?>%</td>
					</tr>
					<tr>
					  <td>E</td>
					  <td>Persuading and Leading Others</td>
					  <td><?php echo $survey_score->finalscalscoreAE; ?>%</td>
					</tr>
					<tr>
					  <td>C</td>
					  <td>Organizing Work and Environments</td>
					  <td><?php echo $survey_score->finalscalscoreAC; ?>%</td>
					</tr>
					</tbody>
				  </table>
			  </div>
		  </div>

		  <div id="globalInterest-area" class="mt-5">
			<div class="table-responsive">
				<table class="table globalInterest-area-table" border="0">
					<thead>
					  <tr>
						<th class="title-bg-modified border-0 text-start fw-600 p-3" colspan="2" scope="col">Your Global Interest Area (GIA) Code</th>                                                                                   
					  </tr>
					</thead>
					<tbody>
					  <tr>
						<?php 
						$getinterest = '';
						$topHtml = '';
						foreach($top3 as $key => $value) { 
							$getinterest .= $key;
						}
							?>
						<td class="p-3 border-0 text-ecs" width="50%"><span class="d-flex justify-content-between">
						<?php
						foreach($top3 as $key => $value) {
						?>
						<span><?php echo $key; ?></span>
						<?php
						}
						?>
						</span></td>
						<td  class="p-3 border-0 text-ecs-info"width="50%"><p>At the end of this report, you will find a list of
						  occupations that match with the combinations of
						  your three-letter GIA code. These occupations are
						  retrieved from the O*NET database, the nation’s
						  primary source of occupational information. This will
						  direct you to more information about occupations
						  associated with your GIA code.</p></td>
					  </tr>  
					</tbody>
				 </table>                                       
			</div>
			<p class="mb-4">Review your Global Interest Area (GIA) results along with the Occupational Activity Groupings (OAG) results to help you in your
			  career/job-seeking journey.</p>
		  </div>                             
	<hr/>

	<div class="btn-info d-flex justify-content-center gap-3">
		<a class=" btn-info-comman btn-previous" onclick="showContentcp('gia-tab');" href="javascript:void(0);">Previous</a>
		<a class="btn-info-comman btn-next" onclick="showContentcp('careerexploration');" href="javascript:void(0);">Next</a>
	</div>
	</div>
  </div>
<?php } ?>                   