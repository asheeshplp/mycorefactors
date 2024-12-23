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
            {{ __('EQ Accelerator') }}
        </h2>
    </x-slot>
	<?php 
	if($resultsArr) { 
		
	?>
	 <main class="col-md-12 ms-sm-auto col-lg-12 pb-5" id="main-wrapper">
          <div class="container-fluid px-3">
            <div class="note-container-accessment justify-content-center">
              <img src="{{ asset('img/eq-logo.svg') }}" width="58px" height="auto" />
              <h1 class="mb-0 text-white">EQ Accelerator</h1>
            </div>
          </div>

          <div class="container-fluid px-3 mt-3">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-bg-gray">
                  <div class="card-body">
                    <div class="btn-info d-flex gap-3">
                        <a href="{{ url('myeqreport') }}" id="myreport" class="active btn-info-comman uppertab">My Report</a>
                        <a href="{{ url('exploreeq') }}" id="exploreeq" class="btn-info-comman uppertab">Explore EQ</a>
                        <a href="{{ url('watchvideoseq') }}" id="watchvideos" class="btn-info-comman uppertab">Watch Videos</a>
                        <a href="{{ url('externalresourceseq') }}" id="externalresources" class="btn-info-comman uppertab">External Resources</a>
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
                        <li class="nav-item menu-btn active" id="introduction" role="presentation">
                          <a class="nav-link border-0" href="javascript:void(0);">Introduction</a>
                        </li>
                        <li class="nav-item menu-btn dropdown" id="understanding-self-report">
                          <a class="nav-link dropdown-toggle" id="equnderstandingTab" href="javascript:void(0);" role="tab" data-bs-toggle="tab" aria-expanded="false" aria-controls="understanding-tab">Understanding Self-Report</a>
						  <ul class="dropdown-menu hide" aria-labelledby="equnderstandingTab">
                              <li>
                                  <a class="dropdown-item" onclick="scrollToContent('#effectivenessTab', '#equnderstandingTab', '#eq-understanding-content')">Effectiveness</a>
                              </li>
                              <li>
                                  <a class="dropdown-item" onclick="scrollToContent('#importanceTab', '#equnderstandingTab', '#eq-understanding-content')">Importance</a>
                              </li>
                          </ul>
                        </li>
                        <li class="nav-item menu-btn dropdown" id="eqskills">
                          <a class="nav-link dropdown-toggle" href="javascript:void(0);" id="eqSkillsTab" role="tab" data-bs-toggle="tab" aria-expanded="false" aria-controls="eq-skills-content">EQ Skills</a>
                          <ul class="dropdown-menu hide" aria-labelledby="eqSkillsTab">
                              <li>
                                  <a class="dropdown-item" onclick="scrollToContent('#overall-picture', '#eqSkillsTab', '#eq-skills-content')">An Overall Picture</a>
                              </li>
                              <li>
                                  <a class="dropdown-item" onclick="scrollToContent('#skills-each-dimension', '#eqSkillsTab', '#eq-skills-content')">Skills in Each Dimension</a>
                              </li>
                          </ul>
                      </li>
                      <li class="nav-item menu-btn" id="interpretingtab" role="presentation">
						<a class="nav-link dropdown-toggle" href="javascript:void(0);" id="interpretingTab">Interpreting Your Report</a>
                        <ul class="dropdown-menu" aria-labelledby="interpretingTab">
                            <li>
                                <a class="dropdown-item" onclick="scrollToContent('#domain-scores', '#interpretingTab', '#eq-interpreting-content')">Domain Scores</a>
                            </li>
                            <li>
                                <a class="dropdown-item" onclick="scrollToContent('#effectiveness-scores', '#interpretingTab', '#eq-interpreting-content')">Effectiveness Scores </a>
                            </li>
                            <li>
                              <a class="dropdown-item" onclick="scrollToContent('#importance-scores', '#interpretingTab', '#eq-interpreting-content')">Importance Scores</a>
                          </li>
                          <li>
                            <a class="dropdown-item" onclick="scrollToContent('#gap-scores', '#interpretingTab', '#eq-interpreting-content')">Gap Scores </a>
                        </li>
                        </ul>
                      </li>
                        <li class="nav-item menu-btn" id="your-report-result" role="presentation">
                          <a href="your-report-result" class="nav-link border-0 " id="reported-results-tab">Your Reported Results</a>
                        </li>
						
                        <li class="nav-item menu-btn dropdown" id="eqdimensioncompetencies" role="presentation">
                          <a class="nav-link dropdown-toggle" href="javascript:void(0);" id="selfAwarenessTab">Specific EQ Dimension Competencies and Ratings</a>
                          <ul class="dropdown-menu" aria-labelledby="selfAwarenessTab">
                              <li>
                                <a class="dropdown-item" onclick="scrollToContent('#SelfAwarenessPerceptions', '#selfAwarenessTab', '#self-awareness')">Self-Awareness Perceptions</a>
                            </li>
                            <li>
                                <a class="dropdown-item" onclick="scrollToContent('#SelfRegulation', '#selfAwarenessTab', '#self-awareness')">Self-Regulation</a>
                            </li>
                            <li>
                                <a class="dropdown-item" onclick="scrollToContent('#OtherAwarenessPerceptions', '#selfAwarenessTab', '#self-awareness')">Other Awareness Perceptions</a>
                            </li>
                            <li>
                                <a class="dropdown-item" onclick="scrollToContent('#OtherEngagementRelating', '#selfAwarenessTab', '#self-awareness')">Other Engagement in Relating Well</a>
                            </li>
                          </ul>
                      </li>
                      
                      
                       <li class="nav-item menu-btn dropdown" id="actiontips" role="presentation">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0);" id="selfEffectivenessTab">Action Tips to Improve EQ Effectiveness</a>
                           <ul class="dropdown-menu hide" aria-labelledby="actionTipsTab">
						  <li>
                                      <a class="dropdown-item" onclick="scrollToContent('#self-actualization', '#selfEffectivenessTab', '#self-effectiveness')">Self-Awareness Perceptions</a>
                                  </li>
                                  <li>
                                      <a class="dropdown-item" onclick="scrollToContent('#optimism', '#selfEffectivenessTab', '#self-effectiveness')">Self-Regulation</a>
                                  </li>
                                  <li>
                                      <a class="dropdown-item" onclick="scrollToContent('#reading-nonverbal', '#selfEffectivenessTab', '#self-effectiveness')">Other Awareness Perceptions</a>
                                  </li>
                                  <li>
                                      <a class="dropdown-item" onclick="scrollToContent('#reading-nonverbal-engagement', '#selfEffectivenessTab', '#self-effectiveness')">Other Engagement in Relating Well</a>
                                  </li>
					  </ul>
                    </li>
                        <li class="nav-item menu-btn" id="references" role="presentation">
                          <a href="javascript:void(0);" class="nav-link border-0">References</a>
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
   
<input type="hidden" id="pagename" value="eqreportpage" />

<form id="eqform" name="">
	<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
	<input type="hidden" name="selecteddate" id="selecteddate" value="{{ $resultsArr['firstDate']; }}" />
	<input type="hidden" name="reportid" id="reportid" value="{{ $resultsArr['firstSurveyid']; }}" />
	<input type="hidden" name="selectedtab" id="selectedtab" value="" />
</form>

</x-app-layout>

