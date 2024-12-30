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
$Integrator 	= 	$survey_score->Integrator;
$Involver 	= 	$survey_score->Involver;
$Mover 		= 	$survey_score->Mover;
$Mapper 	= 	$survey_score->Mapper;
$n = ['Integrator' => $survey_score->Integrator, 'Involver' => $survey_score->Involver, 'Mover' => $survey_score->Mover, 'Mapper' => $survey_score->Mapper];
arsort($n);
$top1 = array_slice($n, 0, 1);

foreach ($top1 as $key => $value) {
	$topVal = $key;
}
$contaner1ImageCareerPath = "https://pro.corefactors.com/pro/_library/ubold/assets/graph_img/surveyId_" . $surveyId . "_container1.png";
?>
<div class="tab-content tabs-vertical" id="social-result-content">
<div class="tab-pane fade show active" id="introduction" role="tabpanel" aria-labelledby="home-tab">
  <div class="tab-content py-4 px-4">                          
	<h1>Your Social Dynamics Assessment Results</h1>
	  <p class="pb-2 pt-1"><strong class="fs-6 fw-semibold">Your Results Indicated a Preference for: </strong></p>
	  <div class="Integrator position-relative d-flex align-items-center gap-4">
		<img src="{{ asset('img/icon-socail-result.png') }}" alt="Integrator">
		<h2 class="title_header_1 mb-0 bg-white">{{ $topVal }}</h2>                               
	  </div>
	<div class="row mt-2 mb-3">
	   <div class="col-12 mt-3">
		 <p><strong class="fs-6 fw-semibold text-black">Your Social Dynamics Assessment Scores</strong></p>
		 <div class="text-center">
			<img src="<?php echo $contaner1ImageCareerPath; ?>" width="687px" height="625px" class="mx-auto" alt="result">
		 </div>
	   </div>
   </div>
   <div class="row" id="verifying-your-results">
	  <div class="col-12">
		  <h4>Verifying Your Results</h4>
		  <p class="mt-2">As you explore the Social Dynamics styles, compare your self-ranking that you assigned to the snapshots on page 5.
		  </p>
		  <div class="border-snapshots-box fw-semibold text-center pt-5 pb-4 mt-5">
			Self-Ranked Style: ____________________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Assessment Results: ___________________
		  </div>
		  <div class="list mt-5 mb-4">
			  <ul class="list-disc">
				  <li>If your self-ranking and assessment results are the <strong>same</strong>, you can have a high degree of confidence that this style is
					your natural one.</li>
				  <li>If your self-ranking and assessment results are <strong>different</strong>, it is most likely the result of trying to sort out differences
					between your natural self, developed self, and situational self.</li>
			  </ul>
		  </div>
		  <div class="another-list">
			<p>To gain additional clarity about which Social Dynamics style represents your natural self: </p>
			<ul>
			  <li>Read through the comprehensive descriptions of the Social Dynamics styles that follow on pages 9 - 12. Pay
				particular attention to those of your self-ranking and assessment results. As you do so, use the worksheet on the
				next page to highlight words or phrases that fit you as, well as people you know.</li>
			  <li>Discuss any questions you have with your practitioner to clarify any questions you may have. Your practitioner will
				be able to help you to clarify your results.
				</li>
			</ul>
		  </div>

		  <div class="mt-5 mb-5">
			  <div class="text-black border-snapshots-box box-snapshot-bg">
				<p><i>A further note about the descriptions that follow:</i></p>
				<p class="mb-0">In addition to helping you determine which Style best describes your Natural Self, these descriptions will deepen your
				  overall understanding of all four styles. You will gain insights about how to best communicate with, collaborate with,
				  and resolve style-based differences with all four styles. So, you will want to return to these descriptions frequently as
				  you begin to incorporate an understanding and use of Social Dynamics in your professional and personal relationships.</p>
			  </div>
		  </div>
	  </div>
   </div>
   <div class="row" id="what-fits">
	  <div class="col-12">
		 <h4>What Fits?</h4>
		 <p class="mt-3">As you read through the descriptions of the four Social Dynamics Styles on the following four pages, you can use the worksheet
		  below to highlight words or phrases that fit you as well as people you know who fit that Styles.</p>
	  </div>
	  <div class="col-12 d-flex">
		<div class="left-info-snapshots w-50 border-snapshots-box border-end-0 border-bottom-0">
			<p class="text-center text-black"><strong>Mover</strong></p>
			<div class="text-left mt-4">
			  <p class="mb-5 pb-5 fw-semibold text-black">What fits me...</p>
			  <p class="mt-5 mb-5 pb-5 fw-semibold text-black">People I know...</p>
			</div>
		</div>
		<div class="right-info-snapshots w-50 border-snapshots-box border-bottom-0">
		  <p class="text-center text-black"><strong>Involver</strong></p>
		  <div class="text-left mt-4">
			<p class="mb-5 pb-5 fw-semibold text-black">What fits me...</p>
			<p class="mt-5 mb-5 pb-5 fw-semibold text-black">People I know...</p>
		  </div>
	  </div>
	 </div>
	 <div class="col-12 d-flex mb-5">
	  <div class="left-info-snapshots w-50 border-snapshots-box border-end-0">
		  <p class="text-center text-black"><strong>Mapper</strong></p>
		  <div class="text-left mt-4">
			<p class="mb-5 pb-5 fw-semibold text-black">What fits me...</p>
			<p class="mt-5 mb-5 pb-5 fw-semibold text-black">People I know...</p>
		  </div>
	  </div>
	  <div class="right-info-snapshots w-50 border-snapshots-box">
		<p class="text-center text-black "><strong>Integrator</strong></p>
		<div class="text-left mt-4">
		  <p class="mb-5 pb-5 fw-semibold text-black">What fits me...</p>
		  <p class="mt-5 mb-5 pb-5 fw-semibold text-black">People I know...</p>
		</div>
	</div>
   </div>
   </div>
	<hr/>

	<div class="btn-info d-flex justify-content-center gap-3">
		<a class=" btn-info-comman btn-previous" onclick="showContentsd('snapshotsfourstyles');" href="javascript:void(0);">Previous</a>
		<a class="btn-info-comman btn-next" onclick="showContentsd('socialdynamicsmover');" href="javascript:void(0);">Next</a>
	</div>
  </div>
</div>  
<?php } ?>