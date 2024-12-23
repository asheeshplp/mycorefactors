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
            {{ __('Career Path') }}
        </h2>
    </x-slot>
	<?php 
	if($resultsArr) { 
		
	?>
	 <main class="col-md-12 ms-sm-auto col-lg-12 pb-5" id="main-wrapper">
          <div class="container-fluid px-3">
            <div class="note-container-accessment justify-content-center">
              <img src="{{ asset('img/icon-careerpath.png') }}" width="58px" height="auto" />
              <h1 class="mb-0 text-white">Career Path</h1>
            </div>
          </div>

          <div class="container-fluid px-3 mt-3">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-bg-gray">
                  <div class="card-body">
                    <div class="btn-info d-flex gap-3">
                        <a href="{{ url('careerpath') }}" id="careerpath" class="active btn-info-comman uppertab">My Report</a>
                        <a href="{{ url('careerexplorer') }}" id="careerexplorer" class="btn-info-comman uppertab">Career Explorer</a>                        
                        <a href="{{ url('externalresourcescp') }}" id="externalresourcescp" class="btn-info-comman uppertab">External Resources</a>
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
                        <li class="nav-item menu-btn" id="introductioncp" role="presentation">
                          <a class="nav-link active border-0" href="javascript:void(0);">Introduction</a>
                        </li>
                        <li class="nav-item menu-btn" id="careerbasics" ="presentation">
                          <a class="nav-link border-0" id="understanding-tab" href="javascript:void(0);">Career Basics</a>
                        </li>
                        <li class="nav-item menu-btn dropdown" id="careeroccupation" >
                          <a class="nav-link dropdown-toggle d-flex justify-content-between" href="javascript:void(0);" id="careerOccupation"> Occupational Activity Groupings (OAG)
                            <span class="material-icons" onclick="toggleDropdown(event)">expand_more</span>
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="careerOccupation">
                              <li>
                                  <a class="dropdown-item" onclick="scrollToContent('#business-management', '#careerOccupation', '#occupationalActivityContent')">Business/Management</a>
                              </li>                              
                              <li>
                                <a class="dropdown-item" onclick="scrollToContent('#business-financial', '#careerOccupation', '#occupationalActivityContent')">Business/Financial</a>
                              </li>
                             <li>
                                <a class="dropdown-item" onclick="scrollToContent('#digital-data', '#careerOccupation', '#occupationalActivityContent')">Digital Data</a>
                              </li>
                             <li>
                               <a class="dropdown-item" onclick="scrollToContent('#mechanical', '#careerOccupation', '#occupationalActivityContent')">Mechanical</a>
                             </li>
                            <li>
                                <a class="dropdown-item" onclick="scrollToContent('#scientific', '#careerOccupation', '#occupationalActivityContent')">Scientific</a>
                             </li>
                            <li>
                              <a class="dropdown-item" onclick="scrollToContent('#artistic', '#careerOccupation', '#occupationalActivityContent')">Artistic</a>
                            </li>
                            <li>
                              <a class="dropdown-item" onclick="scrollToContent('#social-group', '#careerOccupation', '#occupationalActivityContent')">Social/Group Involvement</a>
                             </li>
                            <li>
                              <a class="dropdown-item" onclick="scrollToContent('#home-nature', '#careerOccupation', '#occupationalActivityContent')">Home and Nature</a>
                            </li>
                            <li>
                              <a class="dropdown-item" onclick="scrollToContent('#individual-personal', '#careerOccupation', '#occupationalActivityContent')">Individual/Personal Service</a>
                            </li>
                            <li>
                                <a class="dropdown-item" onclick="scrollToContent('#governmental-service', '#careerOccupation', '#occupationalActivityContent')">Governmental Service</a>
                            </li>
                            <li>
                              <a class="dropdown-item" onclick="scrollToContent('#health-medical', '#careerOccupation', '#occupationalActivityContent')">Health and Medical</a>
                            </li>
                          </ul>
                        </li>
                        <li class="nav-item menu-btn dropdown" id="eqskillstab">
                          <a class="nav-link dropdown-toggle d-flex justify-content-between" href="javascript:void(0);" id="eqSkillsTab"> Your Occupational Activity Groupings (OAG) Profile  <span class="material-icons" onclick="toggleDropdown(event)">expand_more</span></a>
                          <ul class="dropdown-menu" aria-labelledby="eqSkillsTab">
                              <li>
                                  <a class="dropdown-item" onclick="scrollToContent('#interpreting-oag-profile', '#eqSkillsTab', '#eq-skills-content')">Interpreting Your OAG Profile</a>
                              </li>
                              <li>
                                <a class="dropdown-item" onclick="scrollToContent('#area-by-area', '#eqSkillsTab', '#eq-skills-content')">Area-by-Area Evaluation</a>
                            </li>
                            <li>
                                <a class="dropdown-item" onclick="scrollToContent('#understanding-your-prefer', '#eqSkillsTab', '#eq-skills-content')">Understanding your Prefer and Avoid Pattern</a>
                            </li>
                            <li>
                              <a class="dropdown-item" onclick="scrollToContent('#preferred-tasks', '#eqSkillsTab', '#eq-skills-content')">Preferred Tasks, Activities and their Environments (Prefer OAGs)</a>
                          </li>
                          <li>
                              <a class="dropdown-item" onclick="scrollToContent('#avoided-tasks', '#eqSkillsTab', '#eq-skills-content')">Avoided Tasks, Activities and their Environments (Avoid OAGs)</a>
                          </li>
                          </ul>
                      </li>
                        <li class="nav-item menu-btn" id="gia-tab" role="presentation">
                          <a class="nav-link border-0" id="interpreting-tab" href="javascript:void(0);">Global Interest Areas (GIA)</a>
                        </li>
                       
					   <li class="nav-item menu-btn dropdown" id="globalinterestarea">
                            <a class="nav-link dropdown-toggle active d-flex justify-content-between" href="javascript:void(0);" id="globalInterestArea">Your Global Interest Areas (GIA) Profile  <span class="material-icons" onclick="toggleDropdown(event)">expand_more</span></a>
                          <ul class="dropdown-menu show" aria-labelledby="globalInterestArea">
                              <li>
                                  <a class="dropdown-item" onclick="scrollToContent('#gia-result-career', '#globalInterestArea', '#globalInterestAreaContent')">GIA Results to Assist in Career Decisions</a>
                              </li>
                              <li>
                                <a class="dropdown-item" onclick="scrollToContent('#globalInterest-area', '#globalInterestArea', '#globalInterestAreaContent')">GIA Results to Assist in Career Decisions</a>
                            </li>
                          </ul>
                      </li>
                      
                      
                    <li class="nav-item menu-btn dropdown" id="careerexploration">
                        <a class="nav-link dropdown-toggle active d-flex justify-content-between" href="javascript:void(0);" id="careerExploration">Career Exploration  <span class="material-icons" onclick="toggleDropdown(event)">expand_more</span></a>
                          <ul class="dropdown-menu show" aria-labelledby="careerExploration">
                              <li>
                                  <a class="dropdown-item" onclick="scrollToContent('#process-end', '#careerExploration', '#careerExplorationContent')">The Process Never Ends</a>
                              </li>
                          </ul>
                      </li>

                        <li class="nav-item menu-btn" role="presentation" id="occupationalcodes">
                            <a href="javascript:void(0);" class="nav-link border-0" id="references-tab">Occupational Code Appendix</a>
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
   
<input type="hidden" id="pagename" value="cpreportpage" />

<form id="eqform" name="">
	<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
	<input type="hidden" name="selecteddate" id="selecteddate" value="{{ $resultsArr['firstDate']; }}" />
	<input type="hidden" name="reportid" id="reportid" value="{{ $resultsArr['firstSurveyid']; }}" />
	<input type="hidden" name="selectedtab" id="selectedtab" value="" />
</form>

</x-app-layout>

