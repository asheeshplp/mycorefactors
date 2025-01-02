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
$contaner1ImageCareerPath = "https://pro.corefactors.com/pro/_library/ubold/assets/graph_img/surveyId_" . $surveyId . "_container1.png";	
$contaner2ImageCareerPath = "https://pro.corefactors.com/pro/_library/ubold/assets/graph_img/surveyId_" . $surveyId . "_container2.png";	
$contaner3ImageCareerPath = "https://pro.corefactors.com/pro/_library/ubold/assets/graph_img/surveyId_" . $surveyId . "_container3.png";	
$contaner4ImageCareerPath = "https://pro.corefactors.com/pro/_library/ubold/assets/graph_img/surveyId_" . $surveyId . "_container4.png";	

$data = $surveyResults->results;
$survey_score = json_decode($data);
$pti_result = '';

if ($survey_score->E > $survey_score->I) {
		$pti_result .= 'E';
} elseif ($survey_score->E == $survey_score->I) {
	$pti_result .= 'I';
} else {
	$pti_result .= 'I';
}

if ($survey_score->S > $survey_score->N) {
	$pti_result .= 'S';
} elseif ($survey_score->S == $survey_score->N) {
	$pti_result .= 'S';
} else {
	$pti_result .= 'N';
}

if ($survey_score->T > $survey_score->F) {
	$pti_result .= 'T';
} elseif ($survey_score->T == $survey_score->F) {
	switch ($row['gender']) {
		case 1:
			// echo "Male";
			$pti_result .= 'F';
			break;
		case 2:
			// echo "Female";
			$pti_result .= 'T';
			break;
		case 3:
			// echo "Gender Variant/Non-Conforming";
			$pti_result .= 'T';
			break;
		case 4:
			// echo "Transgender Female";
			$pti_result .= 'T';
			break;
		case 5:
			// echo "Transgender Male";
			$pti_result .= 'F';
			break;
		case 6:
			// echo "Not Listed";
			$pti_result .= 'T';
			break;
		case 7:
			// echo "Prefer Not to Answer";
			$pti_result .= 'T';
			break;
		default:
			// echo "Not Completed";
			$pti_result .= 'T';
			break;
	}
	/* if($row['gender'] == 1) {
		$pti_result .= 'F';
	} elseif($row['gender'] == 2){
		$pti_result .= 'T';
	} */
} else {
	$pti_result .= 'F';
}

if ($survey_score->J > $survey_score->P) {
	$pti_result .= 'J';
} elseif ($survey_score->J == $survey_score->P) {
	$pti_result .= 'P';
} else {
	$pti_result .= 'P';
}

// echo $pti_result; die;	
?>
<div class="tab-content tabs-vertical" id="fourDichotomiesTabContent">
<div class="tab-pane fade show active" id="introduction" role="tabpanel" aria-labelledby="home-tab">
  <div class="tab-content py-4 px-4">                            
	<h3>Your Assessment Results</h3>
	<div class="row">
	  <div class="col-md-8">
		<p class="mb-4">The Core Factors Type Discovery assessment helps you identify which of the 16
		  personality types best describes you. The results of your responses to the four
		  psychological dichotomies can be summed up in the common four-letter
		  psychological type code indicating your preferred personality type pattern.
		</p>  
		
		<div class="results_part2 d-flex justify-content-between ">
		  <div class="layer4_grid">
			<div class="title_header_2 m-0">Your Reported Type</div>
			<div class="fs-1 mt-4 pb-3 fw-semibold text-latter-space">{{ $pti_result }}</div>
		  </div>
		  <div class="layer4_grid">
			<div class="title_header_2 m-0">Your Best-Fit Type</div>
			<div></div>
		  </div>
		</div>
	  </div>
	  <div class="col-md-4">
		<table class="table table-bordered custom-table-2 text-center fw-semibold ps-5 table-discovery-results">
		<?php 
		if($pti_result == '') {
			$class	= 'active';
		} else {
			$class	= '';
		}
		$ptiResult = strtolower($pti_result);
		// echo $ptiResult; die;
		?>
		  <tr>
			<?php $class = $ptiResult == 'istj'?'active':'notactive'; ?>
			<td class="{{ $class }}">ISTJ</td>
			<?php $class = $ptiResult == 'istj'?'active':'notactive'; ?>
			<td class="{{ $class }}">ISFJ</td>
			<?php $class = $ptiResult == 'isfj'?'active':'notactive'; ?>
			<td class="{{ $class }}">INFJ</td>
			<?php $class = $ptiResult == 'intj'?'active':'notactive'; ?>
			<td class="{{ $class }}">INTJ</td>
		  </tr>
		  <tr>
			<?php $class = $ptiResult == 'istp'?'active':'notactive'; ?>
			<td class="{{ $class }}">ISTP</td>
			<?php $class = $ptiResult == 'isfp'?'active':'notactive'; ?>
			<td class="{{ $class }}">ISFP</td>
			<?php $class = $ptiResult == 'infp'?'active':'notactive'; ?>
			<td class="{{ $class }}">INFP</td>
			<?php $class = $ptiResult == 'intp'?'active':'notactive'; ?>
			<td class="{{ $class }}">INTP</td>
		  </tr>
		  <tr>
			<?php $class = $ptiResult == 'estp'?'active':'notactive'; ?>
			<td class="{{ $class }}">ESTP</td>
			<?php $class = $ptiResult == 'esfp'?'active':'notactive'; ?>
			<td class="{{ $class }}">ESFP</td>
			<?php $class = $ptiResult == 'enfp'?'active':'notactive'; ?>
			<td class="{{ $class }}">ENFP</td>
			<?php $class = $ptiResult == 'entp'?'active':'notactive'; ?>
			<td class="{{ $class }}">ENTP</td>
		  </tr>
		  <tr>
			<?php $class = $ptiResult == 'estj'?'active':'notactive'; ?>
			<td class="{{ $class }}">ESTJ</td>
			<?php $class = $ptiResult == 'esfj'?'active':'notactive'; ?>
			<td class="{{ $class }}">ESFJ</td>
			<?php $class = $ptiResult == 'enfj'?'active':'notactive'; ?>
			<td class="{{ $class }}">ENFJ</td>
			<?php $class = $ptiResult == 'entj'?'active':'notactive'; ?>
			<td class="{{ $class }}">ENTJ</td>
		  </tr>
		</table>                           
	  </div>

	  <p class="mt-4">Personality typology helps us identify our typical way of approaching life. Understanding the benefits and potential challenges
		that are found in each of the 16 approaches serves to enrich our general effectiveness in life. Knowing which of the 16
		personality types you prefer will help you begin to approach every situation with a new perspective of understanding and
		appreciation for the differences in yourself and others. It is important for you to explore the personality type description on the
		following page and discuss any questions you might have with your practitioner to validate the results of the assessment.
	  </p>

	  <div class="row-colum">
		<div class="text-center p-2 title-bg-modified">Your Core Factors Type Discovery Assessment Results</div>
		<div class="overflow-x-auto">
		<div class="colum_box_wrap wight_bg colum_box_wrap_1 d-flex modified-report-global report-2-section justify-content-center">
		  <div class="colum_chart type-element-chart type-element-full-chart">
			<div class="chart_row_colum">              
			  <div class="row__column_bg row top-img-1 modified-report-img-1 d-flex justify-content-center align-items-center">
				<div class="left-info-chart-text d-flex align-items-center col-2 mt-4 ps-0">
				  <div class="big-title-text pe-2 w-90 fw-semibold">Extraversion</div>
				  <div class="small-title-text pe-4 fs-2 four-dechotomies-inner">E</div>
				</div>
				<div class="management col-7">
				  <div class="top-bottom">
					<ul class="d-flex list-none justify-content-between mb-0 px-2 fs-6">
					  <li>VERY CLEAR</li>
					  <li>CLEAR</li>
					  <li>SLIGHT</li>
					  <li>UNCLEAR</li>
					  <li>UNCLEAR</li>
					  <li>SLIGHT</li>
					  <li>CLEAR</li>
					  <li>VERY CLEAR</li>
					</ul>
				  </div>
				  <img src="<?php echo $contaner1ImageCareerPath; ?>" class="w-100" alt="container1" height="auto">
				</div>                                           
				<div class="left-info-chart-text d-flex align-items-center col-2  mt-4">                                          
				  <div class="small-title-text ps-4 fs-2 four-dechotomies-inner">I</div>
				  <div class="big-title-text ps-2 w-90 fw-semibold">Introversion</div>
			  </div>
			  </div>          
			</div>

			<div class="chart_row_colum mt-3">              
			  <div class="row__column_bg top-img-1 row modified-report-img-1 d-flex justify-content-center align-items-center">
				<div class="left-info-chart-text d-flex align-items-center col-2">
				  <div class="big-title-text pe-4 fw-semibold w-90">Sensing</div>
				  <div class="small-title-text pe-4 fs-2 four-dechotomies-inner">S</div>
				</div>
				<div class="management col-7">                                         
				  <img src="<?php echo $contaner2ImageCareerPath; ?>" class="w-100" alt="container1" height="auto">
				</div> 
				<div class="left-info-chart-text d-flex align-items-center col-2">                                          
				  <div class="small-title-text ps-4 fs-2 four-dechotomies-inner">N</div>
				  <div class="big-title-text ps-4 fw-semibold w-90">iNtuiting</div>
			  </div>
			  </div>          
			</div>

			<div class="chart_row_colum mt-3">              
			  <div class="row__column_bg top-img-1 row modified-report-img-1 d-flex justify-content-center align-items-center">
				<div class="left-info-chart-text d-flex align-items-center col-2">
				  <div class="big-title-text pe-4 fw-semibold w-90">Thinking</div>
				  <div class="small-title-text pe-4 fs-2 four-dechotomies-inner">T</div>
				</div>
				<div class="management col-7">                                         
				  <img src="<?php echo $contaner3ImageCareerPath; ?>" class="w-100" alt="container1" height="auto">
				</div> 
				<div class="left-info-chart-text d-flex align-items-center col-2">                                          
				  <div class="small-title-text ps-4 fs-2 four-dechotomies-inner">F</div>
				  <div class="big-title-text ps-4 fw-semibold w-90">Feeling</div>
			  </div>
			  </div>          
			</div>

			<div class="chart_row_colum mt-3">              
			  <div class="row__column_bg top-img-1 row modified-report-img-1 d-flex justify-content-center align-items-center">
				<div class="left-info-chart-text d-flex align-items-center col-2">
				  <div class="big-title-text pe-4 fw-semibold w-90">Judgment</div>
				  <div class="small-title-text pe-4 fs-2 four-dechotomies-inner">J</div>
				</div>
				<div class="management col-7">                                         
				  <img src="<?php echo $contaner4ImageCareerPath; ?>" class="w-100" alt="container1" height="auto">
				</div> 
				<div class="left-info-chart-text d-flex align-items-center col-2">                                          
				  <div class="small-title-text ps-4 fs-2 four-dechotomies-inner">P</div>
				  <div class="big-title-text ps-4 fw-semibold w-90">Perception</div>
			  </div>
			  </div>          
			</div>


		  </div>
		</div>
	  </div>
	  </div>

	</div>

	<hr/>

	<div class="btn-info d-flex justify-content-center gap-3">
		<a class=" btn-info-comman btn-previous" n-next" onclick="showContenttd('fourdichotomies');" href="javascript:void(0);">Previous</a>
		<a class="btn-info-comman btn-next" n-next" onclick="showContenttd('wholetyperesults');" href="javascript:void(0);">Next</a>
	</div>
  </div>
</div>                        
</div>
<?php
}
?>