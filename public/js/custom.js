const sidebarMenu = document.getElementById('sidebarMenu');

sidebarMenu.addEventListener('mouseenter', () => {
    sidebarMenu.classList.add('extend');
});

sidebarMenu.addEventListener('mouseleave', () => {
    sidebarMenu.classList.remove('extend');
    const submenus = document.querySelectorAll('.submenu');
    submenus.forEach(submenu => {
        submenu.style.display = 'none';
    });
});

function toggleSubmenu(event) {
    const submenu = event.target.closest('.nav-item').querySelector('.submenu');
    submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';
}


$("#datePicker").datepicker({
    dateFormat: 'M d yy', // Format for 'Jul 26 2024'
    setDate: new Date()
}).datepicker("setDate", new Date());

// Time picker with AM/PM format
$('#timePicker').timepicker({
    defaultTime: 'current',
    showMeridian: true,
    minuteStep: 1,
    showSeconds: true,
    dynamic: false,
    explicitMode: true,
    dropdown: true,
    scrollbar: true
});



// Initially hide both divs
// $('#set-reminder-date-container').hide();
$('#set-reminder-week-container').hide();

// Show/Hide div based on the selected radio button
$('input[type=radio][name=reminderType]').change(function () {
    if ($('#byDate').is(':checked')) {
        $('#set-reminder-date-container').show();
        $('#set-reminder-week-container').hide();
    } else if ($('#byWeek').is(':checked')) {
        $('#set-reminder-date-container').hide();
        $('#set-reminder-week-container').show();
    }
});

// show error msg if user did't select any mood on popup

$(document).on("click", '.editentry', function(event) {
	var idtoedit = $(this).attr('id');
	$('.loader').show(); 
	var data = {
		"_token": $('#token').val(),
		"idtoedit": idtoedit
	};
	
	$.ajax( {
		type: 'POST',
		url: 'editentry',
		data: data,
		dataType:"json",
		success: function(response) {
			$('.loader').hide(); 
			if(response == 'error'){
				swalWithBootstrapButtons.fire({
				  title: "Something went wrong!",
				  text: "Please try again or contact admin.",
				  icon: "error"
				}); 
			} else {
				console.log(response);				
				$('#update-entry-popup').modal('show');
				var moodhtml = getmoodbyid(response.mood_id);
				$('.moodstatus').html(moodhtml);
				if(response.entry_option == '1') {
					var entryname = 'Reflection';
					if(response.type_daily_weekly_monthly == 'daily') {
						$('.upquestion1').html('Q1- What was the highlight of your day?');
						$('.upquestion2').html('Q2- What challenges did you face today and how did you overcome them?');
						$('.upquestion3').html('Q3- What did you learn about yourself today?');
						$('.upquestion4').html('Q4- Describe a moment that made you smile today.');
						$('.upquestion5').html('Q5- How did you feel about your productivity today?');
					}if(response.type_daily_weekly_monthly == 'weekly') {
						$('.upquestion1').html('Q1- What was your biggest accomplishment this week?');
						$('.upquestion2').html('Q2- What obstacles did you encounter and how did you handle them?');
						$('.upquestion3').html('Q3- Reflect on a moment this week that brought you joy.');
						$('.upquestion4').html('Q4- What did you learn from the people you interacted with this week?');
						$('.upquestion5').html('Q5- How would you rate your overall week and why?');
					} else {
						$('.upquestion1').html('Q1- What were your key achievements this month?');
						$('.upquestion2').html('Q2- What did you find most challenging and why?');
						$('.upquestion3').html('Q3- Reflect on your personal growth this month.');
						$('.upquestion4').html('Q4- What are you most grateful for this month?');
						$('.upquestion5').html('Q5- How did you balance your work and personal life this month?');
					}
				} else if(response.entry_option == '2') {
					var entryname = 'Gratitude';
					$('.upquestion1').html('List three things you are grateful for today');
					$('.upquestion2').html('Who is someone that made a positive impact on your life recently?');
					$('.upquestion3').html('Describe a small thing that brought you happiness today.');
					$('.upquestion4').html('What is a recent success you are thankful for?');
					$('.upquestion5').html('Reflect on a kind gesture someone did for you.');
				} else if(response.entry_option == '3') {
					var entryname = 'Goal';
					if(response.type_daily_weekly_monthly == 'daily') {
						$('.upquestion1').html('Q1- What is your primary goal for today?');
						$('.upquestion2').html('Q2- What is one thing you want to accomplish by the end of the day?');
						$('.upquestion3').html('Q3- What will you do today to make progress toward your long-term goals?');
						$('.upquestion4').html('Q4- What positive habit do you want to focus on today?');
						$('.upquestion5').html('Q5- How will you ensure you stay productive today?');
					}if(response.type_daily_weekly_monthly == 'weekly') {
						$('.upquestion1').html('Q1- What are your top three goals for this week?');
						$('.upquestion2').html('Q2- What is a new skill or habit you want to develop this week?');
						$('.upquestion3').html('Q3- How will you measure your success at the end of the week?');
						$('.upquestion4').html('Q4- What is one challenge you want to tackle this week?');
						$('.upquestion5').html('Q5- What will you do to ensure a balanced week?');
					} else {
						$('.upquestion1').html('Q1- What are your main objectives for this month?');
						$('.upquestion2').html('Q2- What personal or professional milestones do you want to achieve?');
						$('.upquestion3').html('Q3- How will you stay motivated throughout the month?');
						$('.upquestion4').html('Q4- What is a long-term project you want to make significant progress on?');
						$('.upquestion5').html('Q5- What strategies will you implement to reach your goals this month?');
					}
				} else if(response.entry_option == '4') {
					var entryname = 'Action Item';
					$('.upquestion1').html('Q1- What specific task do you plan to accomplish today?');
					$('.upquestion2').html('Q2- Describe an actionable step you can take toward your goal.');
					$('.upquestion3').html('Q3- What is one thing you can do today to improve your well-being?');
					$('.upquestion4').html('Q4- What is the next step you need to take for your current project?');
					$('.upquestion5').html('Q5- What task have you been procrastinating on that you will complete today?');
				}
				$('.entryname').html(entryname);
				$('#upentryid').val(response.id);
				$('#uptypeid').val(response.typeId);
				$('#uptabletoupdate').val(response.tableToupdate);
				$('#upquestion1').html(response.question1);
				$('#upquestion1').val(response.question1);
				$('#upquestion2').html(response.question2);
				$('#upquestion2').val(response.question2);
				$('#upquestion3').html(response.question3);
				$('#upquestion3').val(response.question3);
				$('#upquestion4').html(response.question4);
				$('#upquestion4').val(response.question4);
				$('#upquestion5').html(response.question5);
				$('#upquestion5').val(response.question5);
				// alert(moodhtml);
			}
		}
	});
});

$(document).on("click", '#updateEntry', function(event) {
	$('.loader').show(); 
	const swalWithBootstrapButtons = Swal.mixin({
	  customClass: {
		confirmButton: "btn btn-success",
		cancelButton: "btn btn-danger"
	  },
	  buttonsStyling: false
	});
	
	var dataString = $("#updateentryform").serialize();	
	var data = {
        "_token": $('#token').val(),
        "dataString": dataString
    };
    // Do AJAX
    $.ajax( {
        type: 'POST',
        url: 'updateentry',
        data: data,
        success: function(response) {
			$('.loader').hide(); 
            if(response == 'success'){
				$('#update-entry-popup').modal('hide');
				swalWithBootstrapButtons.fire({
					  title: "Updated!",
					  text: "Entry has been updated.",
					  icon: "success"
				});
			} else {
				swalWithBootstrapButtons.fire({
				  title: "Something went wrong!",
				  text: "Please try again or contact admin.",
				  icon: "error"
				});
			}            
        }
    });
});

$(document).on("click", '.deleteentry', function(event) {
	var idtodelete = $(this).attr('id');
	const swalWithBootstrapButtons = Swal.mixin({
	  customClass: {
		confirmButton: "btn btn-success",
		cancelButton: "btn btn-danger"
	  },
	  buttonsStyling: false
	});
	swalWithBootstrapButtons.fire({
		title: "Are you sure want to delete?",
		text: "You won't be able to revert this!",
		icon: "warning",
		showCancelButton: true,
		confirmButtonText: "Yes, delete it!",
		cancelButtonText: "No, cancel!",
		reverseButtons: true
	}).then((result) => {
	  if (result.isConfirmed) {
		$('.loader').show(); 
		var data = {
			"_token": $('#token').val(),
			"idtodelete": idtodelete
		};
		
		$.ajax( {
			type: 'POST',
			url: 'deleteentry',
			data: data,
			success: function(response) {
				$('.loader').hide(); 
				if(response == 'success'){
					$('#myjournalDashboard').DataTable().destroy();
					getentriesajax();
					swalWithBootstrapButtons.fire({
						  title: "Deleted!",
						  text: "Entry has been deleted.",
						  icon: "success"
					});
				} else {
					swalWithBootstrapButtons.fire({
					  title: "Something went wrong!",
					  text: "Please try again or contact admin.",
					  icon: "error"
					});
				}            
			}
		});
	  } else if (
		/* Read more about handling dismissals below */
		result.dismiss === Swal.DismissReason.cancel
	  ) {
		
	  }
	});
});

$('#addNewEntry').on('click', function (event) {
    var moodSelected = $('input[name="mood"]:checked').val();
    if (typeof moodSelected === 'undefined') {
        // Prevent the modal from switching to the next one
        event.preventDefault();

        // Dynamically create toast HTML if it doesn't exist
        if ($('#moodToast').length === 0) {
            $('body').append(`
                <div class="toast align-items-center text-bg-danger border-0" id="moodToast" role="alert" aria-live="assertive" aria-atomic="true" style="position: fixed; left: 0; right: 0; top: 10px; margin: 0 auto; ">
                  <div class="d-flex">
                    <div class="toast-body">
                      Please select a mood before proceeding.
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                  </div>
                </div>
            `);
        }

        // Show the toast message
        var toastElement = new bootstrap.Toast($('#moodToast')); // Initialize Bootstrap toast
        toastElement.show(); // Show the toast
    } else {
		var selectedmood = $('input[name="mood"]:checked').attr('id');
		$('#selectedmood').val(selectedmood);
        // If a mood is selected, manually show the next modal
        $('#addReminder-entry-question-popup').modal('hide'); // Hide current modal
        $('#add-entry-question-popup').modal('show'); // Show the next modal
		getselectedmood();		
    }
});

function getmoodbyid(selectedmood) {	
	if(selectedmood == '1'){
		var icon = '😊';
	} else if(selectedmood == '2'){
		var icon = '😌';
	} else if(selectedmood == '3'){
		var icon = '😄';
	} else if(selectedmood == '4'){
		var icon = '🙂';
	} else if(selectedmood == '5'){
		var icon = '😇';
	} else if(selectedmood == '6'){
		var icon = '😐';
	} else if(selectedmood == '7'){
		var icon = '🤔';
	} else if(selectedmood == '8'){
		var icon = '😟';
	} else if(selectedmood == '9'){
		var icon = '😔';
	} else if(selectedmood == '10'){
		var icon = '😣';
	} else if(selectedmood == '11'){
		var icon = '😤';
	} else if(selectedmood == '12'){
		var icon = '😴';
	} else {
		var icon = '😠';
	}
	var html = 'Mood Status: '+icon;
	return html;
}

function getselectedmood() {
	var selectedmood = $('#selectedmood').val();
		if(selectedmood == '1_Happy'){
			var icon = '😊';
		} else if(selectedmood == '2_Relaxed'){
			var icon = '😌';
		} else if(selectedmood == '3_Excited'){
			var icon = '😄';
		} else if(selectedmood == '4_Satisfied'){
			var icon = '🙂';
		} else if(selectedmood == '5_Grateful'){
			var icon = '😇';
		} else if(selectedmood == '6_Neutral'){
			var icon = '😐';
		} else if(selectedmood == '7_Thoughtful'){
			var icon = '🤔';
		} else if(selectedmood == '8_Worried'){
			var icon = '😟';
		} else if(selectedmood == '9_Sad'){
			var icon = '😔';
		} else if(selectedmood == '10_Stressed'){
			var icon = '😣';
		} else if(selectedmood == '11_Frustrated'){
			var icon = '😤';
		} else if(selectedmood == '12_Tired'){
			var icon = '😴';
		} else {
			var icon = '😠';
		}
		$('.showicon').html('Mood: '+icon);
}
$('#addNewEntryStep').on('click', function (event) {
    var moodSelected = $('input[name="select-mood"]:checked').val();
    var reflectionSelected = $('input[name="select-mood"]:checked').attr('id');

    if (typeof moodSelected === 'undefined') {
        // Prevent the modal from switching to the next one
        event.preventDefault();
        // Dynamically create toast HTML if it doesn't exist
        if ($('#moodToastStep2').length === 0) {
            $('body').append(`
                <div class="toast align-items-center text-bg-danger border-0" id="moodToastStep2" role="alert" aria-live="assertive" aria-atomic="true" style="position: fixed; left: 0; right: 0; top: 10px; margin: 0 auto; ">
                  <div class="d-flex">
                    <div class="toast-body">
                      Please select any value before proceeding.
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                  </div>
                </div>
            `);
        }

        // Show the toast message
        var toastElement = new bootstrap.Toast($('#moodToastStep2')); // Initialize Bootstrap toast
        toastElement.show(); // Show the toast
    } else {
        // If a mood is selected, manually show the next modal
		
        $('#add-entry-question-popup').modal('hide');
		$('#entryoption').val(reflectionSelected);
        if (reflectionSelected === 'reflection') {
            $('#add-entry-reflection-popup').modal('show');
			
            setTimeout(function () {
                $('#ai-reminder-loader').attr('style', 'display: none !important;');
                $('#ai-suggestion').attr('style', 'display: flex !important;');
            }, 3000);
        } else if (reflectionSelected === 'gratitude') {
            $('#add-entry-gratitude-popup').modal('show');
        } else if (reflectionSelected === 'goal') {
            $('#add-entry-goal-popup').modal('show');
        } else if (reflectionSelected === 'action-item') {
            $('#add-entry-actionItem-popup').modal('show');
        }

    }
});


function showSelectedReflection() {
    // Hide all reflection divs first
    $('#question-daily, #question-weekly, #question-monthly, #question-daily-goal, #question-weekly-goal, #question-monthly-goal, #question-daily-action, #question-weekly-action, #question-monthly-action').hide();
	
	var entryselected = $('#entryoption').val(); 
	if(entryselected == 'reflection') {
		if ($('#dailyReflection').is(':checked')) {
			$('#dailyRef').val('dailyReflection');
		} else if ($('#weeklyReflection').is(':checked')) {
			$('#dailyRef').val('weeklyReflection');
		} else if ($('#monthlyReflection').is(':checked')) {
			$('#dailyRef').val('monthlyReflection');
		}
	} else if(entryselected == 'gratitude') {
		//do nothing
	} else if(entryselected == 'goal') {
		if ($('#dailyGoal').is(':checked')) {
			$('#dailyRef').val('dailyGoal');
		} else if ($('#weeklyGoal').is(':checked')) {
			$('#dailyRef').val('weeklyGoal');
		} else {
			$('#dailyRef').val('monthlyGoal');
		}			
	}
	if(entryselected == 'action-item') {
		//do nothing
	}
    // Show the corresponding div based on the selected radio button
    if ($('#dailyReflection').is(':checked')) {
        $('#question-daily').show();
		
    } else if ($('#weeklyReflection').is(':checked')) {
        $('#question-weekly').show();
        setTimeout(function () {
            $('#ai-reminder-loader-weekly').attr('style', 'display: none !important;');
            $('#ai-suggestion-weekly').attr('style', 'display: flex !important;');
        }, 2000);
		
    } else if ($('#monthlyReflection').is(':checked')) {
        $('#question-monthly').show();
        setTimeout(function () {
            $('#ai-reminder-loader-monthly').attr('style', 'display: none !important;');
            $('#ai-suggestion-monthly').attr('style', 'display: flex !important;');
        }, 2000);
		
    }

    if ($('#dailyGoal').is(':checked')) {
        $('#question-daily-goal').show();
		
    } else if ($('#weeklyGoal').is(':checked')) {
        $('#question-weekly-goal').show();
		
    } else if ($('#monthlyGoal').is(':checked')) {
        $('#question-monthly-goal').show();		
    }

    if ($('#weeklyAction').is(':checked')) {
        $('#question-weekly-action').show();		
    } else if ($('#monthlyAction').is(':checked')) {
        $('#question-monthly-action').show();		
    } else {
		$('#question-daily-action').show();
	}
}

// Call the function initially to set the correct view
showSelectedReflection();

// Listen for changes on the radio buttons
$('input[name="selected-reflection"]').change(function () {
    showSelectedReflection();
});

$('input[name="selected-goal"]').change(function () {
    showSelectedReflection();
});
$('input[name="selected-action"]').change(function () {
    showSelectedReflection();
});

function filterBy() { 
	//first check the selected entryoption
	var entryselected = $('#entryoption').val(); 
	if(entryselected == 'reflection') {
		//check if daily, weekly, monthly
		var selectedfrequency = $('#dailyRef').val();
		 
		if(selectedfrequency == 'weeklyReflection') {
			var dataString = $("#entryform, #reflectionQuestionFormWeekly").serialize();
		} else if(selectedfrequency == 'monthlyReflection') {
			var dataString = $("#entryform, #reflectionQuestionFormMonthly").serialize();
		} else {
			var dataString = $("#entryform, #reflectionQuestionFormDaily").serialize();
		}
	}
	if(entryselected == 'gratitude') {
		var dataString = $("#entryform, #addQuestion-gratitude").serialize();
	}
	if(entryselected == 'goal') {
		var selectedfrequency = $('#dailyRef').val();
		 
		if(selectedfrequency == 'weeklyGoal') {
			var dataString = $("#entryform, #goalQuestionFormWeekly").serialize();
		} else if(selectedfrequency == 'monthlyGoal') {
			var dataString = $("#entryform, #goalQuestionFormMonthly").serialize();
		} else {
			var dataString = $("#entryform, #goalQuestionFormDaily").serialize();
		}
	}
	if(entryselected == 'action-item') {
		var dataString = $("#entryform, #actionQuestionFormDaily").serialize();
	}  

    // Log in console so you can see the final serialized data sent to AJAX
    $('.loader').show(); 
	var data = {
        "_token": $('#token').val(),
        "dataString": dataString
    };
    // Do AJAX
    $.ajax( {
        type: 'POST',
        url: 'addmyjournal',
        data: data,
        success: function(response) {
			$('.loader').hide(); 
            if(response == 'success'){
				$('#myjournalDashboard').DataTable().destroy();
				successshown();
			}            
        }
    });
}

$('#celebrateButton, #celebrateButtonGratitude, #celebrateButtonGoal, #celebrateButtonAction').on('click', function () {
	
	//var selectedfrequency = $('input[name="selected-frequency"]:checked').attr('id');
	filterBy();
	// return;
	
       
});

function successshown() {
	makeItRain();
	$('.btn-check').prop('checked', false);
    $('#add-entry-reflection-popup').modal('hide');
    $('#add-entry-gratitude-popup').modal('hide');
    $('#add-entry-goal-popup').modal('hide');
    $('#add-entry-actionItem-popup').modal('hide');
	$('#entryform')[0].reset();
	$('#reflectionQuestionFormDaily')[0].reset();
	$('#reflectionQuestionFormWeekly')[0].reset();
	$('#reflectionQuestionFormMonthly')[0].reset();
	$('#addQuestion-gratitude')[0].reset();
	$('#goalQuestionFormWeekly')[0].reset();
	$('#goalQuestionFormMonthly')[0].reset();
	$('#goalQuestionFormDaily')[0].reset();
	$('#actionQuestionFormDaily')[0].reset();
	
    $('body').append(`
        <div class="toast align-items-center text-white text-bg-success-light-info border-0" id="moodToastStep3" role="alert" aria-live="assertive" aria-atomic="true" style="position: fixed; left: 0; right: 0; top: 10px; margin: 0 auto; ">
          <div class="d-flex">
            <div class="toast-body d-flex align-items-center justify-content-center gap-2">
             <i class="material-icons">task_alt</i> Entry Added Successfully
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
        </div>
    `);


    var toastEl = document.getElementById('moodToastStep3');
    var toast = new bootstrap.Toast(toastEl);
    toast.show();
	getentriesajax();
}

function makeItRain() {
    
    const duration = 6 * 1000,
    animationEnd = Date.now() + duration,
    defaults = { startVelocity: 30, spread: 360, ticks: 60, zIndex: 99999 };

    // All colors for the confetti
    const colors = ['#FF2900', '#0046FF', '#FFB100', '#00FFF8', '#FF00FF', '#00FF00', '#0000FF', '#FFFF00'];

    // Create an overlay for the full-screen effect
    const overlay = document.createElement('div');
    overlay.style.position = 'fixed';
    overlay.style.top = '0';
    overlay.style.left = '0';
    overlay.style.width = '100%';
    overlay.style.height = '100%';
    overlay.style.backgroundColor = 'rgba(255, 255, 255, 0.8)'; // Semi-transparent black
    overlay.style.zIndex = '999'; // Just below the confetti
    document.body.appendChild(overlay);

    function randomInRange(min, max) {
        return Math.random() * (max - min) + min;
    }

    const interval = setInterval(function() {
        const timeLeft = animationEnd - Date.now();

        if (timeLeft <= 0) {
            overlay.remove(); // Remove overlay after animation ends
            return clearInterval(interval);
        }

        const particleCount = 50 * (timeLeft / duration);

        // since particles fall down, start a bit higher than random
        confetti(
            Object.assign({}, defaults, {
                particleCount,
                origin: { x: randomInRange(0.1, 0.3), y: Math.random() - 0.2 },
                colors: colors
            })
        );
        confetti(
            Object.assign({}, defaults, {
                particleCount,
                origin: { x: randomInRange(0.7, 0.9), y: Math.random() - 0.2 },
                colors: colors
            })
        );
    }, 250);
}


// chat bot js

$('#chatbotEvidentra').on('click', function() {
    $('.chatbot-container').addClass('show');
    $('#chat-content').removeClass('collapsed');
    $('.chatbot-footer').removeClass('collapsed');
    $('#highlight-content').removeClass('collapsed');
    $('.chatbot-content').removeClass('collapsed'); 
    $(this).hide();
});
$('#hideChatbot').on('click', function() {
    $('.chatbot-content').toggleClass('collapsed');
    $('.chatbot-footer').toggleClass('collapsed');
});
$('#closeChatbot').on('click', function() {
    $('.chatbot-container').removeClass('show');
    $('#chatbotEvidentra').show(); 
   
});
$('#showCashChatbot').on('click', function() {
    $('#highlight-content').css('display', 'flex');
    $('#backtoChat').css('display', 'flex');
    $('#chat-content').css('display', 'none');
    $('#showCashChatbot').css('display', 'none');
    $('#backtoChatIcon').css('display', 'none');
    $('.chatbot-content').removeClass('collapsed');    
    $('.chatbot-footer').each(function() {
        this.style.setProperty('display', 'none', 'important');
    });
});

$('#backtoChat').on('click', function() {
    $('#backtoChat').css('display', 'none');
    $('#highlight-content').css('display', 'none');
    $('#chat-content').css('display', 'block');
    $('#showCashChatbot').css('display', 'block');
    $('#backtoChatIcon').css('display', 'flex');
    $('.chatbot-footer').css('display', 'flex');
   
})

const $tooltip = $('#copy-tooltip');

        $('#chat-content').on('mouseup', function (event) {
            const selectedText = window.getSelection().toString().trim();
            if (selectedText) {
                // Get the position of the mouse click
                const mouseX = event.pageX;
                const mouseY = event.pageY;
                
                // Show tooltip near the cursor
                $tooltip.css({
                    left: mouseX + 5,
                    top: mouseY + 1,
                    display: 'flex'
                });
            } else {
                $tooltip.hide(); // Hide tooltip if no text is selected
            }
        });

        // Copy text to clipboard when tooltip is clicked
        $tooltip.on('click', function () {
            $tooltip.hide();
            const selectedText = window.getSelection().toString();
            if (selectedText) {
                navigator.clipboard.writeText(selectedText).then(() => {
                    // alert('Text copied: ' + selectedText); // Show alert with copied text
                    $tooltip.hide(); // Hide the tooltip after copying
                });
            }
        });

        // Hide the tooltip when clicking elsewhere
        $(document).on('click', function (event) {
            if (!$(event.target).closest('#copy-tooltip, #chat-content').length) {
                $tooltip.hide();
            }
        });

var page = $('#pagename').val();
if(page == 'myjournal') {
	getentriesajax();
}

function scrollToContent(contentId, tabId, tabContentId) {
		// Select the target tab and content
		const targetTab = document.querySelector(tabId);
		const targetContent = document.querySelector(tabContentId);

		if (targetTab && targetContent) {
			// Activate the target tab
			const bootstrapTab = new bootstrap.Tab(targetTab);
			bootstrapTab.show();

			// Scroll to the desired section within the tab content
			const content = document.querySelector(contentId);
			if (content) {
				const offset = 75; // Offset from the top
				const elementPosition = content.getBoundingClientRect().top;
				const offsetPosition = elementPosition + window.pageYOffset - offset;

				window.scrollTo({
					top: offsetPosition,
					behavior: 'smooth'
				});
			}
		}
	}

function showContentcp(type) {
	var previoustab = $('#selectedtab').val();
	$('#selectedtab').val(type);
	$('#myTabContent').html('');
	$('.loader').show();
	var dataString = $("#eqform").serialize();				
	var data = {
		"_token": $('#token').val(),
		"dataString": dataString
	};
	$.ajax( {
		type: 'POST',
		url: 'getcpreportcontent',
		data: data,
		datatype: 'json',
		success: function(result) {
			$('.loader').hide(); 
			$('#myTabContent').html(result);
			$('.menu-btn a').removeClass('active');
			if(type == 'introduction') {
				$('#introductioncp a').addClass('active');
				$('#careeroccupation .material-icons').eq(0).show();
				$('#eqskillstab .material-icons').eq(0).show();
				$('#globalinterestarea .material-icons').eq(0).show();
				$('#careerexploration .material-icons').eq(0).show();
				$('#careeroccupation').find('.dropdown-menu').removeClass('show');
				$('#careeroccupation').find('.dropdown-menu').addClass('hide');
				$('#eqskillstab').find('.dropdown-menu').removeClass('show');
				$('#eqskillstab').find('.dropdown-menu').addClass('hide');
				$('#globalinterestarea').find('.dropdown-menu').removeClass('show');
				$('#globalinterestarea').find('.dropdown-menu').addClass('hide');
				$('#careerexploration').find('.dropdown-menu').removeClass('show');
				$('#careerexploration').find('.dropdown-menu').addClass('hide');
			} else if(type == 'introductioncp') {
				$('#introductioncp a').addClass('active');
				$('#careeroccupation .material-icons').eq(0).show();
				$('#eqskillstab .material-icons').eq(0).show();
				$('#globalinterestarea .material-icons').eq(0).show();
				$('#careerexploration .material-icons').eq(0).show();
				$('#careeroccupation').find('.dropdown-menu').removeClass('show');
				$('#careeroccupation').find('.dropdown-menu').addClass('hide');
				$('#eqskillstab').find('.dropdown-menu').removeClass('show');
				$('#eqskillstab').find('.dropdown-menu').addClass('hide');
				$('#globalinterestarea').find('.dropdown-menu').removeClass('show');
				$('#globalinterestarea').find('.dropdown-menu').addClass('hide');
				$('#careerexploration').find('.dropdown-menu').removeClass('show');
				$('#careerexploration').find('.dropdown-menu').addClass('hide');
			} else if(type == 'occupationalcodes') {
				$('#occupationalcodes a').addClass('active');
				$('#careeroccupation .material-icons').eq(0).show();
				$('#eqskillstab .material-icons').eq(0).show();
				$('#globalinterestarea .material-icons').eq(0).show();
				$('#careerexploration .material-icons').eq(0).show();
				$('#careeroccupation').find('.dropdown-menu').removeClass('show');
				$('#careeroccupation').find('.dropdown-menu').addClass('hide');
				$('#eqskillstab').find('.dropdown-menu').removeClass('show');
				$('#eqskillstab').find('.dropdown-menu').addClass('hide');
				$('#globalinterestarea').find('.dropdown-menu').removeClass('show');
				$('#globalinterestarea').find('.dropdown-menu').addClass('hide');
				$('#careerexploration').find('.dropdown-menu').removeClass('show');
				$('#careerexploration').find('.dropdown-menu').addClass('hide');
			} else if(type == 'careerbasics') {
				$('#careerbasics a').addClass('active');
				$('#careeroccupation .material-icons').eq(0).show();
				$('#eqskillstab .material-icons').eq(0).show();
				$('#globalinterestarea .material-icons').eq(0).show();
				$('#careerexploration .material-icons').eq(0).show();
				$('#careeroccupation').find('.dropdown-menu').removeClass('show');
				$('#careeroccupation').find('.dropdown-menu').addClass('hide');
				$('#eqskillstab').find('.dropdown-menu').removeClass('show');
				$('#eqskillstab').find('.dropdown-menu').addClass('hide');
				$('#globalinterestarea').find('.dropdown-menu').removeClass('show');
				$('#globalinterestarea').find('.dropdown-menu').addClass('hide');
				$('#careerexploration').find('.dropdown-menu').removeClass('show');
				$('#careerexploration').find('.dropdown-menu').addClass('hide');
			} else if(type == 'gia-tab') {
				$('#gia-tab a').addClass('active');
				$('#careeroccupation .material-icons').eq(0).show();
				$('#eqskillstab .material-icons').eq(0).show();
				$('#globalinterestarea .material-icons').eq(0).show();
				$('#careerexploration .material-icons').eq(0).show();
				$('#careeroccupation').find('.dropdown-menu').removeClass('show');
				$('#careeroccupation').find('.dropdown-menu').addClass('hide');
				$('#eqskillstab').find('.dropdown-menu').removeClass('show');
				$('#eqskillstab').find('.dropdown-menu').addClass('hide');
				$('#globalinterestarea').find('.dropdown-menu').removeClass('show');
				$('#globalinterestarea').find('.dropdown-menu').addClass('hide');
				$('#careerexploration').find('.dropdown-menu').removeClass('show');
				$('#careerexploration').find('.dropdown-menu').addClass('hide');
			} else if(type == 'careeroccupation') {
				$('#careeroccupation .material-icons').eq(0).hide();
				$('#eqskillstab .material-icons').eq(0).show();		
				$('#globalinterestarea .material-icons').eq(0).show();
				$('#careerexploration .material-icons').eq(0).show();				
				$('#careeroccupation a').eq(0).addClass('active');	
				$('#careeroccupation').find('.dropdown-menu').removeClass('hide');
				$('#careeroccupation').find('.dropdown-menu').addClass('show');
				$('#eqskillstab').find('.dropdown-menu').removeClass('show');
				$('#eqskillstab').find('.dropdown-menu').addClass('hide');
				$('#globalinterestarea').find('.dropdown-menu').removeClass('show');
				$('#globalinterestarea').find('.dropdown-menu').addClass('hide');
				$('#careerexploration').find('.dropdown-menu').removeClass('show');
				$('#careerexploration').find('.dropdown-menu').addClass('hide');
			} else if(type == 'eqskillstab') {
				$('#eqskillstab .material-icons').eq(0).hide();	
				$('#careeroccupation .material-icons').eq(0).hide();
				$('#globalinterestarea .material-icons').eq(0).show();
				$('#careerexploration .material-icons').eq(0).show();
				$('#eqskillstab a').eq(0).addClass('active');	
				$('#eqskillstab').find('.dropdown-menu').removeClass('hide');
				$('#eqskillstab').find('.dropdown-menu').addClass('show');
				$('#careeroccupation').find('.dropdown-menu').removeClass('show');
				$('#careeroccupation').find('.dropdown-menu').addClass('hide');
				$('#globalinterestarea').find('.dropdown-menu').removeClass('show');
				$('#globalinterestarea').find('.dropdown-menu').addClass('hide');
				$('#careerexploration').find('.dropdown-menu').removeClass('show');
				$('#careerexploration').find('.dropdown-menu').addClass('hide');
			} else if(type == 'globalinterestarea') {
				$('#globalinterestarea .material-icons').eq(0).hide();	
				$('#careeroccupation .material-icons').eq(0).show();
				$('#eqskillstab .material-icons').eq(0).show();	
				$('#careerexploration .material-icons').eq(0).show();
				$('#globalinterestarea a').eq(0).addClass('active');	
				$('#globalinterestarea').find('.dropdown-menu').removeClass('hide');
				$('#globalinterestarea').find('.dropdown-menu').addClass('show');
				$('#careeroccupation').find('.dropdown-menu').removeClass('show');
				$('#careeroccupation').find('.dropdown-menu').addClass('hide');
				$('#eqskillstab').find('.dropdown-menu').removeClass('show');
				$('#eqskillstab').find('.dropdown-menu').addClass('hide');
				$('#careerexploration').find('.dropdown-menu').removeClass('show');
				$('#careerexploration').find('.dropdown-menu').addClass('hide');
			} else if(type == 'careerexploration') {
				$('#careerexploration .material-icons').eq(0).hide();	
				$('#careeroccupation .material-icons').eq(0).show();
				$('#eqskillstab .material-icons').eq(0).show();	
				$('#globalinterestarea .material-icons').eq(0).show();
				$('#careerexploration a').eq(0).addClass('active');	
				$('#careerexploration').find('.dropdown-menu').removeClass('hide');
				$('#careerexploration').find('.dropdown-menu').addClass('show');
				$('#careeroccupation').find('.dropdown-menu').removeClass('show');
				$('#careeroccupation').find('.dropdown-menu').addClass('hide');
				$('#eqskillstab').find('.dropdown-menu').removeClass('show');
				$('#eqskillstab').find('.dropdown-menu').addClass('hide');
				$('#globalinterestarea').find('.dropdown-menu').removeClass('show');
				$('#globalinterestarea').find('.dropdown-menu').addClass('hide');
			}	
		}
	});
}

function showContent(type) {
			var previoustab = $('#selectedtab').val();
			$('#selectedtab').val(type);
			$('#myTabContent').html('');
			$('.loader').show();
			var dataString = $("#eqform").serialize();				
			var data = {
				"_token": $('#token').val(),
				"dataString": dataString
			};
			
			$.ajax( {
				type: 'POST',
				url: 'getreportcontent',
				data: data,
				datatype: 'json',
				success: function(result) {
					$('.loader').hide(); 
					$('#myTabContent').html(result);
					$('.menu-btn a').removeClass('active');
					// alert(type);
					if(type == 'introduction') {
						$('#introduction a').addClass('active');
					} else if(type == 'understanding-self-report') {
						$('#understanding-self-report a').eq(0).addClass('active');
						
						$('#eqskills').find('.dropdown-menu').removeClass('show');
						$('#eqskills').find('.dropdown-menu').addClass('hide');
						
						$('#eq-dimension-competencies').find('.dropdown-menu').removeClass('show');
						$('#eq-dimension-competencies').find('.dropdown-menu').addClass('hide');
						
						$('#interpretingtab').find('.dropdown-menu').removeClass('show');
						$('#interpretingtab').find('.dropdown-menu').add('hide');
						
						$('#eqdimensioncompetencies').find('.dropdown-menu').removeClass('show');
						$('#eqdimensioncompetencies').find('.dropdown-menu').addClass('hide');
						
						$('#actiontips').find('.dropdown-menu').removeClass('show');
						$('#actiontips').find('.dropdown-menu').addClass('hide');
						
						$('#understanding-self-report').find('.dropdown-menu').addClass('show');
						$('#understanding-self-report').find('.dropdown-menu').removeClass('hide');
					
					} else if(type == 'eqskills') {
						$('#eqskills a').eq(0).addClass('active');	
						$('#eqskills').find('.dropdown-menu').removeClass('hide');
						$('#eqskills').find('.dropdown-menu').addClass('show');
						
						$('#eq-dimension-competencies').find('.dropdown-menu').removeClass('show');
						$('#eq-dimension-competencies').find('.dropdown-menu').addClass('hide');
						
						$('#interpretingtab').find('.dropdown-menu').removeClass('show');
						$('#interpretingtab').find('.dropdown-menu').addClass('hide');
						
						$('#eqdimensioncompetencies').find('.dropdown-menu').removeClass('show');
						$('#eqdimensioncompetencies').find('.dropdown-menu').addClass('hide');
						
						$('#actiontips').find('.dropdown-menu').removeClass('show');
						$('#actiontips').find('.dropdown-menu').addClass('hide');
						
						$('#understanding-self-report').find('.dropdown-menu').removeClass('show');
						$('#understanding-self-report').find('.dropdown-menu').addClass('hide');
					} else if(type == 'interpretingtab') {
						$('#interpretingtab a').eq(0).addClass('active');	
						
						$('#eqskills').find('.dropdown-menu').removeClass('show');
						$('#eqskills').find('.dropdown-menu').addClass('hide');
						
						$('#eq-dimension-competencies').find('.dropdown-menu').removeClass('show');
						$('#eq-dimension-competencies').find('.dropdown-menu').addClass('hide');
						
						$('#interpretingtab').find('.dropdown-menu').addClass('show');
						$('#interpretingtab').find('.dropdown-menu').removeClass('hide');
						
						$('#eqdimensioncompetencies').find('.dropdown-menu').removeClass('show');
						$('#eqdimensioncompetencies').find('.dropdown-menu').addClass('hide');
						
						$('#actiontips').find('.dropdown-menu').removeClass('show');
						$('#actiontips').find('.dropdown-menu').addClass('hide');
						
						$('#understanding-self-report').find('.dropdown-menu').removeClass('show');
						$('#understanding-self-report').find('.dropdown-menu').addClass('hide');
					
					} else if(type == 'your-report-result') {
						$('#your-report-result a').eq(0).addClass('active');						
					} else if(type == 'eqdimensioncompetencies') {
						$('#eqdimensioncompetencies a').eq(0).addClass('active');

						$$('#eqskills').find('.dropdown-menu').removeClass('show');
						$('#eqskills').find('.dropdown-menu').addClass('hide');
						
						$('#eq-dimension-competencies').find('.dropdown-menu').removeClass('show');
						$('#eq-dimension-competencies').find('.dropdown-menu').addClass('hide');
						
						$('#interpretingtab').find('.dropdown-menu').removeClass('show');
						$('#interpretingtab').find('.dropdown-menu').add('hide');
						
						$('#eqdimensioncompetencies').find('.dropdown-menu').addClass('show');
						$('#eqdimensioncompetencies').find('.dropdown-menu').removeClass('hide');
						
						$('#actiontips').find('.dropdown-menu').removeClass('show');
						$('#actiontips').find('.dropdown-menu').addClass('hide');
						
						$('#understanding-self-report').find('.dropdown-menu').removeClass('show');
						$('#understanding-self-report').find('.dropdown-menu').addClass('hide');						
					} else if(type == 'actiontips') {
						$('#actiontips a').eq(0).addClass('active');	
						
						$('#eqskills').find('.dropdown-menu').removeClass('show');
						$('#eqskills').find('.dropdown-menu').addClass('hide');
						
						$('#eq-dimension-competencies').find('.dropdown-menu').removeClass('show');
						$('#eq-dimension-competencies').find('.dropdown-menu').addClass('hide');
						
						$('#interpretingtab').find('.dropdown-menu').removeClass('show');
						$('#interpretingtab').find('.dropdown-menu').add('hide');
						
						$('#eqdimensioncompetencies').find('.dropdown-menu').removeClass('show');
						$('#eqdimensioncompetencies').find('.dropdown-menu').addClass('hide');
						
						$('#actiontips').find('.dropdown-menu').addClass('show');
						$('#actiontips').find('.dropdown-menu').removeClass('hide');
						
						$('#understanding-self-report').find('.dropdown-menu').removeClass('show');
						$('#understanding-self-report').find('.dropdown-menu').addClass('hide');
					} else if(type == 'references') {
						$('#references a').eq(0).addClass('active');						
					}         
				}
			});
	
			// $content.hide().filter('.' + type).show();
		}
		
function getentriesajax() {	
		$('.loader').show(); 
		let requestBody = {
            "_token": $('#token').val()
            // jobType: jobType,
        }
		
		$.ajax({
            method: "POST",
            url: "getentries",
            data: requestBody,
            datatype: 'json',
            success: function(result) {
                $('.loader').hide(); 
                $('#myjournalDashboard').html(result);
				$('#myjournalDashboard').DataTable({
					paging: true,
					searching: true,
					ordering: false,
					pageLength: 10, // Cards per page
					lengthChange: false,
					info: true,
					"language": {
						search: "",
						"paginate": {
							"previous": '<i class="material-icons">chevron_left</i>',
							"next": '<i class="material-icons">chevron_right</i>',                   
						},
						"info": "Show <b>_START_</b> to <b>_END_</b> of <b>_TOTAL_</b> result" // Custom info text
					},
					initComplete: function() {
					  // Add the search icon and placeholder text
					  var searchInput = $('#myjournalDashboard_filter input');
					  
					  // Add the placeholder
					  searchInput.attr('placeholder', 'Search here')
						.addClass('form-control position-relative form-control ps-4 outline-0'); // Add Bootstrap styling and relative position
				  
					  // Add the Material icon inside the search input
					  searchInput.wrap('<div class="position-relative comman-form"></div>'); // Wrap the input for positioning
					  searchInput.before('<i class="material-icons position-absolute top-50 start-10 translate-middle">search</i>'); // Add the icon
				   
					}
				  });
				  // $('#myjournalDashboard').DataTable().ajax.reload();
            }
        });
		
		function toggleDropdown(event) {
            event.stopPropagation(); // Prevent the event from bubbling up to parent elements
        
            const dropdownMenu = event.target.closest('.nav-item').querySelector('.dropdown-menu');
        
            // Toggle the 'show' class
            dropdownMenu.classList.toggle('show');
        
            // Close the dropdown if clicking outside
            document.addEventListener('click', function closeDropdown(e) {
                if (!dropdownMenu.contains(e.target) && e.target !== event.target) {
                    dropdownMenu.classList.remove('show');
                    document.removeEventListener('click', closeDropdown);
                }
            });
        }
}	
		