<?php
use Illuminate\Support\Facades\Auth;
$user = Auth::user();
$firstName = ucwords($user->first_name);
$lastName = ucwords($user->last_name);

// echo '<pre>'; print_r($enteriesArr); die;
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Journal') }}
        </h2>
    </x-slot>
	 <main class="col-md-12 ms-sm-auto col-lg-12  pb-5" id="main-wrapper">
        <div class="container-fluid px-3">
          <div class="note-container-journal rounded text-white py-5 position-relative px-3">
            <span class="fst-italic welcome-msg">Good Morning, </span>
            <h1 class="text-left mb-0 inline-block d-flex align-items-center">Kris Kiler👋</h1>
            <p class="text-left mb-0">Here how you were doing</p>
            <img class="position-absolute top-0 end-0"
              src="{{ asset('img/journal-bg-welcome.png') }}">
          </div>

          <div class="p-0 mt-5">
            <div class="d-flex align-items-center justify-content-between p-0 mb-3 flex-wrap">
              <h3 class="text-black-one p-0 fw-bold text-h3">My Journal</h3>
              <!--<div class="mood">Mood:😟</div>-->
            </div>
          </div>

          <div class="row p-0">
            <!--<div class="col-md-12 col-lg-8 col-xl-8 mb-3 mb-xl-0 ">-->
            <div class="col-md-12 col-lg-12 col-xl-12 mb-3 mb-xl-0 ">
              <div class="card">
                <div class="card-body">
                  <?php if($enteriesArr) { ?>
				  <h5 class="card-title card-title-common d-flex justify-content-between">Entries <span
                      class="float-end"><button type="button" data-bs-target="#addReminder-entry-question-popup"
                        data-bs-toggle="modal" class="btn btn-primary-common">+ Add</button></span></h5>
				  <?php } else { ?>	
						<h5 class="card-title card-title-common">Entries</h5>
				  <?php } ?>
				  <?php if($enteriesArr) { ?>
                  <div class="search-box d-flex align-items-center justify-content-between flex-wrap mb-2">
                    <h5 class="mb-0 text-black-one card-title-sub">Search & Filter</h5>
                    <div class="filter-box d-flex align-items-center gap-3 flex-wrap">
                      
                      <div class="d-flex position-relative comman-form">
                        <select class="form-select" aria-label="short by" id="FilterSortBy">
                          <option selected>Sort By</option>
                          <option value="1">One</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
                        </select>
                      </div>
                      <div class="d-flex position-relative comman-form">
                        <select class="form-select" aria-label="Type" id="FilterSortByType">
                          <option selected>Type</option>
                          <option value="1">One</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
                        </select>

                      </div>

                    </div>
                  </div>
				  <?php } ?>
					<?php if($enteriesArr) { ?>
                  <table id="myjournalDashboard" class="display border-0" style="width:100%">
                    <div class="loader" style="display:none;"></div>
                    
                  </table> 
					<?php } else { ?>
					<div class="card-text card-text-common text-center py-5">
                    <h4 class="mb-0 fw-bold text-black">No Entries available</h4>
                    <p class="comman-p pt-2">Create an entry now</p>
                    <button type="button" class="btn btn-primary-common"
                      data-bs-target="#addReminder-entry-question-popup" data-bs-toggle="modal">+ Add New Entry</button>
					  </div>
					<?php } ?>
                </div>
              </div>
            </div>
			<!--
            <div class="col-md-12 col-lg-4 col-xl-4 mb-3 mb-xl-0 ">
              <div class="card mb-3 ">
                <div class="card-body">
                  <h5 class="card-title card-title-common d-flex justify-content-between">Reminders <span
                      class="float-end"><button type="button" class="btn btn-primary-common"
                        data-bs-target="#addReminder-popup" data-bs-toggle="modal">+ Add</button></span></h5>
                  <div class="card-text card-text-common pt-3">
                    <div class="reminder-card rounded-3 comman-border mb-3">
                      <div class="d-flex position-relative align-items-center p-3 gap-2">
                        <img src="assets/img/reminder-icon.svg" width="40px" height="auto">
                        <div class="timer-info">
                          <h5 class="timer-title mb-0">12:00 AM</h5>
                          <p class="p-0 mb-0">Jul 26 2024</p>
                        </div>
                        <div class="btn-group comman-none dropstart position-absolute">
                          <button type="button" class=" bg-transparent border-0 dropdown-toggle"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                          </button>
                          <ul class="dropdown-menu  p-0">
                            <li><a class="dropdown-item p-2" href="#">Action</a></li>
                            <li><a class="dropdown-item p-2" href="#">Another action</a></li>
                            <li><a class="dropdown-item p-2" href="#">Something else here</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="reminder-card rounded-3 comman-border mb-3">
                      <div class="d-flex position-relative align-items-center p-3 gap-2">
                        <img src="assets/img/reminder-icon.svg" width="40px" height="auto">
                        <div class="timer-info">
                          <h5 class="timer-title mb-0">02:30 PM</h5>
                          <p class="p-0 mb-0">Every Fri, Sun</p>
                        </div>
                        <div class="btn-group comman-none dropstart position-absolute">
                          <button type="button" class=" bg-transparent border-0 dropdown-toggle"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                          </button>
                          <ul class="dropdown-menu  p-0">
                            <li><a class="dropdown-item p-2" href="#">Action</a></li>
                            <li><a class="dropdown-item p-2" href="#">Another action</a></li>
                            <li><a class="dropdown-item p-2" href="#">Something else here</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer bg-white px-0 d-flex justify-content-between align-items-center pt-4">
                    <p class="comman-p-footer text-start">Enable AI Reminder Suggestions</p>
                    <div class="form-check form-switch fs-4">
                      <input class="form-check-input comman-checkbox" type="checkbox" role="switch"
                        id="flexSwitchCheckDefault">
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-body overflow-auto insights">
                  <h5 class="card-title card-title-common d-flex align-items-center gap-2"><img
                      src="assets/img/chatbot.svg" width="25px" height="auto"> Insights</h5>
                  <div class="card-text-common">
                    <div class="insights-card rounded-3 comman-border mb-3 new-insights text-black">
                      <div class="d-flex gap-2">
                        <i class="material-icons">fiber_manual_record</i>
                        <p class="p-0 mb-0"> Over the past month, you've mentioned feeling stressed on multiple
                          occasions. Here are some Relaxation Techniques you might find helpful.
                          <span class="btn-sm d-flex align-items-center timestamp">2 mins ago</span>
                        </p>
                      </div>

                    </div>
                  </div>

                  <div class="card-text-common">
                    <div class="insights-card rounded-3 p-3 comman-border mb-3 text-black reminder-card">
                      <div class="d-flex gap-2">
                        <p class="p-0 mb-0"> Over the past month, you've mentioned feeling stressed on multiple
                          occasions. Here are some Relaxation Techniques you might find helpful.
                        </p>
                      </div>
                    </div>
                  </div>

                  <div class="card-text-common">
                    <div class="insights-card rounded-3 comman-border mb-3 text-black p-3 reminder-card">
                      <div class="d-flex gap-2">
                        <p class="p-0 mb-0"> Over the past month, you've mentioned feeling stressed on multiple
                          occasions. Here are some Relaxation Techniques you might find helpful.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
      </main>
    </div>
<input type="hidden" name="moodicon" id="moodicon" value="" />
<input type="hidden" id="pagename" value="myjournal" />

<form id="entryform" name="">
	<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
	<input type="hidden" name="selectedmood" id="selectedmood" value="" />
	<input type="hidden" name="entryoption" id="entryoption" value="" />
	<input type="hidden" name="dailyRef" id="dailyRef" value="" />
</form>
</x-app-layout>
