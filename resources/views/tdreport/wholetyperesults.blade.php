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

?>
<div class="tab-content tabs-vertical" id="whole-type-resultsTabContent">
                        <div class="tab-pane fade show active" id="introduction" role="tabpanel" aria-labelledby="home-tab">
                          <div class="tab-content py-4 px-4">                            
                            <h3>The <span id="reporttype"><?php echo $report_type; ?></span> Personality Type</h3>
                            <div class="row">                             
                              <div class="col-md-12 personality_type mt-5">
                                <div class="enfp_layer position-relative d-flex justify-content-between gap-4">
                                  <span class="trap uppercase">SNAPSHOT</span>
								  <?php 
									$imgPath = 'https://pro.corefactors.com/pro/_library/img/reporticons/'.$report_image; 					
									?>
                                  <div class="img">
                                    <img src="<?php echo $imgPath; ?>" alt="">
                                  </div>
                                  <div class="content_info mt-3">
                                    <p class="m-0-important"><?= $snapshot; ?></p>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-12 personality_type mt-4" id="leadership-methods">
                               <h2 class="heading-inner-comman">{{ $report_type; }} Leadership Methods</h2>                               
                               <p><?= $leadership_methods; ?></p>
                              </div>

                              <div class="col-md-12 personality_type mt-4" id="learning-preference">
                                <h2 class="heading-inner-comman">{{ $report_type; }} Learning Preference</h2>                               
                                <p><?= $learning_preference; ?></p>
                               </div>

                               <div class="col-md-12 personality_type mt-4" id="work-and-activity">
                                <h2 class="heading-inner-comman">{{ $report_type; }} Work and Activity Preferences</h2>                               
                                <p><?= $work_and_activity_preferences; ?>
                                  </p>
                               </div>
                            </div>
                            <hr/>
                            <div class="btn-info d-flex justify-content-center gap-3">
                                <a class=" btn-info-comman btn-previous" onclick="showContenttd('typedimensionresults');" href="javascript:void(0);">Previous</a>
                                <a class="btn-info-comman btn-next" onclick="showContenttd('typetable');" href="javascript:void(0);">Next</a>
                            </div>
                          </div>
                        </div>                        
                      </div>