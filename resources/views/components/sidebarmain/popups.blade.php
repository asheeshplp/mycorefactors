<?php
use Illuminate\Support\Facades\DB;

$positiveMoods = DB::table('moods')->where('moodtype', '1')->get();
$neutralMoods = DB::table('moods')->where('moodtype', '2')->get();
$negativeMoods = DB::table('moods')->where('moodtype', '3')->get();

?>
 <!-- Add reminder popup -->
  <div class="modal fade" id="addReminder-popup" aria-hidden="true" aria-labelledby="addReminder-popup"
  tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-between">
        <h3 class="modal-title">Add New Reminder</h3>
        <button type="button" class="text-black bg-transparent border-0 d-flex justify-content-end"
          data-bs-dismiss="modal" aria-label="Close"><i class="material-icons">close</i></button>
      </div>
      <div class="modal-body">
        <div class="form-floating mb-0 d-flex flex-wrap justify-content-between align-items-center mb-2">
          <h5>Set Reminder for:</h5>
          <div class="select-reminder-type d-flex  mb-st-0 mt-3 flex-wrap">
            <div class="form-check form-check-inline">
              <input class="form-check-input" checked type="radio" name="reminderType" id="byDate" value="">
              <label class="form-check-label" for="byDate">Specific Date</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="reminderType" id="byWeek" value="">
              <label class="form-check-label" for="byWeek">Specific days of the week</label>
            </div>
          </div>
        </div>
        <div id="set-reminder-date-container">
          <div class="set-reminder-date d-flex row w-100">
            <div class="mb-3 col-sm-12 col-md-6">
              <label class="form-label">Select date:</label>
              <div class="position-relative">
                <i class="material-icons position-absolute top-50 start-10 translate-middle">calendar_today</i>
                <input type="text" id="datePicker" placeholder="Select Date" class="form-control p-s-5">
              </div>
            </div>
            <div class="mb-3 col-sm-12 col-md-6 ">
              <label class="form-label">Select date:</label>
              <div class="position-relative">
                <i class="material-icons  position-absolute top-50 start-10 translate-middle">schedule</i>
                <input type="text" id="timePicker" placeholder="Select Time" class="form-control p-s-5 ">
              </div>
            </div>
          </div>
        </div>


        <div class="flex" id="set-reminder-week-container">
          <div class="set-reminder-week d-flex row w-100">
            <div class="mb-3 col-sm-12 col-md-12">
              <label class="form-label">Enable Weekly Reminder</label>
              <div class="position-relative">
                <div class="d-flex mt-1 gap-2 flex-wrap">
                  <div class="form-check-inline me-0 day">
                    <input class="form-check-input" type="checkbox" id="mon" />
                    <label class="form-check-label" for="mon">MON</label>
                  </div>
                  <div class="form-check-inline me-0 day">
                    <input class="form-check-input" type="checkbox" id="tue" />
                    <label class="form-check-label" for="tue">TUE</label>
                  </div>
                  <div class="form-check-inline me-0 day">
                    <input class="form-check-input" type="checkbox" id="wed" />
                    <label class="form-check-label" for="wed">WED</label>
                  </div>
                  <div class="form-check-inline me-0 day">
                    <input class="form-check-input" type="checkbox" id="thu" />
                    <label class="form-check-label" for="thu">THU</label>
                  </div>
                  <div class="form-check-inline me-0 day">
                    <input class="form-check-input" type="checkbox" id="fri" />
                    <label class="form-check-label" for="fri">FRI</label>
                  </div>
                  <div class="form-check-inline me-0 day">
                    <input class="form-check-input" type="checkbox" id="sat" />
                    <label class="form-check-label" for="sat">SAT</label>
                  </div>
                  <div class="form-check-inline me-0 day">
                    <input class="form-check-input" type="checkbox" id="sun" />
                    <label class="form-check-label" for="sun">SUN</label>
                  </div>
                </div>


              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary-common-popup">Save reminder</button>
      </div>
    </div>
  </div>
</div>
<!-- End Add reminder popup -->

<!-- Add new entry popup -->
<div class="modal fade" id="addReminder-entry-question-popup" aria-hidden="true"
  aria-labelledby="addReminder-entry-question-popup" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-between">
        <h3 class="modal-title">Question</h3>
        <button type="button" class="text-black bg-transparent border-0 d-flex justify-content-end"
          data-bs-dismiss="modal" aria-label="Close"><i class="material-icons">close</i></button>
      </div>
      <div class="modal-body">
        <h4>How are you feeling today?</h4>
        <div class="positive-feeling">

          <div class="d-flex">
            <div class="container-1">
              <!-- Positive Moods -->
              <div class="mb-3">
                <h5 class="mb-2">Positive Moods:</h5>
                <div class="btn-group-1" role="group" aria-label="Positive Moods">
					<?php 
					if($positiveMoods) {
						foreach($positiveMoods as $pmood){
							if($pmood->moodname == 'Happy') {
								$icon = '😊';
							}
							if($pmood->moodname == 'Relaxed') {
								$icon = '😌';
							}
							if($pmood->moodname == 'Excited') {
								$icon = '😄';
							}
							if($pmood->moodname == 'Satisfied') {
								$icon = '🙂';
							}
							if($pmood->moodname == 'Grateful') {
								$icon = '😇';
							}
					?>
					<input type="radio" class="btn-check" name="mood" id="{{ $pmood->id.'_'.$pmood->moodname }}" autocomplete="off">
					<label class="btn btn-outline-secondary" for="{{ $pmood->id.'_'.$pmood->moodname }}">{{ $icon }} {{ $pmood->moodname }}</label>
					<?php
						}
					}
					?>
                  
                </div>
              </div>

              <!-- Neutral Moods -->
              <div class="mb-3">
                <h5 class="mb-2">Neutral Moods:</h5>
                <div class="btn-group-1" role="group" aria-label="Neutral Moods">
					<?php 
					if($neutralMoods) {
						foreach($neutralMoods as $nmood){
							if($nmood->moodname == 'Neutral') {
								$icon = '😐';
							}
							if($nmood->moodname == 'Thoughtful') {
								$icon = '🤔';
							}
					?>
					
					<input type="radio" class="btn-check" name="mood" id="{{ $nmood->id.'_'.$nmood->moodname }}" autocomplete="off">
					<label class="btn btn-outline-secondary" for="{{ $nmood->id.'_'.$nmood->moodname }}">{{ $icon }} {{ $nmood->moodname }}</label>
					<?php
						}
					}
					?>
                </div>
              </div>

              <!-- Negative Moods -->
              <div class="mb-3">
                <h5 class="mb-2">Negative Moods:</h5>
                <div class="btn-group-1" role="group" aria-label="Negative Moods">
                  <?php 
					if($negativeMoods) {
						foreach($negativeMoods as $ngmood){
							if($ngmood->moodname == 'Worried') {
								$icon = '😟';
							}
							if($ngmood->moodname == 'Sad') {
								$icon = '😔';
							}
							if($ngmood->moodname == 'Stressed') {
								$icon = '😣';
							}
							if($ngmood->moodname == 'Frustrated') {
								$icon = '😤';
							}
							if($ngmood->moodname == 'Tired') {
								$icon = '😴';
							}
							if($ngmood->moodname == 'Anxious') {
								$icon = '😠';
							}
					?>
					<input type="radio" class="btn-check" name="mood" id="{{ $ngmood->id.'_'.$ngmood->moodname }}" autocomplete="off">
                  <label class="btn btn-outline-secondary" for="{{ $ngmood->id.'_'.$ngmood->moodname }}">{{ $icon }} {{ $ngmood->moodname }}</label>
					<?php
						}
					}
					?>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary-common-popup" id="addNewEntry" type="button">Next</button>
      </div>
    </div>
  </div>
</div>
<!-- End new entry popup -->

<!-- Add new entry popup -->
<div class="modal fade" id="add-entry-question-popup" aria-hidden="true"
  aria-labelledby="add-entry-question-popup" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-between">
        <h3 class="modal-title">Add New Entry</h3>
        <button type="button" class="text-black bg-transparent border-0 d-flex justify-content-end"
          data-bs-dismiss="modal" aria-label="Close"><i class="material-icons">close</i></button>
      </div>
      <div class="modal-body">
        <div class="step-1" id="selectEntryStep">
          <div class="flex">
            <div class="ai-reminder">
              <h5>Evidentra <img src="{{ asset('img/chatbot.svg') }}" width="20px" height="auto"></h5>
              <p class="mt-2">It seems like you're feeling “ 😟 <strong class="fst-italic">worried</strong> ”
                Would
                you like to reflect on what's causing this feeling and how you might address it?</p>
              <h6>Suggestion:</h6>
              <p class="d-flex align-items-center text-black mb-0 flex-wrap"><i class="material-icons">arrow_right_alt</i>
                Here
                are some <a class="fst-italic text-decoration-underline ms-1 me-2" href="#">Relaxation
                  Techniques</a>
                you might find helpful.</p>
            </div>
          </div>
          <div class="select-reflection" id="selectMoodSteps">
            <h4 class="d-flex align-items-center justify-content-between flex-wrap">Please select from the following:
              <span class="showicon">Mood: 😟</span>
            </h4>
            <div class="btn-group-1-reflection d-flex gap-2 flex-wrap" role="group" aria-label="">
              <input type="radio" class="btn-check" name="select-mood" id="reflection" autocomplete="off">
              <label class="btn btn-outline-secondary" for="reflection"><span
                  class="reflection-icon icon-common"></span><span>Reflection</span></label>

              <input type="radio" class="btn-check" name="select-mood" id="gratitude" autocomplete="off">
              <label class="btn btn-outline-secondary" for="gratitude"><span
                  class="gratitude-icon icon-common"></span><span>Gratitude</span></label>

              <input type="radio" class="btn-check" name="select-mood" id="goal" autocomplete="off">
              <label class="btn btn-outline-secondary" for="goal"><span
                  class="goal-icon icon-common"></span><span>Goal</span></label>

              <input type="radio" class="btn-check" name="select-mood" id="action-item" autocomplete="off">
              <label class="btn btn-outline-secondary" for="action-item"><span
                  class="actionitem-icon icon-common"></span><span>Action Item</span></label>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a class="pe-cursor text-black back-step" data-bs-target="#addReminder-entry-question-popup"
          data-bs-toggle="modal">Back</a>
        <button class="btn btn-primary-common-popup" id="addNewEntryStep">Next</button>
      </div>
    </div>
  </div>
</div>
<!-- End new entry popup -->

<!-- Add reflection popup -->
<div class="modal fade" id="add-entry-reflection-popup" aria-hidden="true"
  aria-labelledby="add-entry-reflection-popup" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-between">
        <h3 class="modal-title">Add New Entry</h3>
        <button type="button" class="text-black bg-transparent border-0 d-flex justify-content-end"
          data-bs-dismiss="modal" aria-label="Close"><i class="material-icons">close</i></button>
      </div>
      <div class="modal-body">
        <div class="step-1" id="reflection-step">
          <div class="reflection" id="reflection-step">
            <div class="select-reflection">
              <h4 class="d-flex align-items-center justify-content-between flex-wrap">Please select from the following:
                <span>Selected: <span
                    class="fw-semibold color-green pe-1 border-end border-color">Reflection</span><span
                    class="ps-1 showicon">Mood: 😟</span>
              </h4>
              <div class="select-reflection-inner">
                <div class="btn-group-1-reflection d-flex gap-2" role="group" aria-label="">
                  <input type="radio" class="btn-check" checked name="selected-reflection" id="dailyReflection"
                    autocomplete="off">
                  <label class="btn btn-outline-secondary w-100" for="dailyReflection"><span>Daily</span></label>

                  <input type="radio" class="btn-check" name="selected-reflection" id="weeklyReflection"
                    autocomplete="off">
                  <label class="btn btn-outline-secondary w-100"
                    for="weeklyReflection"><span>Weekly</span></label>

                  <input type="radio" class="btn-check" name="selected-reflection" id="monthlyReflection"
                    autocomplete="off">
                  <label class="btn btn-outline-secondary w-100"
                    for="monthlyReflection"><span>Monthly</span></label>
                </div>
                <div class="question-daily mt-3" id="question-daily">
                  <div class="question-daily-inner">
                    <form action="" id="reflectionQuestionFormDaily">
                      <div class="mb-3">
                        <label for="question1" class="form-label">Q1- What was the highlight of your day?</label>
                        <textarea class="form-control" id="question1" name="question1"
                          placeholder="Write your answer here." cols="30" rows="5"></textarea>
                      </div>
                      <div class="ai-reminder mb-3">
                        <div class="d-flex flex-column align-items-center gap-2 w-30 m-auto"
                          id="ai-reminder-loader">
                          <img src="{{ asset('img/chatbot.svg') }}" width="20px" height="auto">
                          <h6 class="text-center">Generating AI Evidentra suggestion</h6>
                          <span class="loader"></span>
                        </div>
                        <div class="d-flex flex-column align-items-start" style="display: none !important;"
                          id="ai-suggestion">
                          <h6 class="text-center">Evidentra suggestion <img src="{{ asset('img/chatbot.svg') }}"
                              width="20px" height="auto"></h6>
                          <p>Lorem ipsum dolor sit amet consectetur. Turpis auctor ut dictum adipiscing eleifend
                            imperdiet. Tempor vestibulum maecenas eget non massa neque integer fames faucibus. A
                            amet
                            urna faucibus est. Massa orci mauris purus vulputate condimentum donec ipsum.</p>
                        </div>
                      </div>
                      <div class="mb-3">
                        <label for="question2" class="form-label">Q2- What challenges did you face today and how
                          did you overcome them?</label>
                        <textarea class="form-control" id="question2" name="question2"
                          placeholder="Write your answer here." cols="30" rows="5"></textarea>
                      </div>
                      <div class="mb-3">
                        <label for="question3" class="form-label">Q3- What did you learn about yourself
                          today?</label>
                        <textarea class="form-control" id="question3" name="question3"
                          placeholder="Write your answer here." cols="30" rows="5"></textarea>
                      </div>
					  <div class="mb-3">
                        <label for="question4" class="form-label">Q4- Describe a moment that made you smile today.</label>
                        <textarea class="form-control" id="question4" name="question4"
                          placeholder="Write your answer here." cols="30" rows="5"></textarea>
                      </div>
					  <div class="mb-3">
                        <label for="question5" class="form-label">Q5- How did you feel about your productivity today?</label>
                        <textarea class="form-control" id="question5" name="question5"
                          placeholder="Write your answer here." cols="30" rows="5"></textarea>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="question-weekly mt-3" id="question-weekly">
                  <div class="question-daily-inner">
                    <form action="" id="reflectionQuestionFormWeekly">
                      <div class="mb-3">
                        <label for="question1" class="form-label">Q1- What was your biggest accomplishment this week?</label>
                        <textarea class="form-control" id="question1" name="question1"
                          placeholder="Write your answer here." cols="30" rows="5"></textarea>
                      </div>
                      <div class="ai-reminder mb-3">
                        <div class="d-flex flex-column align-items-center gap-2 w-30 m-auto"
                          id="ai-reminder-loader-weekly">
                          <img src="{{ asset('img/chatbot.svg') }}" width="20px" height="auto">
                          <h6 class="text-center">Generating AI Evidentra suggestion</h6>
                          <span class="loader"></span>
                        </div>
                        <div class="d-flex flex-column align-items-start" style="display: none !important;"
                          id="ai-suggestion-weekly">
                          <h6 class="text-center">Evidentra suggestion <img src="{{ asset('img/chatbot.svg') }}"
                              width="20px" height="auto"></h6>
                          <p>Lorem ipsum dolor sit amet consectetur. Turpis auctor ut dictum adipiscing eleifend
                            imperdiet. Tempor vestibulum maecenas eget non massa neque integer fames faucibus. A
                            amet
                            urna faucibus est. Massa orci mauris purus vulputate condimentum donec ipsum.</p>
                        </div>
                      </div>
                      <div class="mb-3">
                        <label for="question2" class="form-label">Q2- What obstacles did you encounter and how did you handle them?</label>
                        <textarea class="form-control" id="question2" name="question2"
                          placeholder="Write your answer here." cols="30" rows="5"></textarea>
                      </div>
                      <div class="mb-3">
                        <label for="question3" class="form-label">Q3- Reflect on a moment this week that brought you joy.</label>
                        <textarea class="form-control" id="question3" name="question3"
                          placeholder="Write your answer here." cols="30" rows="5"></textarea>
                      </div>
					  <div class="mb-3">
                        <label for="question4" class="form-label">Q4- What did you learn from the people you interacted with this week?</label>
                        <textarea class="form-control" id="question4" name="question4"
                          placeholder="Write your answer here." cols="30" rows="5"></textarea>
                      </div>
					  <div class="mb-3">
                        <label for="question5" class="form-label">Q5- How would you rate your overall week and why?</label>
                        <textarea class="form-control" id="question5" name="question5"
                          placeholder="Write your answer here." cols="30" rows="5"></textarea>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="question-monthly mt-3" id="question-monthly">
                  <div class="question-daily-inner">
                    <form action="" id="reflectionQuestionFormMonthly">
                      <div class="mb-3">
                        <label for="question1" class="form-label">Q1- What were your key achievements this month?</label>
                        <textarea class="form-control" id="question1" name="question1"
                          placeholder="Write your answer here." cols="30" rows="5"></textarea>
                      </div>
                      <div class="ai-reminder mb-3">
                        <div class="d-flex flex-column align-items-center gap-2 w-30 m-auto"
                          id="ai-reminder-loader-monthly">
                          <img src="{{ asset('img/chatbot.svg') }}" width="20px" height="auto">
                          <h6 class="text-center">Generating AI Evidentra suggestion</h6>
                          <span class="loader"></span>
                        </div>
                        <div class="d-flex flex-column align-items-start" style="display: none !important;"
                          id="ai-suggestion-monthly">
                          <h6 class="text-center">Evidentra suggestion <img src="{{ asset('img/chatbot.svg') }}"
                              width="20px" height="auto"></h6>
                          <p>Lorem ipsum dolor sit amet consectetur. Turpis auctor ut dictum adipiscing eleifend
                            imperdiet. Tempor vestibulum maecenas eget non massa neque integer fames faucibus. A
                            amet
                            urna faucibus est. Massa orci mauris purus vulputate condimentum donec ipsum.</p>
                        </div>
                      </div>
                      <div class="mb-3">
                        <label for="question2" class="form-label">Q2- What did you find most challenging and why?</label>
                        <textarea class="form-control" id="question2" name="question2"
                          placeholder="Write your answer here." cols="30" rows="5"></textarea>
                      </div>
                      <div class="mb-3">
                        <label for="question3" class="form-label">Q3- Reflect on your personal growth this month.</label>
                        <textarea class="form-control" id="question3" name="question3"
                          placeholder="Write your answer here." cols="30" rows="5"></textarea>
                      </div>
					  <div class="mb-3">
                        <label for="question4" class="form-label">Q4- What are you most grateful for this month?</label>
                        <textarea class="form-control" id="question4" name="question4"
                          placeholder="Write your answer here." cols="30" rows="5"></textarea>
                      </div>
					  <div class="mb-3">
                        <label for="question5" class="form-label">Q5- How did you balance your work and personal life this month?</label>
                        <textarea class="form-control" id="question5" name="question5"
                          placeholder="Write your answer here." cols="30" rows="5"></textarea>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a class="pe-cursor text-black back-step" data-bs-target="#add-entry-question-popup"
          data-bs-toggle="modal">Back</a>
        <button class="btn btn-primary-common-popup" id="celebrateButton">Next</button>
      </div>
    </div>
  </div>
</div>
<!-- End reflection popup -->

<!-- Add gratitude popup -->
<div class="modal fade" id="add-entry-gratitude-popup" aria-hidden="true"
  aria-labelledby="add-entry-gratitude-popup" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-between">
        <h3 class="modal-title">Add New Entry</h3>
        <button type="button" class="text-black bg-transparent border-0 d-flex justify-content-end"
          data-bs-dismiss="modal" aria-label="Close"><i class="material-icons">close</i></button>
      </div>
      <div class="modal-body">
        <div class="step-1" id="reflection-step">
          <div class="reflection" id="reflection-step">
            <div class="select-reflection">
              <div class="d-flex align-items-center justify-content-end">
                <span>Selected: <span
                    class="fw-semibold color-green pe-1 border-end border-color">Gratitude</span> <span
                    class="ps-1 showicon">Mood: 😟</span>
              </div>
              <div class="question-daily-inner">
                <form action="" id="addQuestion-gratitude">
                  <div class="mb-3">
                    <label for="question" class="form-label">List three things you are grateful for today</label>
                    <textarea class="form-control" id="question1" name="question1"
                      placeholder="Write your answer here." cols="30" rows="5"></textarea>
                  </div>

                  <div class="mb-3">
                    <label for="question" class="form-label">Who is someone that made a positive impact on your life recently?</label>
                    <textarea class="form-control" id="question2" name="question2"
                      placeholder="Write your answer here." cols="30" rows="5"></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="question" class="form-label">Describe a small thing that brought you happiness today.</label>
                    <textarea class="form-control" id="question3" name="question3"
                      placeholder="Write your answer here." cols="30" rows="5"></textarea>
                  </div>
				  <div class="mb-3">
                    <label for="question" class="form-label">What is a recent success you are thankful for?</label>
                    <textarea class="form-control" id="question4" name="question4"
                      placeholder="Write your answer here." cols="30" rows="5"></textarea>
                  </div><div class="mb-3">
                    <label for="question" class="form-label">Reflect on a kind gesture someone did for you.</label>
                    <textarea class="form-control" id="question5" name="question5"
                      placeholder="Write your answer here." cols="30" rows="5"></textarea>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a class="pe-cursor text-black back-step" data-bs-target="#add-entry-question-popup"
          data-bs-toggle="modal">Back</a>
        <button class="btn btn-primary-common-popup" id="celebrateButtonGratitude">Next</button>
      </div>
    </div>
  </div>
</div>
<!-- End gratitude popup -->

<!-- Add Goal popup -->
<div class="modal fade" id="add-entry-goal-popup" aria-hidden="true" aria-labelledby="add-entry-goal-popup"
  tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-between">
        <h3 class="modal-title">Add New Entry</h3>
        <button type="button" class="text-black bg-transparent border-0 d-flex justify-content-end"
          data-bs-dismiss="modal" aria-label="Close"><i class="material-icons">close</i></button>
      </div>
      <div class="modal-body">
        <div class="step-1" id="reflection-step">
          <div class="reflection" id="reflection-step">
            <div class="d-flex align-items-center justify-content-end">
              <span>Selected: <span class="fw-semibold color-green pe-1 border-end border-color">Goal</span> <span
                  class="ps-1 showicon">Mood: 😟</span>
            </div>
            <div class="select-reflection-inner mt-3">
              <div class="btn-group-1-reflection d-flex gap-2" role="group" aria-label="">
                <input type="radio" class="btn-check" checked="" name="selected-goal" id="dailyGoal"
                  autocomplete="off">
                <label class="btn btn-outline-secondary w-100" for="dailyGoal"><span>Daily</span></label>

                <input type="radio" class="btn-check" name="selected-goal" id="weeklyGoal" autocomplete="off">
                <label class="btn btn-outline-secondary w-100" for="weeklyGoal"><span>Weekly</span></label>

                <input type="radio" class="btn-check" name="selected-goal" id="monthlyGoal" autocomplete="off">
                <label class="btn btn-outline-secondary w-100" for="monthlyGoal"><span>Monthly</span></label>
              </div>
              <div class="question-daily mt-3" id="question-daily-goal" style="">
                <div class="question-daily-inner">
                  <form action="" id="goalQuestionFormDaily">
                    <div class="mb-3">
                      <label for="question1" class="form-label">Q1- What is your primary goal for today?</label>
                      <textarea class="form-control" id="question1" name="question1"
                        placeholder="Write your answer here." cols="30" rows="5"></textarea>
                    </div>
					<div class="mb-3">
                      <label for="question2" class="form-label">Q2- What is one thing you want to accomplish by the end of the day?</label>
                      <textarea class="form-control" id="question2" name="question2"
                        placeholder="Write your answer here." cols="30" rows="5"></textarea>
                    </div>
					<div class="mb-3">
                      <label for="question3" class="form-label">Q3- What will you do today to make progress toward your long-term goals?</label>
                      <textarea class="form-control" id="question3" name="question3"
                        placeholder="Write your answer here." cols="30" rows="5"></textarea>
                    </div>
					<div class="mb-3">
                      <label for="question4" class="form-label">Q4- What positive habit do you want to focus on today?</label>
                      <textarea class="form-control" id="question4" name="question4"
                        placeholder="Write your answer here." cols="30" rows="5"></textarea>
                    </div>
					<div class="mb-3">
                      <label for="question5" class="form-label">Q5- How will you ensure you stay productive today?</label>
                      <textarea class="form-control" id="question5" name="question5"
                        placeholder="Write your answer here." cols="30" rows="5"></textarea>
                    </div>
                  </form>
                </div>
              </div>
              <div class="question-weekly mt-3" id="question-weekly-goal" style="display: none;">
                <div class="question-daily-inner">
                  <form action="" id="goalQuestionFormWeekly">
                    <div class="mb-3">
                      <label for="question1" class="form-label">Q1- What are your top three goals for this week?</label>
                      <textarea class="form-control" id="question1" name="question1"
                        placeholder="Write your answer here." cols="30" rows="5"></textarea>
                    </div>
					<div class="mb-3">
                      <label for="question2" class="form-label">Q2- What is a new skill or habit you want to develop this week?</label>
                      <textarea class="form-control" id="question2" name="question2"
                        placeholder="Write your answer here." cols="30" rows="5"></textarea>
                    </div>
					<div class="mb-3">
                      <label for="question3" class="form-label">Q3- How will you measure your success at the end of the week?</label>
                      <textarea class="form-control" id="question3" name="question3"
                        placeholder="Write your answer here." cols="30" rows="5"></textarea>
                    </div>
					<div class="mb-3">
                      <label for="question4" class="form-label">Q4- What is one challenge you want to tackle this week?"</label>
                      <textarea class="form-control" id="question4" name="question4"
                        placeholder="Write your answer here." cols="30" rows="5"></textarea>
                    </div>
					<div class="mb-3">
                      <label for="question5" class="form-label">Q5- What will you do to ensure a balanced week?</label>
                      <textarea class="form-control" id="question5" name="question5"
                        placeholder="Write your answer here." cols="30" rows="5"></textarea>
                    </div>

                  </form>
                </div>
              </div>
              <div class="question-monthly mt-3" id="question-monthly-goal" style="display: none;">
                <div class="question-daily-inner">
                  <form action="" id="goalQuestionFormMonthly">
                    <div class="mb-3">
                      <label for="question1" class="form-label">Q1- What are your main objectives for this month?</label>
                      <textarea class="form-control" id="question1" name="question1"
                        placeholder="Write your answer here." cols="30" rows="5"></textarea>
                    </div>
					<div class="mb-3">
                      <label for="question2" class="form-label">Q2- What personal or professional milestones do you want to achieve?</label>
                      <textarea class="form-control" id="question2" name="question2"
                        placeholder="Write your answer here." cols="30" rows="5"></textarea>
                    </div>
					<div class="mb-3">
                      <label for="question3" class="form-label">Q3- How will you stay motivated throughout the month?</label>
                      <textarea class="form-control" id="question3" name="question3"
                        placeholder="Write your answer here." cols="30" rows="5"></textarea>
                    </div>
					<div class="mb-3">
                      <label for="question4" class="form-label">Q4- What is a long-term project you want to make significant progress on?</label>
                      <textarea class="form-control" id="question4" name="question4"
                        placeholder="Write your answer here." cols="30" rows="5"></textarea>
                    </div>
					<div class="mb-3">
                      <label for="question5" class="form-label">Q5- What strategies will you implement to reach your goals this month?</label>
                      <textarea class="form-control" id="question5" name="question5"
                        placeholder="Write your answer here." cols="30" rows="5"></textarea>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a class="pe-cursor text-black back-step" data-bs-target="#add-entry-question-popup"
          data-bs-toggle="modal">Back</a>
        <button class="btn btn-primary-common-popup" id="celebrateButtonGoal">Next</button>
      </div>
    </div>
  </div>
</div>
<!-- End goal popup -->

<!-- Add actionItem popup -->
      <div class="modal fade" id="add-entry-actionItem-popup" aria-hidden="true"
        aria-labelledby="add-entry-actionItem-popup" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
              <h3 class="modal-title">Add New Entry</h3>
              <button type="button" class="text-black bg-transparent border-0 d-flex justify-content-end"
                data-bs-dismiss="modal" aria-label="Close"><i class="material-icons">close</i></button>
            </div>
            <div class="modal-body">
              <div class="step-1" id="reflection-step">
                <div class="reflection">
                  <div class="d-flex align-items-center justify-content-end">
                    <span>Selected: <span class="fw-semibold color-green pe-1 border-end border-color">Action Item</span> <span
                        class="ps-1 showicon">Mood: 😟</span>
                  </div>
                  <div class="select-reflection-inner mt-3">
                    
                    <div class="question-daily mt-3" id="question-daily-action" style="">
                      <div class="question-daily-inner">
                        <form action="" id="actionQuestionFormDaily">
                          <div class="mb-3">
                      <label for="question1" class="form-label">Q1- What specific task do you plan to accomplish today?</label>
                      <textarea class="form-control" id="question1" name="question1"
                        placeholder="Write your answer here." cols="30" rows="5"></textarea>
                    </div>
					<div class="mb-3">
                      <label for="question2" class="form-label">Q2- Describe an actionable step you can take toward your goal.</label>
                      <textarea class="form-control" id="question2" name="question2"
                        placeholder="Write your answer here." cols="30" rows="5"></textarea>
                    </div>
					<div class="mb-3">
                      <label for="question3" class="form-label">Q3- What is one thing you can do today to improve your well-being?</label>
                      <textarea class="form-control" id="question3" name="question3"
                        placeholder="Write your answer here." cols="30" rows="5"></textarea>
                    </div>
					<div class="mb-3">
                      <label for="question4" class="form-label">Q4- What is the next step you need to take for your current project?</label>
                      <textarea class="form-control" id="question4" name="question4"
                        placeholder="Write your answer here." cols="30" rows="5"></textarea>
                    </div>
					<div class="mb-3">
                      <label for="question5" class="form-label">Q5- What task have you been procrastinating on that you will complete today?</label>
                      <textarea class="form-control" id="question5" name="question5"
                        placeholder="Write your answer here." cols="30" rows="5"></textarea>
                    </div>
                        </form>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <a class="pe-cursor text-black back-step" data-bs-target="#add-entry-question-popup"
                data-bs-toggle="modal">Back</a>
              <button class="btn btn-primary-common-popup" id="celebrateButtonAction">Next</button>
            </div>
          </div>
        </div>
      </div>
      <!-- End actionItem popup -->
	  
	  <!-- update popup -->
      <div class="modal fade" id="update-entry-popup" aria-hidden="true" aria-labelledby="update-entry-popup"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
              <h3 class="modal-title">Entry Details</h3>
              <button type="button" class="text-black bg-transparent border-0 d-flex justify-content-end"
                data-bs-dismiss="modal" aria-label="Close"><i class="material-icons">close</i></button>
            </div>
            <div class="modal-body">
              <div class="step-1" id="reflection-step">
                <div class="reflection" id="reflection-step">
                  <div class="select-reflection">
                    <div class="d-flex align-items-center justify-content-between align-items-center flex-wrap">
                      <h4 class="mb-1 mt-1 entryname"> </h4>
                      <div class="d-flex align-items-center gap-2 fs-14">
                        <span class="border-right pe-1 d-flex align-items-center moodstatus"></span>
                        <span class="ps-1 border-right pe-1 d-flex align-items-center"><i
                            class="material-icons fs-6 pe-1">schedule</i> 12:00 AM</span>
                        <span class="ps-1 d-flex align-items-center"><i
                            class="material-icons fs-6 pe-1">calendar_today</i> Jul 26 2024</span>
                      </div>
                    </div>
                    <div class="select-reflection-inner">
                      <div class="question-daily mt-3" id="question-update">
                        <div class="question-daily-inner">
                          <form id="updateentryform" action="">
							<input type="hidden" name="upentryid" id="upentryid" value="" />
							<input type="hidden" name="uptypeid" id="uptypeid" value="" />
							<input type="hidden" name="tabletoupdate" id="uptabletoupdate" value="" />
							
                            <div class="mb-3">
                              <label for="question1" class="form-label upquestion1">Q1- </label>
                              <textarea class="form-control" id="upquestion1" name="question1"
                                placeholder="Write your answer here." cols="30"
                                rows="5"></textarea>
                            </div>
                            <div class="mb-3">
                              <label for="question2" class="form-label upquestion2">Q2- </label>
                              <textarea class="form-control" id="upquestion2" name="question2"
                                placeholder="Write your answer here." cols="30"
                                rows="5"></textarea>
                            </div>
                            <div class="mb-3">
                              <label for="question3" class="form-label upquestion3">Q3- </label>
                              <textarea class="form-control" id="upquestion3" name="question3"
                                placeholder="Write your answer here." cols="30"
                                rows="5"></textarea>
                            </div>
							<div class="mb-3">
                              <label for="question4" class="form-label upquestion4">Q4- </label>
                              <textarea class="form-control" id="upquestion4" name="question4"
                                placeholder="Write your answer here." cols="30"
                                rows="5"></textarea>
                            </div>
							<div class="mb-3">
                              <label for="question5" class="form-label upquestion5">Q5- </label>
                              <textarea class="form-control" id="upquestion5" name="question5"
                                placeholder="Write your answer here." cols="30"
                                rows="5"></textarea>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-primary-common-popup" id="updateEntry">Update</button>
            </div>
          </div>
        </div>
      </div>
