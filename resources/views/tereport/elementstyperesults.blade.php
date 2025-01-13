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
$contaner5ImageCareerPath = "https://pro.corefactors.com/pro/_library/ubold/assets/graph_img/surveyId_" . $surveyId . "_container5.png";	
$contaner6ImageCareerPath = "https://pro.corefactors.com/pro/_library/ubold/assets/graph_img/surveyId_" . $surveyId . "_container6.png";	
$contaner7ImageCareerPath = "https://pro.corefactors.com/pro/_library/ubold/assets/graph_img/surveyId_" . $surveyId . "_container7.png";	
$contaner8ImageCareerPath = "https://pro.corefactors.com/pro/_library/ubold/assets/graph_img/surveyId_" . $surveyId . "_container8.png";

$contaner9ImageCareerPath = "https://pro.corefactors.com/pro/_library/ubold/assets/graph_img/surveyId_" . $surveyId . "_container9.png";	
$contaner10ImageCareerPath = "https://pro.corefactors.com/pro/_library/ubold/assets/graph_img/surveyId_" . $surveyId . "_container10.png";	
$contaner11ImageCareerPath = "https://pro.corefactors.com/pro/_library/ubold/assets/graph_img/surveyId_" . $surveyId . "_container11.png";	
$contaner12ImageCareerPath = "https://pro.corefactors.com/pro/_library/ubold/assets/graph_img/surveyId_" . $surveyId . "_container12.png";	

$contaner13ImageCareerPath = "https://pro.corefactors.com/pro/_library/ubold/assets/graph_img/surveyId_" . $surveyId . "_container13.png";	
$contaner14ImageCareerPath = "https://pro.corefactors.com/pro/_library/ubold/assets/graph_img/surveyId_" . $surveyId . "_container14.png";	
$contaner15ImageCareerPath = "https://pro.corefactors.com/pro/_library/ubold/assets/graph_img/surveyId_" . $surveyId . "_container15.png";	
$contaner16ImageCareerPath = "https://pro.corefactors.com/pro/_library/ubold/assets/graph_img/surveyId_" . $surveyId . "_container16.png";	

$contaner17ImageCareerPath = "https://pro.corefactors.com/pro/_library/ubold/assets/graph_img/surveyId_" . $surveyId . "_container17.png";	
$contaner18ImageCareerPath = "https://pro.corefactors.com/pro/_library/ubold/assets/graph_img/surveyId_" . $surveyId . "_container18.png";	
$contaner19ImageCareerPath = "https://pro.corefactors.com/pro/_library/ubold/assets/graph_img/surveyId_" . $surveyId . "_container19.png";	
$contaner20ImageCareerPath = "https://pro.corefactors.com/pro/_library/ubold/assets/graph_img/surveyId_" . $surveyId . "_container20.png";	

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
	switch ($survey_score->gender) {
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
<div class="tab-content tabs-vertical" id="elements-type-resultsTabContent">
                                                <div class="tab-pane fade show active" id="introduction" role="tabpanel"
                                                    aria-labelledby="home-tab">
                                                    <div class="tab-content py-4 px-4">
                                                        <h1>Your Core Factors Type Elements Results</h1>
                                                        <p class="mb-4">This section of the report will present the
                                                            results from your responses that provide information about
                                                            subscales of your four
                                                            basic personality type dimensions—or elements of personality
                                                            type. Individual differences will occur for all of us who
                                                            hold a
                                                            preference for a particular dichotomy. For example, two
                                                            individuals who have the same preference for extraverted, or
                                                            external energy, may express themselves differently in
                                                            social settings; one very gregarious and one more reserved
                                                            in verbal
                                                            interaction. In that particular social setting we see them
                                                            differently and may believe one to be extraverted and one
                                                            introverted. The elements of personality type that are
                                                            presented on the following pages provide an explanation for
                                                            some of
                                                            these individual differences.</p>

                                                        <h5>Making sense of your results requires that you understand
                                                            some
                                                            information about what these elements represent.</h5>
                                                        <ul class="list-disc mt-3">
                                                            <li>The scales are sums of your responses to questions on
                                                                the Core Factors Type Elements
                                                                assessment.</li>
                                                            <li>No result is right or wrong, it is a healthy and natural
                                                                expression of you.</li>
                                                            <li>Your score levels are more an indication of your style
                                                                of responding to questions and do
                                                                not mean how much of something you have or do not have.
                                                            </li>
                                                            <li>It is not correct or meaningful to compare your results
                                                                with others, as they are an
                                                                expression of you.</li>
                                                        </ul>

                                                        <p>You are encouraged to spend time reviewing your results with
                                                            your practitioner, noticing when there are large differences
                                                            between the subscale dichotomies (strong difference) and
                                                            when you have responded in such a way as to indicate little
                                                            or no
                                                            difference between a scale’s dichotomies (unclear
                                                            difference). Your results could be in the opposite direction
                                                            of the four-type
                                                            dichotomy result that you found in the first section of this
                                                            report. This individualized response pattern is not an
                                                            error. It
                                                            represents an element of your unique expression of your
                                                            psychological type pattern.</p>

                                                        <p>There is a lot of information in the 32 scales (16 Element
                                                            dichotomies) to digest and understand. An effort has been
                                                            made to
                                                            keep this report free of jargon to make it easy to connect
                                                            your results with your understanding of your personality.
                                                            The results
                                                            are presented by four-type dichotomy dimensions.</p>




                                                        <div class="row mt-5" id="energy-acquisition">
                                                            <div class="col-md-12 mt-3">
                                                                <h2 class="heading-inner-comman mb-5">Elements of Energy
                                                                    Acquisition and Distribution</h2>
                                                                <p>The graph below represents the results from your
                                                                    responses on the Core Factors Type Elements
                                                                    subscales from the type
                                                                    dimension of energy acquisition and distribution.
                                                                </p>
                                                                <div class="four-dichotomies-section mt-4 mb-3">
                                                                    <div
                                                                        class="d-flex justify-content-between four-dechotomies-header">
                                                                        <div
                                                                            class="four-dechotomies-title text-uppercase">
                                                                            EXTERNAL</div>
                                                                        <div
                                                                            class="innder-four-dechotomies-title text-uppercase">
                                                                            ENERGY ACQUISITION AND DISTRIBUTION</div>
                                                                        <div
                                                                            class="four-dechotomies-title text-uppercase">
                                                                            INTERNAL</div>
                                                                    </div>

                                                                    <div
                                                                        class="d-flex justify-content-between four-dechotomies-innrer-info align-items-center p-3">
                                                                        <div
                                                                            class="four-dechotomies-inner text-uppercase">
                                                                            E</div>
                                                                        <div
                                                                            class="innder-four-dechotomies-text text-center">
                                                                            Energy acquisition and distribution is the
                                                                            focus of attention and the direction of the
                                                                            source
                                                                            of psychological energy. The two directions
                                                                            of focus and energy are Extraversion
                                                                            (external)
                                                                            and Introversion (internal).</div>
                                                                        <div
                                                                            class="four-dechotomies-inner text-uppercase">
                                                                            I</div>
                                                                    </div>
                                                                </div>
                                                                <div class="row-colum">
                                                                    <div class="text-center p-2 title-bg-modified">Elements of Energy: Acquisition and Distribution</div>
                                                                    <div class="overflow-x-auto">
                                                                    <div class="colum_box_wrap wight_bg colum_box_wrap_1 d-flex modified-report-global report-2-section justify-content-center">
                                                                      <div class="colum_chart type-element-chart type-element-full-chart element-chart-one">
                                                                        <div class="chart_row_colum">              
                                                                          <div class="row__column_bg row top-img-1 modified-report-img-1 d-flex justify-content-center align-items-center gap-3">
                                                                            <div class="left-info-chart-text d-flex align-items-end col-2 mt-4 ps-0 pe-0 justify-content-end">
                                                                              <div class="big-title-text w-90 fw-semibold text-end pe-0 ">Starting Action</div>                                                                             
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
                                                                              <img src="<?php echo $contaner5ImageCareerPath; ?>" class="w-100" alt="container1" height="auto">
                                                                            </div>                                           
                                                                            <div class="left-info-chart-text d-flex align-items-center col-2  mt-4 p-0">
                                                                              <div class="big-title-text w-90 fw-semibold">Observing Action</div>
                                                                          </div>
                                                                          </div>          
                                                                        </div>
                                    
                                                                        <div class="chart_row_colum mt-3">              
                                                                          <div class="row__column_bg top-img-1 row modified-report-img-1 d-flex justify-content-center align-items-center gap-3">
                                                                            <div class="left-info-chart-text d-flex align-items-center col-2 p-0 pe-0 justify-content-end">
                                                                              <div class="big-title-text fw-semibold w-90 text-end">Tendency for
                                                                                Group Settings</div>                                                                             
                                                                            </div>
                                                                            <div class="management col-7">                                         
                                                                              <img src="<?php echo $contaner6ImageCareerPath; ?>" class="w-100" alt="container1" height="auto">
                                                                            </div> 
                                                                            <div class="left-info-chart-text d-flex align-items-center col-2 p-0">                                          
                                                                              <div class="big-title-text fw-semibold w-90">Tendency for One-on-one Settings</div>
                                                                          </div>
                                                                          </div>          
                                                                        </div>
                                    
                                                                        <div class="chart_row_colum mt-3">              
                                                                          <div class="row__column_bg top-img-1 row modified-report-img-1 d-flex justify-content-center align-items-center gap-3">
                                                                            <div class="left-info-chart-text d-flex align-items-center col-2 p-0 pe-0 justify-content-end">
                                                                              <div class="big-title-text fw-semibold w-90 text-end">Socially Expressive</div>
                                                                            </div>
                                                                            <div class="management col-7">                                         
                                                                              <img src="<?php echo $contaner7ImageCareerPath; ?>" class="w-100" alt="container1" height="auto">
                                                                            </div> 
                                                                            <div class="left-info-chart-text d-flex align-items-center col-2 p-0">                                          
                                                                              <div class="big-title-text fw-semibold w-90">Socially Reflective</div>
                                                                          </div>
                                                                          </div>          
                                                                        </div>
                                    
                                                                        <div class="chart_row_colum mt-3">              
                                                                          <div class="row__column_bg top-img-1 row modified-report-img-1 d-flex justify-content-center align-items-center gap-3">
                                                                            <div class="left-info-chart-text d-flex align-items-center col-2 p-0 pe-0 justify-content-end">
                                                                              <div class="big-title-text fw-semibold w-90 text-end">Energizing Effect</div>
                                                                            </div>
                                                                            <div class="management col-7">                                         
                                                                              <img src="<?php echo $contaner8ImageCareerPath; ?>" class="w-100" alt="container1" height="auto">
                                                                            </div> 
                                                                            <div class="left-info-chart-text d-flex align-items-center col-2 p-0">                                          
                                                                              <div class="big-title-text fw-semibold w-90">Calming Effect</div>
                                                                          </div>
                                                                          </div>          
                                                                        </div>
                                    
                                    
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                </div>

                                                                <div class="type-element-info mt-5">
                                                                    <div class="elements-colum3-wrap">
                                                                        <div class="colum2 light_bg d-flex justify-content-space-between">
                                                                            <div class="w-50 text-center align-self-center">
                                                                                <h6 class="mb-0 p-3 text-black fw-bold">Elements of Extraversion</h6>
                                                                            </div>
                                                                            <div class="w-50 text-center align-self-center">
                                                                                <h6 class="mb-0 p-3 text-black fw-bold">Elements of Introversion</h6>
                                                                            </div>
                                                                        </div>
                                                        
                                                                        <div class="colum3 d-flex justify-content-space-center align-items-stretch">
                                                                            <div class="fa-left col-5">
                                                                                <div class="felx_wrap d-flex align-items-center gap-3 p-3 h-100">
                                                                                    <h6  class="mb-0 text-black fw-bold fs-14 col-3 text-end">Starting Action</h6>
                                                                                    <p class="mb-0 fs-14">a preference for energy exchange by direct involvement in the initiation or starting of projects and activities. </p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="fa-center col-2">
                                                                                <h4> <i> Unclear Difference </i></h4>
                                                                            </div>
                                                                            <div class="fa-right col-5">
                                                                                <div class="felx_wrap d-flex align-items-center gap-3 p-3 h-100">
                                                                                    <h6 class="mb-0 text-black fw-bold fs-14  col-3 text-end">Observing Action</h6>
                                                                                    <p class="mb-0 fs-14">a preference for energy exchange by involvement in projects and activities through observing the starting process and at times being included in the action after it gets going.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                        
                                                                        <div class="colum3 d-flex justify-content-space-center align-items-stretch">
                                                                            <div class="fa-left col-5">
                                                                                <div class="felx_wrap d-flex align-items-center gap-3 p-3 h-100">
                                                                                    <h6 class="mb-0 text-black fw-bold fs-14 col-3 text-end">Tendency for Group Settings</h6>
                                                                                    <p class="mb-0 fs-14">the attraction to the exchange of energy available in the activity of group interactions.</p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="fa-center col-2">
                                                                                <h4> <i> Moderate Difference </i></h4>
                                                                            </div>
                                                                            <div class="fa-right col-5">
                                                                                <div class="felx_wrap d-flex align-items-center gap-3 p-3 h-100">
                                                                                    <h6 class="mb-0 text-black fw-bold fs-14 col-3 text-end">Tendency for One-on-one settings</h6>
                                                                                    <p class="mb-0 fs-14">the attraction to the exchange of energy available in the one-on-one interactions with others.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                        
                                                                        <div class="colum3 d-flex justify-content-space-center align-items-stretch">
                                                                            <div class="fa-left col-5">
                                                                                <div class="felx_wrap d-flex align-items-center gap-3 p-3 h-100">
                                                                                    <h6 class="mb-0 text-black fw-bold fs-14 col-3 text-end">Socially Expressive</h6>
                                                                                    <p class="mb-0 fs-14">the preference for expression through voice and action to exchange energy in social situations.</p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="fa-center col-2">
                                                                                <h4> <i> Strong Difference </i></h4>
                                                                            </div>
                                                                            <div class="fa-right col-5">
                                                                                <div class="felx_wrap d-flex align-items-center gap-3 p-3 h-100">
                                                                                    <h6 class="mb-0 text-black fw-bold fs-14 col-3 text-end">Socially Reflective</h6>
                                                                                    <p class="mb-0 fs-14">the preference for thought and reflection as an energy exchange modality in social situations.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                        
                                                                        <div class="colum3 d-flex justify-content-space-center align-items-stretch">
                                                                            <div class="fa-left col-5">
                                                                                <div class="felx_wrap d-flex align-items-center gap-3 p-3 h-100">
                                                                                    <h6 class="mb-0 text-black fw-bold fs-14 col-3 text-end">Energizing Effect</h6>
                                                                                    <p class="mb-0 fs-14">the presentation of an overt robust exchange of energy that results in an energizing effect on others.</p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="fa-center col-2">
                                                                                <h4> <i> Strong Difference </i></h4>
                                                                            </div>
                                                                            <div class="fa-right col-5">
                                                                                <div class="felx_wrap d-flex align-items-center gap-3 p-3 h-100">
                                                                                    <h6 class="mb-0 text-black fw-bold fs-14 col-3 text-end">Calming Effect</h6>
                                                                                    <p class="mb-0 fs-14">the presentation of a more tranquil measured interaction that results in a calming influence on others.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                        
                                                                    </div>
                                                                </div>
                                                               

                                                               
                                                            </div>
                                                        </div>

                                                        <div class="row mt-5" id="perceiving-attending">
                                                            <div class="col-md-12 mt-3">
                                                                <h2 class="heading-inner-comman mb-5">Elements of Perceiving or Attending to Information                                                                </h2>
                                                                <p>The graph below represents the results from your responses on the Core Factors Type Elements subscales from the type
                                                                    dimension of perceiving and attending to information.
                                                                </p>
                                                                <div class="four-dichotomies-section mt-4 mb-3">
                                                                    <div
                                                                        class="d-flex justify-content-between four-dechotomies-header">
                                                                        <div
                                                                            class="four-dechotomies-title text-uppercase">
                                                                            Sensing</div>
                                                                        <div class="innder-four-dechotomies-title text-uppercase">
                                                                            PERCEIVING OR ATTENDING TO INFORMATION</div>
                                                                        <div
                                                                            class="four-dechotomies-title text-uppercase">
                                                                            iNtuiting</div>
                                                                    </div>

                                                                    <div
                                                                        class="d-flex justify-content-between four-dechotomies-innrer-info align-items-center p-3">
                                                                        <div
                                                                            class="four-dechotomies-inner text-uppercase">
                                                                            S</div>
                                                                        <div
                                                                            class="innder-four-dechotomies-text text-center">
                                                                            Perceiving or attending to information is the mental process by which one takes in or attends to information about physical surroundings and concepts. The two forms of perception are Sensing and iNtuiting.</div>
                                                                        <div
                                                                            class="four-dechotomies-inner text-uppercase">
                                                                            N</div>
                                                                    </div>
                                                                </div>
                                                                <div class="row-colum">
                                                                    <div class="text-center p-2 title-bg-modified">Elements of Energy: Acquisition and Distribution</div>
                                                                    <div class="overflow-x-auto">
                                                                    <div class="colum_box_wrap wight_bg colum_box_wrap_1 d-flex modified-report-global report-2-section justify-content-center">
                                                                      <div class="colum_chart type-element-chart type-element-full-chart element-chart-one">
                                                                        <div class="chart_row_colum">              
                                                                          <div class="row__column_bg row top-img-1 modified-report-img-1 d-flex justify-content-center align-items-center gap-3">
                                                                            <div class="left-info-chart-text d-flex align-items-end col-2 mt-4 ps-0 pe-0 justify-content-end">
                                                                              <div class="big-title-text fw-semibold w-90 text-end">Drawn to Facts</div>                                                                             
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
                                                                              <img src="<?php echo $contaner9ImageCareerPath; ?>" class="w-100" alt="container1" height="auto">
                                                                            </div>                                           
                                                                            <div class="left-info-chart-text d-flex align-items-center col-2  mt-4 p-0">
                                                                              <div class="big-title-text w-90 fw-semibold">Drawn to Ideas                                                                            </div>
                                                                          </div>
                                                                          </div>          
                                                                        </div>
                                    
                                                                        <div class="chart_row_colum mt-3">              
                                                                          <div class="row__column_bg top-img-1 row modified-report-img-1 d-flex justify-content-center align-items-center gap-3">
                                                                            <div class="left-info-chart-text d-flex align-items-center col-2 ps-0 pe-0 justify-content-end">
                                                                              <div class="big-title-text fw-semibold w-90 text-end">Choose the Standard</div>                                                                             
                                                                            </div>
                                                                            <div class="management col-7">                                         
                                                                              <img src="<?php echo $contaner10ImageCareerPath; ?>" class="w-100" alt="container1" height="auto">
                                                                            </div> 
                                                                            <div class="left-info-chart-text d-flex align-items-center col-2 p-0">                                          
                                                                              <div class="big-title-text fw-semibold w-90 ">Try the New</div>
                                                                          </div>
                                                                          </div>          
                                                                        </div>
                                    
                                                                        <div class="chart_row_colum mt-3">              
                                                                          <div class="row__column_bg top-img-1 row modified-report-img-1 d-flex justify-content-center align-items-center gap-3">
                                                                            <div class="left-info-chart-text d-flex align-items-center col-2 ps-0 pe-0 justify-content-end">
                                                                              <div class="big-title-text fw-semibold w-90 text-end">Preference for Observable</div>
                                                                            </div>
                                                                            <div class="management col-7">                                         
                                                                              <img src="<?php echo $contaner11ImageCareerPath; ?>" class="w-100" alt="container1" height="auto">
                                                                            </div> 
                                                                            <div class="left-info-chart-text d-flex align-items-center col-2 p-0">                                          
                                                                              <div class="big-title-text fw-semibold w-90">Preference for Concept</div>
                                                                          </div>
                                                                          </div>          
                                                                        </div>
                                    
                                                                        <div class="chart_row_colum mt-3">              
                                                                          <div class="row__column_bg top-img-1 row modified-report-img-1 d-flex justify-content-center align-items-center gap-3 gap-3">
                                                                            <div class="left-info-chart-text d-flex align-items-center col-2 ps-0 pe-0 justify-content-end">
                                                                              <div class="big-title-text fw-semibold w-90 text-end">Oriented to Principles</div>
                                                                            </div>
                                                                            <div class="management col-7">                                         
                                                                              <img src="<?php echo $contaner12ImageCareerPath; ?>" class="w-100" alt="container1" height="auto">
                                                                            </div> 
                                                                            <div class="left-info-chart-text d-flex align-items-center col-2 p-0">                                          
                                                                              <div class="big-title-text fw-semibold w-90">Oriented to the Possibilities</div>
                                                                          </div>
                                                                          </div>          
                                                                        </div>
                                    
                                    
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                </div>

                                                                <div class="type-element-info mt-5">
                                                                    <div class="elements-colum3-wrap">
                                                                        <div class="colum2 light_bg d-flex justify-content-space-between">
                                                                            <div class="w-50 text-center align-self-center">
                                                                                <h6 class="mb-0 p-3 text-black fw-bold">Elements of Sensing</h6>
                                                                            </div>
                                                                            <div class="w-50 text-center align-self-center">
                                                                                <h6 class="mb-0 p-3 text-black fw-bold">Elements of iNtuiting</h6>
                                                                            </div>
                                                                        </div>
                                                        
                                                                        <div class="colum3 d-flex justify-content-space-center align-items-stretch">
                                                                            <div class="fa-left col-5">
                                                                                <div class="felx_wrap d-flex align-items-center gap-3 p-3 h-100">
                                                                                    <h6  class="mb-0 text-black fw-bold fs-14 col-3 text-end">Drawn to Facts</h6>
                                                                                    <p class="mb-0 fs-14">a preference to focus attention on the
                                                                                        factual content of information that is
                                                                                        experienced. </p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="fa-center col-2">
                                                                                <h4> <i> Unclear Difference </i></h4>
                                                                            </div>
                                                                            <div class="fa-right col-5">
                                                                                <div class="felx_wrap d-flex align-items-center gap-3 p-3 h-100">
                                                                                    <h6 class="mb-0 text-black fw-bold fs-14  col-3 text-end">Drawn to Ideas</h6>
                                                                                    <p class="mb-0 fs-14">a preference to focus attention on the
                                                                                        ideas that are formed by the
                                                                                        information that is experienced.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                        
                                                                        <div class="colum3 d-flex justify-content-space-center align-items-stretch">
                                                                            <div class="fa-left col-5">
                                                                                <div class="felx_wrap d-flex align-items-center gap-3 p-3 h-100">
                                                                                    <h6 class="mb-0 text-black fw-bold fs-14 col-3 text-end">Choose the Standard</h6>
                                                                                    <p class="mb-0 fs-14">an attraction to proceed with the usual
                                                                                        and known methods or information
                                                                                        that have been proven.</p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="fa-center col-2">
                                                                                <h4> <i> Moderate Difference </i></h4>
                                                                            </div>
                                                                            <div class="fa-right col-5">
                                                                                <div class="felx_wrap d-flex align-items-center gap-3 p-3 h-100">
                                                                                    <h6 class="mb-0 text-black fw-bold fs-14 col-3 text-end">Try the New</h6>
                                                                                    <p class="mb-0 fs-14">an attraction to use different methods
                                                                                        or information that have not as yet
                                                                                        been proven.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                        
                                                                        <div class="colum3 d-flex justify-content-space-center align-items-stretch">
                                                                            <div class="fa-left col-5">
                                                                                <div class="felx_wrap d-flex align-items-center gap-3 p-3 h-100">
                                                                                    <h6 class="mb-0 text-black fw-bold fs-14 col-3 text-end">Preference for Observable</h6>
                                                                                    <p class="mb-0 fs-14">the perception oriented toward what is
                                                                                        concretely observed and known to
                                                                                        exist.</p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="fa-center col-2">
                                                                                <h4> <i> Strong Difference </i></h4>
                                                                            </div>
                                                                            <div class="fa-right col-5">
                                                                                <div class="felx_wrap d-flex align-items-center gap-3 p-3 h-100">
                                                                                    <h6 class="mb-0 text-black fw-bold fs-14 col-3 text-end">Preference for Concept</h6>
                                                                                    <p class="mb-0 fs-14">the perception oriented toward how
                                                                                        information fits together to form or
                                                                                        construct what is known.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                        
                                                                        <div class="colum3 d-flex justify-content-space-center align-items-stretch">
                                                                            <div class="fa-left col-5">
                                                                                <div class="felx_wrap d-flex align-items-center gap-3 p-3 h-100">
                                                                                    <h6 class="mb-0 text-black fw-bold fs-14 col-3 text-end">Oriented to Principles</h6>
                                                                                    <p class="mb-0 fs-14">the preference to embrace the
                                                                                        foundations of or reasons for the
                                                                                        existence of a piece of information or
                                                                                        what is perceived.</p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="fa-center col-2">
                                                                                <h4> <i> Strong Difference </i></h4>
                                                                            </div>
                                                                            <div class="fa-right col-5">
                                                                                <div class="felx_wrap d-flex align-items-center gap-3 p-3 h-100">
                                                                                    <h6 class="mb-0 text-black fw-bold fs-14 col-3 text-end">Oriented to the Possibilities</h6>
                                                                                    <p class="mb-0 fs-14">the preference to move perceptual
                                                                                        information to a constructed world of
                                                                                        what might possibly be.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                        
                                                                    </div>
                                                                </div>
                                                               

                                                               
                                                            </div>
                                                        </div>

                                                        <div class="row mt-5" id="deciding-making-judgments">
                                                            <div class="col-md-12 mt-3">
                                                                <h2 class="heading-inner-comman mb-5">Elements of Deciding or Making Judgments</h2>
                                                                <p>The graph below represents the results from your responses on the Core Factors Type Elements subscales from the type
                                                                    dimension of deciding or making judgments.
                                                                </p>
                                                                <div class="four-dichotomies-section mt-4 mb-3">
                                                                    <div
                                                                        class="d-flex justify-content-between four-dechotomies-header">
                                                                        <div
                                                                            class="four-dechotomies-title text-uppercase">
                                                                            THINKING</div>
                                                                        <div class="innder-four-dechotomies-title text-uppercase">
                                                                            DECIDING OR MAKING JUDGMENTS</div>
                                                                        <div
                                                                            class="four-dechotomies-title text-uppercase">
                                                                            FEELING</div>
                                                                    </div>

                                                                    <div
                                                                        class="d-flex justify-content-between four-dechotomies-innrer-info align-items-center p-3">
                                                                        <div
                                                                            class="four-dechotomies-inner text-uppercase">
                                                                            T</div>
                                                                        <div
                                                                            class="innder-four-dechotomies-text text-center">
                                                                            Deciding or making judgments is the mental process of forming decisions about the perceived information that is gathered. The two forms of judgment are Thinking and Feeling.</div>
                                                                        <div
                                                                            class="four-dechotomies-inner text-uppercase">
                                                                            F</div>
                                                                    </div>
                                                                </div>
                                                                <div class="row-colum">
                                                                    <div class="text-center p-2 title-bg-modified">Elements of Deciding or Making Judgment
                                                                    </div>
                                                                    <div class="overflow-x-auto">
                                                                    <div class="colum_box_wrap wight_bg colum_box_wrap_1 d-flex modified-report-global report-2-section justify-content-center">
                                                                      <div class="colum_chart type-element-chart type-element-full-chart element-chart-one">
                                                                        <div class="chart_row_colum">              
                                                                          <div class="row__column_bg row top-img-1 modified-report-img-1 d-flex justify-content-center align-items-center gap-3">
                                                                            <div class="left-info-chart-text d-flex align-items-end col-2 mt-4 ps-0 pe-0 justify-content-end">
                                                                              <div class="big-title-text fw-semibold w-90 text-end">Focus on Logic</div>                                                                             
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
                                                                              <img src="<?php echo $contaner13ImageCareerPath; ?>" class="w-100" alt="container1" height="auto">
                                                                            </div>                                           
                                                                            <div class="left-info-chart-text d-flex align-items-center col-2  mt-4 p-0">
                                                                              <div class="big-title-text w-90 fw-semibold">Focus on Logic Focus on Ideals
                                                                            </div>
                                                                          </div>
                                                                          </div>          
                                                                        </div>
                                    
                                                                        <div class="chart_row_colum mt-3">              
                                                                          <div class="row__column_bg top-img-1 row modified-report-img-1 d-flex justify-content-center align-items-center gap-3 gap-3">
                                                                            <div class="left-info-chart-text d-flex align-items-center col-2 ps-0 pe-0 justify-content-end">
                                                                              <div class="big-title-text fw-semibold w-90 text-end">Decisive Reasoning</div>                                                                             
                                                                            </div>
                                                                            <div class="management col-7">                                         
                                                                              <img src="<?php echo $contaner14ImageCareerPath; ?>" class="w-100" alt="container1" height="auto">
                                                                            </div> 
                                                                            <div class="left-info-chart-text d-flex align-items-center col-2 p-0">                                          
                                                                              <div class="big-title-text fw-semibold w-90 ">Supportive Decisions</div>
                                                                          </div>
                                                                          </div>          
                                                                        </div>
                                    
                                                                        <div class="chart_row_colum mt-3">              
                                                                          <div class="row__column_bg top-img-1 row modified-report-img-1 d-flex justify-content-center align-items-center gap-3 gap-3">
                                                                            <div class="left-info-chart-text d-flex align-items-center col-2 ps-0 pe-0 justify-content-end">
                                                                              <div class="big-title-text fw-semibold w-90 text-end">Criterion Based Choices</div>
                                                                            </div>
                                                                            <div class="management col-7">                                         
                                                                              <img src="<?php echo $contaner15ImageCareerPath; ?>" class="w-100" alt="container1" height="auto">
                                                                            </div> 
                                                                            <div class="left-info-chart-text d-flex align-items-center col-2 p-0">                                          
                                                                              <div class="big-title-text fw-semibold w-90">Values Based Choices</div>
                                                                          </div>
                                                                          </div>          
                                                                        </div>
                                    
                                                                        <div class="chart_row_colum mt-3">              
                                                                          <div class="row__column_bg top-img-1 row modified-report-img-1 d-flex justify-content-center align-items-center gap-3">
                                                                            <div class="left-info-chart-text d-flex align-items-center col-2 ps-0 pe-0 justify-content-end">
                                                                              <div class="big-title-text fw-semibold w-90 text-end">Outcome Focus</div>
                                                                            </div>
                                                                            <div class="management col-7">                                         
                                                                              <img src="<?php echo $contaner16ImageCareerPath; ?>" class="w-100" alt="container1" height="auto">
                                                                            </div> 
                                                                            <div class="left-info-chart-text d-flex align-items-center col-2 p-0">                                          
                                                                              <div class="big-title-text fw-semibold w-90">Process Focus</div>
                                                                          </div>
                                                                          </div>          
                                                                        </div>
                                    
                                    
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                </div>

                                                                <div class="type-element-info mt-5">
                                                                    <div class="elements-colum3-wrap">
                                                                        <div class="colum2 light_bg d-flex justify-content-space-between">
                                                                            <div class="w-50 text-center align-self-center">
                                                                                <h6 class="mb-0 p-3 text-black fw-bold">Elements of Thinking</h6>
                                                                            </div>
                                                                            <div class="w-50 text-center align-self-center">
                                                                                <h6 class="mb-0 p-3 text-black fw-bold">Elements of Feeling</h6>
                                                                            </div>
                                                                        </div>
                                                        
                                                                        <div class="colum3 d-flex justify-content-space-center align-items-stretch">
                                                                            <div class="fa-left col-5">
                                                                                <div class="felx_wrap d-flex align-items-center gap-3 p-3 h-100">
                                                                                    <h6  class="mb-0 text-black fw-bold fs-14 col-3 text-end">Focus on Logic</h6>
                                                                                    <p class="mb-0 fs-14">represents the preference for making
                                                                                        decisions based upon data that is
                                                                                        subjected to logical analysis to obtain
                                                                                        the best results.</p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="fa-center col-2">
                                                                                <h4> <i> Unclear Difference </i></h4>
                                                                            </div>
                                                                            <div class="fa-right col-5">
                                                                                <div class="felx_wrap d-flex align-items-center gap-3 p-3 h-100">
                                                                                    <h6 class="mb-0 text-black fw-bold fs-14  col-3 text-end">Focus on Ideals</h6>
                                                                                    <p class="mb-0 fs-14">is the preference for making decisions
                                                                                        founded upon believed principles and
                                                                                        ideals that are held in value.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                        
                                                                        <div class="colum3 d-flex justify-content-space-center align-items-stretch">
                                                                            <div class="fa-left col-5">
                                                                                <div class="felx_wrap d-flex align-items-center gap-3 p-3 h-100">
                                                                                    <h6 class="mb-0 text-black fw-bold fs-14 col-3 text-end">Decisive Reasoning</h6>
                                                                                    <p class="mb-0 fs-14">represents decisions arrived through
                                                                                        impartial observation of clearly
                                                                                        understood objectives.
                                                                                        </p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="fa-center col-2">
                                                                                <h4> <i> Moderate Difference </i></h4>
                                                                            </div>
                                                                            <div class="fa-right col-5">
                                                                                <div class="felx_wrap d-flex align-items-center gap-3 p-3 h-100">
                                                                                    <h6 class="mb-0 text-black fw-bold fs-14 col-3 text-end">Supportive Decisions</h6>
                                                                                    <p class="mb-0 fs-14">the preference for making judgments
                                                                                        to achieve objectives through
                                                                                        evaluating the impact they will have on
                                                                                        participating individuals’ performance.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                        
                                                                        <div class="colum3 d-flex justify-content-space-center align-items-stretch">
                                                                            <div class="fa-left col-5">
                                                                                <div class="felx_wrap d-flex align-items-center gap-3 p-3 h-100">
                                                                                    <h6 class="mb-0 text-black fw-bold fs-14 col-3 text-end">Criterion Based Choices</h6>
                                                                                    <p class="mb-0 fs-14">the preference for making decisions
                                                                                        and judgments founded on specific
                                                                                        criteria or standards that lead to the
                                                                                        prescribed outcomes.</p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="fa-center col-2">
                                                                                <h4> <i> Strong Difference </i></h4>
                                                                            </div>
                                                                            <div class="fa-right col-5">
                                                                                <div class="felx_wrap d-flex align-items-center gap-3 p-3 h-100">
                                                                                    <h6 class="mb-0 text-black fw-bold fs-14 col-3 text-end">Values Based Choices</h6>
                                                                                    <p class="mb-0 fs-14">indicates the preference for decisions
                                                                                        and judgments that have an anchor in
                                                                                        important personal beliefs.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                        
                                                                        <div class="colum3 d-flex justify-content-space-center align-items-stretch">
                                                                            <div class="fa-left col-5">
                                                                                <div class="felx_wrap d-flex align-items-center gap-3 p-3 h-100">
                                                                                    <h6 class="mb-0 text-black fw-bold fs-14 col-3 text-end">Outcome Focus</h6>
                                                                                    <p class="mb-0 fs-14">
                                                                                        Focus represents the form of decision-making
                                                                                        that keeps the desired goal as the
                                                                                        foundation for the judgments that are
                                                                                        made.</p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="fa-center col-2">
                                                                                <h4> <i> Strong Difference </i></h4>
                                                                            </div>
                                                                            <div class="fa-right col-5">
                                                                                <div class="felx_wrap d-flex align-items-center gap-3 p-3 h-100">
                                                                                    <h6 class="mb-0 text-black fw-bold fs-14 col-3 text-end">Process Focus</h6>
                                                                                    <p class="mb-0 fs-14">is the type of decision-making that
                                                                                        values the process employed in making
                                                                                        the judgments that serve to reach the
                                                                                        goals.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                        
                                                                    </div>
                                                                </div>
                                                               

                                                               
                                                            </div>
                                                        </div>

                                                        <div class="row mt-5" id="orientation-to-living">
                                                            <div class="col-md-12 mt-3">
                                                                <h2 class="heading-inner-comman mb-5">Elements of Orientation to Living</h2>
                                                                <p>The graph below represents the results from your responses on the Core Factors Type Elements subscales from the type
                                                                    dimension of orientation to living.</p>
                                                                <div class="four-dichotomies-section mt-4 mb-3">
                                                                    <div
                                                                        class="d-flex justify-content-between four-dechotomies-header">
                                                                        <div
                                                                            class="four-dechotomies-title text-uppercase">
                                                                            JUDGMENT</div>
                                                                        <div class="innder-four-dechotomies-title text-uppercase">
                                                                            METHOD FOR LIFE INTERACTION/ORIENTATION</div>
                                                                        <div
                                                                            class="four-dechotomies-title text-uppercase">
                                                                            PERCEPTION</div>
                                                                    </div>

                                                                    <div
                                                                        class="d-flex justify-content-between four-dechotomies-innrer-info align-items-center p-3">
                                                                        <div
                                                                            class="four-dechotomies-inner text-uppercase">
                                                                            j</div>
                                                                        <div
                                                                            class="innder-four-dechotomies-text text-center">
                                                                            Orientation to living is the mental process used or lifestyle favored for interaction with the outside world. The two methods of orientation correspond to the mental functions of Judgment and Perception.</div>
                                                                        <div
                                                                            class="four-dechotomies-inner text-uppercase">
                                                                            p</div>
                                                                    </div>
                                                                </div>
                                                                <div class="row-colum">
                                                                    <div class="text-center p-2 title-bg-modified">Elements of Orientation to Living
                                                                    </div>
                                                                    <div class="overflow-x-auto">
                                                                    <div class="colum_box_wrap wight_bg colum_box_wrap_1 d-flex modified-report-global report-2-section justify-content-center">
                                                                      <div class="colum_chart type-element-chart type-element-full-chart element-chart-one">
                                                                        <div class="chart_row_colum">              
                                                                          <div class="row__column_bg row top-img-1 modified-report-img-1 d-flex justify-content-center align-items-center gap-3">
                                                                            <div class="left-info-chart-text d-flex align-items-end col-2 mt-4 ps-0 pe-0 justify-content-end">
                                                                              <div class="big-title-text fw-semibold w-90 text-end">Produce by Organized Perception</div>                                                                             
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
                                                                              <img src="<?php echo $contaner17ImageCareerPath; ?>" class="w-100" alt="container1" height="auto">
                                                                            </div>                                           
                                                                            <div class="left-info-chart-text d-flex align-items-center col-2  mt-4 p-0">
                                                                              <div class="big-title-text w-90 fw-semibold">Produce by Emergent Methods
                                                                            </div>
                                                                          </div>
                                                                          </div>          
                                                                        </div>
                                    
                                                                        <div class="chart_row_colum mt-3">              
                                                                          <div class="row__column_bg top-img-1 row modified-report-img-1 d-flex justify-content-center align-items-center gap-3 gap-3">
                                                                            <div class="left-info-chart-text d-flex align-items-center col-2 ps-0 pe-0 justify-content-end">
                                                                              <div class="big-title-text fw-semibold w-90 text-end">Systematic Priorities</div>                                                                             
                                                                            </div>
                                                                            <div class="management col-7">                                         
                                                                              <img src="<?php echo $contaner18ImageCareerPath; ?>" class="w-100" alt="container1" height="auto">
                                                                            </div> 
                                                                            <div class="left-info-chart-text d-flex align-items-center col-2 p-0">                                          
                                                                              <div class="big-title-text fw-semibold w-90 ">Process Oriented Completion</div>
                                                                          </div>
                                                                          </div>          
                                                                        </div>
                                    
                                                                        <div class="chart_row_colum mt-3">              
                                                                          <div class="row__column_bg top-img-1 row modified-report-img-1 d-flex justify-content-center align-items-center gap-3 gap-3">
                                                                            <div class="left-info-chart-text d-flex align-items-center col-2 ps-0 pe-0 justify-content-end">
                                                                              <div class="big-title-text fw-semibold w-90 text-end">Scheduling for the Goal</div>
                                                                            </div>
                                                                            <div class="management col-7">                                         
                                                                              <img src="<?php echo $contaner19ImageCareerPath; ?>" class="w-100" alt="container1" height="auto">
                                                                            </div> 
                                                                            <div class="left-info-chart-text d-flex align-items-center col-2 p-0">                                          
                                                                              <div class="big-title-text fw-semibold w-90">Motivated by the Goal</div>
                                                                          </div>
                                                                          </div>          
                                                                        </div>
                                    
                                                                        <div class="chart_row_colum mt-3">              
                                                                          <div class="row__column_bg top-img-1 row modified-report-img-1 d-flex justify-content-center align-items-center gap-3">
                                                                            <div class="left-info-chart-text d-flex align-items-center col-2 ps-0 pe-0 justify-content-end">
                                                                              <div class="big-title-text fw-semibold w-90 text-end">Motivated by Structure</div>
                                                                            </div>
                                                                            <div class="management col-7">                                         
                                                                              <img src="<?php echo $contaner20ImageCareerPath; ?>" class="w-100" alt="container1" height="auto">
                                                                            </div> 
                                                                            <div class="left-info-chart-text d-flex align-items-center col-2 p-0">                                          
                                                                              <div class="big-title-text fw-semibold w-90">Motivated by Flexibility</div>
                                                                          </div>
                                                                          </div>          
                                                                        </div>
                                    
                                    
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                </div>

                                                                <div class="type-element-info mt-5 mb-5">
                                                                    <div class="elements-colum3-wrap">
                                                                        <div class="colum2 light_bg d-flex justify-content-space-between">
                                                                            <div class="w-50 text-center align-self-center">
                                                                                <h6 class="mb-0 p-3 text-black fw-bold">Elements of Judgment</h6>
                                                                            </div>
                                                                            <div class="w-50 text-center align-self-center">
                                                                                <h6 class="mb-0 p-3 text-black fw-bold">Elements of Perception</h6>
                                                                            </div>
                                                                        </div>
                                                        
                                                                        <div class="colum3 d-flex justify-content-space-center align-items-stretch">
                                                                            <div class="fa-left col-5">
                                                                                <div class="felx_wrap d-flex align-items-center gap-3 p-3 h-100">
                                                                                    <h6  class="mb-0 text-black fw-bold fs-14 col-3 text-end">Produce by Organized Perception</h6>
                                                                                    <p class="mb-0 fs-14">the preference to be productive in life
                                                                                        by making judgments intended to
                                                                                        organize activities before beginning.</p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="fa-center col-2">
                                                                                <h4> <i> Unclear Difference </i></h4>
                                                                            </div>
                                                                            <div class="fa-right col-5">
                                                                                <div class="felx_wrap d-flex align-items-center gap-3 p-3 h-100">
                                                                                    <h6 class="mb-0 text-black fw-bold fs-14  col-3 text-end">Produce by Emergent Methods</h6>
                                                                                    <p class="mb-0 fs-14">the preference to be productive in life
                                                                                        by beginning activities and developing
                                                                                        methodologies as important features
                                                                                        emerge.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                        
                                                                        <div class="colum3 d-flex justify-content-space-center align-items-stretch">
                                                                            <div class="fa-left col-5">
                                                                                <div class="felx_wrap d-flex align-items-center gap-3 p-3 h-100">
                                                                                    <h6 class="mb-0 text-black fw-bold fs-14 col-3 text-end">Systematic Priorities</h6>
                                                                                    <p class="mb-0 fs-14">the orientation to prioritize life in a way
                                                                                        that relies upon preparation and
                                                                                        advanced knowledge to assure
                                                                                        completion.
                                                                                        </p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="fa-center col-2">
                                                                                <h4> <i> Moderate Difference </i></h4>
                                                                            </div>
                                                                            <div class="fa-right col-5">
                                                                                <div class="felx_wrap d-flex align-items-center gap-3 p-3 h-100">
                                                                                    <h6 class="mb-0 text-black fw-bold fs-14 col-3 text-end">Process Oriented Completion</h6>
                                                                                    <p class="mb-0 fs-14">an orientation for life that places a
                                                                                        priority on experiencing the process
                                                                                        that leads to finishing the work.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                        
                                                                        <div class="colum3 d-flex justify-content-space-center align-items-stretch">
                                                                            <div class="fa-left col-5">
                                                                                <div class="felx_wrap d-flex align-items-center gap-3 p-3 h-100">
                                                                                    <h6 class="mb-0 text-black fw-bold fs-14 col-3 text-end">Scheduling for the Goal</h6>
                                                                                    <p class="mb-0 fs-14">the preference to work toward the goal
                                                                                        employing the comfort of timetables
                                                                                        and measured points.</p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="fa-center col-2">
                                                                                <h4> <i> Strong Difference </i></h4>
                                                                            </div>
                                                                            <div class="fa-right col-5">
                                                                                <div class="felx_wrap d-flex align-items-center gap-3 p-3 h-100">
                                                                                    <h6 class="mb-0 text-black fw-bold fs-14 col-3 text-end">Motivated by the Goal</h6>
                                                                                    <p class="mb-0 fs-14">the preferred method of achieving
                                                                                        goals by allowing the motivation of the
                                                                                        goal itself to drive the work.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                        
                                                                        <div class="colum3 d-flex justify-content-space-center align-items-stretch">
                                                                            <div class="fa-left col-5">
                                                                                <div class="felx_wrap d-flex align-items-center gap-3 p-3 h-100">
                                                                                    <h6 class="mb-0 text-black fw-bold fs-14 col-3 text-end">Motivated by Structure</h6>
                                                                                    <p class="mb-0 fs-14">
                                                                                        the inspiration of the judgments and
                                                                                        decisions that are needed to form the
                                                                                        structure in which work/ activities
                                                                                        occur.</p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="fa-center col-2">
                                                                                <h4> <i> Strong Difference </i></h4>
                                                                            </div>
                                                                            <div class="fa-right col-5">
                                                                                <div class="felx_wrap d-flex align-items-center gap-3 p-3 h-100">
                                                                                    <h6 class="mb-0 text-black fw-bold fs-14 col-3 text-end">Motivated by Flexibility</h6>
                                                                                    <p class="mb-0 fs-14">the preference for the enjoyment of
                                                                                        adapting to changes and the
                                                                                        unexpected in work tasks and life in
                                                                                        general.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                        
                                                                    </div>
                                                                </div>
                                                               

                                                               
                                                            </div>
                                                        </div>

                                                        <hr />

                                                        <div class="btn-info d-flex justify-content-center gap-3">
                                                            <a class=" btn-info-comman btn-previous"
                                                                onclick="showContentte('typetable');" href="javascript:void(0);">Previous</a>
                                                            <a class="btn-info-comman btn-next"
                                                                onclick="showContentte('typeformation');" href="javascript:void(0);">Next</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        
<?php
}
?>