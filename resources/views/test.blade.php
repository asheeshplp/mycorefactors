<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

      <main class="col-md-12 ms-sm-auto col-lg-12 pb-5" id="main-wrapper">
          <div class="container-fluid px-3">
            <div class="note-container-accessment justify-content-center">
              <img src="../assets/img/eq-logo.svg" width="58px" height="auto" />
              <h1 class="mb-0 text-white">EQ Accelerator</h1>
            </div>
          </div>

          <div class="container-fluid px-3 mt-3">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-bg-gray">
                  <div class="card-body">
                    <div class="btn-info d-flex gap-3">
                        <a href="#" class="active btn-info-comman">My Report</a>
                        <a href="#" class="btn-info-comman">Explore EQ</a>
                        <a href="#" class="btn-info-comman">Watch Videos</a>
                        <a href="#" class="btn-info-comman">External Resources</a>
                        <!--<a href="#" class="btn-info-comman">EQ Architect</a> -->
                        <a href="#" class="btn-info-comman btn-next float-end ms-auto">Download PDF Report</a>
                    </div>
                    <div class="mt-4 mb-4">
                      <div class="title-comman">
                        <div class="dropdown postion-relative d-flex gap-1">
                          Report Date:
                          <button class="btn boder-0 btn-link text-decoration-none dropdown-toggle title-comman p-0" type="button" id="reportDateDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                             October 14, 2023
                          </button>
                          <ul class="dropdown-menu" aria-labelledby="reportDateDropdown">
                            <li><a class="dropdown-item" href="#">October 14, 2023</a></li>
                            <li><a class="dropdown-item" href="#">October 15, 2023</a></li>
                            <li><a class="dropdown-item" href="#">October 16, 2023</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>


                  <div class="row">
                    <!-- Vertical Nav Tabs -->
                    <div class="col-md-3">
                      <ul class="nav nav-tabs flex-column tabs-vertical" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <a class="nav-link active border-0" href="index.html">Introduction</a>
                        </li>
                        <!-- <li class="nav-item" role="presentation">
                          <a class="nav-link border-0" id="understanding-tab" href="understanding-self-report.html">Understanding Self-Report</a>
                        </li> -->
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="understanding-self-report.html" id="equnderstandingTab">Understanding Self-Report</a>
                          <ul class="dropdown-menu" aria-labelledby="equnderstandingTab">
                              <li>
                                  <a class="dropdown-item" onclick="scrollToContent('#overall-picture', '#equnderstandingTab', '#eq-understanding-content')">An Overall Picture</a>
                              </li>
                              <li>
                                  <a class="dropdown-item" onclick="scrollToContent('#skills-each-dimension', '#equnderstandingTab', '#eq-understanding-content')">Skills in Each Dimension</a>
                              </li>
                          </ul>
                      </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="eq-skills.html" id="eqSkillsTab">EQ Skills</a>
                            <ul class="dropdown-menu" aria-labelledby="eqSkillsTab">
                                <li>
                                    <a class="dropdown-item" onclick="scrollToContent('#overall-picture', '#eqSkillsTab', '#eq-skills-content')">An Overall Picture</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" onclick="scrollToContent('#skills-each-dimension', '#eqSkillsTab', '#eq-skills-content')">Skills in Each Dimension</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="interpreting-your-report.html" id="interpretingTab">Interpreting Your Report</a>
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
                       
                        
                        <li class="nav-item" role="presentation">
                            <a href="your-report-result.html" class="nav-link border-0 " id="reported-results-tab">Your Reported Results</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="eq-dimension-competencies.html" id="selfAwarenessTab">Specific EQ Dimension Competencies and Ratings</a>
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
                      
                      
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="eq-tips-improve.html" id="selfEffectivenessTab">Action Tips to Improve EQ Effectiveness</a>
                          <ul class="dropdown-menu" aria-labelledby="actionTipsTab">
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

                        <li class="nav-item" role="presentation">
                            <a href="eq-references.html" class="nav-link border-0" id="references-tab">References</a>
                        </li>
                      </ul>
                    </div>
                  
                    <!-- Tab Content -->
                    <div class="col-md-9">
                      <div class="tab-content tabs-vertical" id="myTabContent">
                        <div class="tab-pane fade show active" id="introduction" role="tabpanel" aria-labelledby="home-tab">
                          <div class="tab-content py-4 px-4">
                            <div class="text-center mb-4"><img src="../assets/img/eq-logo.png" width="auto" class="m-auto" height="auto" /></div>
                            <h3>Introduction</h3>
                            <p>Emotional Intelligence (EQ) is viewed as an essential capability of individuals seeking to lead and manage others, and for personal effectiveness and well-being. From the first scientific study (The Expression of the Emotions in Man and Animals, Darwin) to current behavioral and neuroscience studies (see the references at the end of the report), the role of emotions in our well-being and work relationships is staggering. Essentially, emotional intelligence is “the capacity to be aware of, control, and express one's emotions, and to handle interpersonal relationships judiciously and empathetically.</p>
                            <p> In many ways, our emotions are our first language. We had emotions before we had words. From our earliest awareness, our emotions were demonstrated through body and facial expressions. As we grew older, we learned some basic words to label our emotions, and now as adults, we know that understanding and managing our emotions are essential skills to be successful at home and on the job. Emotions are the energy threads that run through all human experience.</p>
                            <p> Based on decades of research, all forms of intelligence are reflective of our capacities to perceive and judge or manage, both our individual reactions and the circumstances in front of us. Emotional intelligence is no different. We must make sure and polish those skills that help make our perceptions clear and our judgments sounder as it relates to identifying and using our emotional energies. This report provides a WHAT, SO WHAT, and NOW WHAT approach to enriching your EQ. WHAT is about the specifics of your rating. SO WHAT is about clarifying which competencies are most important to work on. NOW WHAT is the purpose of the action tips designed to guide you going forward.</p>
                            <hr/>

                            <div class="btn-info d-flex justify-content-center gap-3">
                                <a class=" btn-info-comman btn-previous disabled">Previous</a>
                                <a class="btn-info-comman btn-next" href="understanding-self-report.html">Next</a>
                            </div>
                          </div>
                        </div>                        
                      </div>
                    </div>
                  </div>
                  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>
    </div>
 
</x-app-layout>
