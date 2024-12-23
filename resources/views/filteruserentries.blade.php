<?php if($finalArr) { ?>
                  
                    <thead class="d-none">
                      <tr>
                        <th>Card Data</th>
                      </tr>
                    </thead>
                    <tbody>
						<?php 
						foreach($finalArr as $entry) {
						// echo '<pre>'; print_r($entry); die;
						$id 	= $entry['id'];
						$entry_option 	= $entry['entry_option'];
						$moodId 		= $entry['mood_id'];
						if($moodId == '1') {
							$text = 'Happy';
							$icon = '😊';
						}
						if($moodId == '2') {
							$text = 'Relaxed';
							$icon = '😌';
						}
						if($moodId == '3') {
							$text = 'Excited';
							$icon = '😄';
						}
						if($moodId == '4') {
							$text = 'Satisfied';
							$icon = '🙂';
						}
						if($moodId == '5') {
							$text = 'Grateful';
							$icon = '😇';
						}
						if($moodId == '6') {
							$text = 'Neutral';
							$icon = '😐';
						}
						if($moodId == '7') {
							$text = 'Thoughtful';
							$icon = '🤔';
						}	
						if($moodId == '8') {
							$text = 'Worried';
							$icon = '😟';
						}
						if($moodId == '9') {
							$text = 'Sad';
							$icon = '😔';
						}
						if($moodId == '10') {
							$text = 'Stressed';
							$icon = '😣';
						}
						if($moodId == '11') {
							$text = 'Frustrated';
							$icon = '😤';
						}
						if($moodId == '12') {
							$text = 'Tired';
							$icon = '😴';
						}
						if($moodId == '13') {
							$text = 'Anxious';
							$icon = '😠';
						}
							
						
						if($entry_option == '1') {
							$name = 'Reflection';
							$image = 'img/reflaction-icon.svg';
						}
						if($entry_option == '2') {
							$name = 'Gratitude';
							$image = 'img/gratitude-icon.svg';
						}
						if($entry_option == '3') {
							$name = 'Goal';
							$image = 'img/goal-icon.svg';
						}
						if($entry_option == '4') {
							$name = 'Action Item';
							$image = 'img/action-icon.svg';
						}
						?> 
                      <tr class="bg-transparent-none">
                        <td>
                          <div class="row">
                            <div class="col-md-12 mb-3">
                              <div class="card bg-card-1">
                                <div class="d-flex flex-column">
                                  <div class="p-3 border-bottom common-box-journal text-start">
                                    <img src="{{ asset($image) }}" width="40px" height="auto">
                                    <h5 class="mb-0">{{ $name }}</h5>
                                    <p>Lorem ipsum dolor sit amet consectetur. Commodo urna id consequat volutpat sit. Mi
                                      posuere massa tellus lectus quis integer lacus. Suscipit ac tincidunt eget vestibulum.
                                    </p>
                                    <div class="btn-group comman-none dropstart position-absolute top-0 end-0">
                                      <button type="button" class=" bg-transparent border-0 dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                      </button>
                                      <ul class="dropdown-menu p-0">
                                        <!--<li><a class="dropdown-item p-2 editentry" data-bs-target="#update-entry-popup" href="void(0)"
                                            data-bs-toggle="modal">Edit Entry</a></li> -->
										<li><a class="dropdown-item p-2 editentry" id="{{ $id }}">Edit Entry</a></li>
                                        <li><a class="dropdown-item p-2 deleteentry" id="{{ $id }}">Delete Entry</a></li>
                                      </ul>
                                    </div>
                                  </div>
                                  <div class="footer-comman-card p-3">
                                    <div class="d-flex">
                                      <ul class="m-0 d-flex align-items-center list-unstyled flex-wrap">
                                        <li class="d-flex align-items-center gap-1 border-end pe-2"><i
                                            class="material-icons">schedule</i> 12:00 AM</li>
                                        <li class="d-flex align-items-center ps-2 gap-1 border-end pe-2 "><i
                                            class="material-icons">event</i> Jul 26 2024</li>
                                        <li class="d-flex align-items-center ps-2 gap-1 pe-2">Mood Status: {{ $icon }}</li>
                                      </ul>
      
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                           
                          </div>
                        </td>
                      </tr>
						<?php } ?>
                    </tbody>
                  
					<?php }  ?>
					
                
            

