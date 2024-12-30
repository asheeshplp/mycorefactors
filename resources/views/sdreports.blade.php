<?php
use Illuminate\Support\Facades\Auth;
$user = Auth::user();
$firstName = ucwords($user->first_name);
$lastName = ucwords($user->last_name);
$pdfPath = "";

// echo '<pre>'; print_r($enteriesArr); die;
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Social Dynamics') }}
        </h2>
    </x-slot>
	<?php 
	if($resultsArr) { 
		
	?>
	 <main class="col-md-12 ms-sm-auto col-lg-12 pb-5" id="main-wrapper">
          <div class="container-fluid px-3">
            <div class="note-container-accessment justify-content-center">
              <img src="{{ asset('img/icon-socialdynamics.png') }}" width="58px" height="auto" />
              <h1 class="mb-0 text-white">Social Dynamics</h1>
            </div>
          </div>

          <div class="container-fluid px-3 mt-3">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-bg-gray">
                  <div class="card-body">
                    <div class="btn-info d-flex gap-3">
                        <a href="{{ url('socialdynamics') }}" id="careerpath" class="active btn-info-comman uppertab">My Report</a>
                        <a href="javascript:void(0);" class="btn-info-comman">Explore EQ</a>
                        <a href="javascript:void(0);" class="btn-info-comman">Watch Videos</a>
                        <a href="javascript:void(0);" class="btn-info-comman">External Resources</a>
                        <a href="{{ $resultsArr['firstPdfpath']; }}" id="downloadbtn" target="_blank" class="btn-info-comman btn-next float-end ms-auto">Download PDF Report</a>
                    </div>
                    <div class="mt-4 mb-4">
                      <div class="title-comman">
                        <div class="dropdown postion-relative d-flex gap-1">
                          Report Date:
                          <button class="btn boder-0 btn-link text-decoration-none dropdown-toggle title-comman p-0" type="button" id="reportDateDropdown" data-bs-toggle="dropdown" aria-expanded="false">{{ $resultsArr['firstDate']; }}</button>
                          <ul class="dropdown-menu reportdatedroplist" aria-labelledby="reportDateDropdown">
							<?php foreach($resultsArr['records'] as $rec) { ?>
                            <li><a class="dropdown-item dateselection" id="<?php echo $rec['id']; ?>" href="javascript:void(0);">{{ $rec['completedDate']; }}</a></li>
                            <?php } ?>
                          </ul>
                        </div>
                      </div>
                    </div>


                  <div class="row">
                    <!-- Vertical Nav Tabs -->
                    <div class="col-md-3">
					<div class="fixed-side-menu">
						<ul class="nav nav-tabs flex-column tabs-vertical" id="myTab" role="tablist">                       
                        <li class="nav-item menu-btn" id="introductionsd" role="presentation">
                          <a class="nav-link border-0 active" id="social-dynamics-navigator" href="javascript:void(0);">Your Social Dynamics Style Navigator Report</a>
                        </li>
                        <li class="nav-item menu-btn" id="socialdynamicsstyles" role="presentation">
                          <a class="nav-link border-0" id="social-dynamics-styles" href="javascript:void(0);">The Four Social Dynamics Styles</a>
                        </li>
						<li class="nav-item dropdown menu-btn" id="understandyourselves">
                            <a class="nav-link dropdown-toggle active justify-content-between" href="javascript:void(0);" id="understandYourSelvesTab">
                                Understanding Your Three "Selves" 
                                <span class="material-icons" onclick="toggleDropdown(event)">expand_more</span>
                            </a>
                            <ul class="dropdown-menu show" aria-labelledby="understandYourSelvesTab">
                              <li>
                                  <a class="dropdown-item" onclick="scrollToContent('#natural-self', '#understandYourSelvesTab', '#understandYourSelvesTabContent')">Your Natural Self</a>
                              </li>
                              <li>
                                  <a class="dropdown-item" onclick="scrollToContent('#developed-self', '#understandYourSelvesTab', '#understandYourSelvesTabContent')">Your Developed Self</a>
                              </li>
                              <li>
                                <a class="dropdown-item" onclick="scrollToContent('#situational-self', '#understandYourSelvesTab', '#understandYourSelvesTabContent')">Your Situational Self</a>
                            </li>
                          </ul>
                        </li>
						
                        
                        <li class="nav-item menu-btn" id="naturalsocialdynamics" role="presentation">
                          <a class="nav-link border-0" id="social-dynamics" href="javascript:void(0);">Discovering Your Natural Social Dynamics Style</a>
                        </li>
						
                        <li class="nav-item menu-btn" id="snapshotsfourstyles" role="presentation">
                          <a class="nav-link border-0" id="social-dynamics" href="javascript:void(0);">Snapshots of the Four Social Dynamics Styles</a>
                        </li>
						
                       <li class="nav-item menu-btn dropdown" id="yourAssessmentresults">
                        <a class="nav-link dropdown-toggle d-flex justify-content-between active" href="javascript:void(0);" id="yourAssessmentResultsTab">Your Social Dynamics Assessment Results
                            <span class="material-icons" onclick="toggleDropdown(event)">expand_more</span>
                          </a>
                          <ul class="dropdown-menu show" aria-labelledby="yourAssessmentResultsTab">
                              <li>
                                  <a class="dropdown-item" onclick="scrollToContent('#verifying-your-results', '#yourAssessmentResultsTab', '#social-result-content')">Verifying Your Results</a>
                              </li>
                              <li>
                                  <a class="dropdown-item" onclick="scrollToContent('#what-fits', '#yourAssessmentResultsTab', '#social-result-content')">What Fits?</a>
                              </li>
                          </ul>
                      </li>
					  
                      <li class="nav-item menu-btn" role="presentation" id="socialdynamicsmover">
                        <a class="nav-link border-0" id="social-dynamics-mover" href="mover.html">Mover</a>
                      </li>
					  
                      <li class="nav-item" role="presentation">
                        <a class="nav-link border-0" id="social-dynamics-mapper" href="mapper.html">Mapper</a>
                      </li>
					  
                      <li class="nav-item" role="presentation">
                        <a class="nav-link border-0" id="social-dynamics-involver" href="involver.html">Involver</a>
                      </li>
                      <li class="nav-item" role="presentation">
                        <a class="nav-link border-0" id="social-dynamics-integrator" href="integrator.html">Integrator</a>
                      </li>
                      <li class="nav-item" role="presentation">
                        <a class="nav-link border-0" id="social-dynamics-things" href="things-common.html">Things in Common</a>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex justify-content-between" href="prompting-other-act.html"
                          id="promptingOthersToAct">Prompting Others to Act  <span class="material-icons" onclick="toggleDropdown(event)">expand_more</span></a>
                        <ul class="dropdown-menu" aria-labelledby="promptingOthersToAct">
                          <li>
                            <a class="dropdown-item"
                              onclick="scrollToContent('#prescribing-and-describing-prompting', '#promptingOthersToAct', '#prampting-result-content')">Prescribing and Describing</a>
                          </li>
                          <li>
                            <a class="dropdown-item"
                              onclick="scrollToContent('#contrasting-the-two-means-prompting', '#promptingOthersToAct', '#prampting-result-content')">Contrasting the Two Means of Prompting</a>
                          </li>
                        </ul>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex justify-content-between" href="focus-attention-interaction.html"
                          id="focal-attention">Focus of Attention in an Interaction  <span class="material-icons" onclick="toggleDropdown(event)">expand_more</span></a>
                        <ul class="dropdown-menu" aria-labelledby="focal-attention">
                          <li>
                            <a class="dropdown-item"
                              onclick="scrollToContent('#what-yourself-doing', '#focal-attention', '#prampting-result-content')">What did you see yourself doing during the five minutes before the meeting began?</a>
                          </li>
                          <li>
                            <a class="dropdown-item"
                              onclick="scrollToContent('#how-yourself-processing', '#focal-attention', '#prampting-result-content')">How did you see yourself processing the ideas that were being suggested during the
                              meeting?</a>
                          </li>
                          <li>
                            <a class="dropdown-item"
                              onclick="scrollToContent('#contrasting-focuses', '#focal-attention', '#prampting-result-content')">Contrasting the Two Focuses of Attention in an Interaction
                            </a>
                          </li>
                        </ul>
                      </li>

                      <li class="nav-item" role="presentation">
                      <a class="nav-link border-0" id="social-dynamics-things"
                        href="summariz-common.html">Summarizing the Things In Common</a>
                    </li>

                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle d-flex justify-content-between" href="applications-social-dynamics.html"
                        id="application-social-dynamic">Applications of Social Dynamics at Work
                        <span class="material-icons" onclick="toggleDropdown(event)">expand_more</span></a>
                      <ul class="dropdown-menu" aria-labelledby="application-social-dynamic">
                        <li>
                          <a class="dropdown-item"
                            onclick="scrollToContent('#enhanced-collaboration', '#application-social-dynamic', '#application-result-content')">Enhanced
                            Collaboration and Teamwork
                          </a>
                        </li>
                        <li>
                          <a class="dropdown-item"
                            onclick="scrollToContent('#more-productive-conflict', '#application-social-dynamic', '#application-result-content')">More
                            Productive Conflict</a>
                        </li>
                        <li>
                          <a class="dropdown-item"
                            onclick="scrollToContent('#better-decision-making', '#application-social-dynamic', '#application-result-content')">Better
                            Decision Making
                          </a>
                        </li>
                        <li>
                          <a class="dropdown-item"
                            onclick="scrollToContent('#more-effective-leadership', '#application-social-dynamic', '#application-result-content')">More
                            Effective Leadership
                          </a>
                        </li>
                        <li>
                          <a class="dropdown-item"
                            onclick="scrollToContent('#managing-stress', '#application-social-dynamic', '#application-result-content')">Managing
                            Stress
                          </a>
                        </li>
                      </ul>
                    </li>
                      </ul>
					  
                      
                    </div>
                    </div>
                  
                    <!-- Tab Content -->
                    <div class="col-md-9">
						<div class="loader"></div>
						<div class="tab-content tabs-vertical" id="myTabContent">						
						
						</div>
                    </div>
                  </div>
                  
                  </div>
                </div>
              </div>
            </div>
          </div>
        
	<?php } ?>
   
<input type="hidden" id="pagename" value="sdreportpage" />

<form id="eqform" name="">
	<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
	<input type="hidden" name="selecteddate" id="selecteddate" value="{{ $resultsArr['firstDate']; }}" />
	<input type="hidden" name="reportid" id="reportid" value="{{ $resultsArr['firstSurveyid']; }}" />
	<input type="hidden" name="selectedtab" id="selectedtab" value="" />
</form>

</x-app-layout>

