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
            {{ __('Type Discovery') }}
        </h2>
    </x-slot>
	<?php 
	if($resultsArr) { 
		
	?>
	 <main class="col-md-12 ms-sm-auto col-lg-12 pb-5" id="main-wrapper">
          <div class="container-fluid px-3">
            <div class="note-container-accessment justify-content-center">
              <img src="{{ asset('img/icon-typediscovery.png') }}" width="58px" height="auto" />
              <h1 class="mb-0 text-white">Type Discovery</h1>
            </div>
          </div>

          <div class="container-fluid px-3 mt-3">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-bg-gray">
                  <div class="card-body">
                    <div class="btn-info d-flex gap-3">
                        <a href="{{ url('typediscovery') }}" id="typediscovery" class="active btn-info-comman uppertab">My Report</a>
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
                        <li class="nav-item menu-btn" id="introductiontd" role="presentation">
                          <a class="nav-link border-0 active" id="social-dynamics-navigator" href="javascript:void(0);">Introduction</a>
                        </li>      
						
                        <li class="nav-item dropdown menu-btn" id="fourdichotomies">
                           <a class="nav-link dropdown-toggle d-flex justify-content-between" href="javascript:void(0);" id="four-dichotomies">
                            The Four Dichotomies 
                              <span class="material-icons" onclick="toggleDropdown(event)">expand_more</span>
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="four-dichotomies">
                            <li>
                                <a class="dropdown-item" onclick="scrollToContent('#extraversion-introversion', '#four-dichotomies', '#fourDichotomiesTabContent')">Extraversion / Introversion</a>
                            </li>
                            <li>
                                <a class="dropdown-item" onclick="scrollToContent('#sensing-intuiting', '#four-dichotomies', '#fourDichotomiesTabContent')">Sensing / iNtuiting</a>
                            </li>
                            <li>
                              <a class="dropdown-item" onclick="scrollToContent('#thinking-feeling', '#four-dichotomies', '#fourDichotomiesTabContent')">Thinking / Feeling</a>
                            </li>
                            <li>
                              <a class="dropdown-item" onclick="scrollToContent('#judgment-perception', '#four-dichotomies', '#fourDichotomiesTabContent')">Judgment / Perception</a>
                            </li>
                        </ul>
                        
                        </li>
						
                        <li class="nav-item menu-btn" id="typedimensionresults" role="presentation">
                          <a class="nav-link border-0" id="social-dynamics" href="javascript:void(0);">Type Dimension Results</a>
                        </li>

                        <li class="nav-item menu-btn dropdown" id="wholetyperesults">
                          <a class="nav-link dropdown-toggle d-flex justify-content-between" href="javascript:void(0);" id="whole-type-results">
                            Whole Type Results 
                              <span class="material-icons" onclick="toggleDropdown(event)">expand_more</span>
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="whole-type-results">
                            <li>
                                <a class="dropdown-item" onclick="scrollToContent('#leadership-methods', '#whole-type-results', '#whole-type-resultsTabContent')"><span class="typehtml"></span> Leadership Methods</a>
                            </li>
                            <li>
                                <a class="dropdown-item" onclick="scrollToContent('#learning-preference', '#whole-type-results', '#whole-type-resultsTabContent')"><span class="typehtml"></span> Learning Preference</a>
                            </li>
                            <li>
                              <a class="dropdown-item" onclick="scrollToContent('#work-and-activity', '#whole-type-results', '#whole-type-resultsTabContent')"><span class="typehtml"></span> Work and Activity Preferences</a>
                            </li>                           
                        </ul>
                        </li>

                        <li class="nav-item menu-btn" id="typetable" role="presentation">
                          <a class="nav-link border-0" id="social-dynamics" href="javascript:void(0);">The Type Table</a>
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
   
<input type="hidden" id="pagename" value="tdreportpage" />

<form id="eqform" name="">
	<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
	<input type="hidden" name="selecteddate" id="selecteddate" value="{{ $resultsArr['firstDate']; }}" />
	<input type="hidden" name="reportid" id="reportid" value="{{ $resultsArr['firstSurveyid']; }}" />
	<input type="hidden" name="selectedtab" id="selectedtab" value="" />
</form>

</x-app-layout>

