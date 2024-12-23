
<?php

use Illuminate\Support\Facades\Auth;
use App\Models\Notifications;

$notificationsObj = new Notifications;
$user = Auth::user();
$firstName = $user->first_name;
$lastName = $user->last_name;
$nameInitials = ucwords(substr(Auth::user()->name,0,1).''.substr($lastName,0,1)); 
$notificationsCount = $notificationsObj->getNotificationcount();
$notiCount = $notificationsCount->total;

$notifications = $notificationsObj->getNotifications();

?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
		<link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
		<link href="{{ asset('css/style.css') }}" rel="stylesheet" />
		<link href="{{ asset('plugin/bootstrap-datepicker-1.9.0-dist/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
		<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
		<link href="{{ asset('plugin/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap"
    rel="stylesheet" />
		<link href="{{ asset('css/datatables.css') }}" rel="stylesheet" />
		<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css" rel="stylesheet">
		
		<script>
    /*to prevent Firefox FOUC, this must be here*/
    let FF_FOUC_FIX;
  </script>
    </head>
    <body>
		<header class="navbar sticky-top flex-nowrap shadow" id="top-header">
		<a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">
		  <img src="{{ asset('img/logo.svg') }}" width="149" height="auto" />
		</a>

    <div class="col-md-9 col-lg-10 d-flex justify-content-end relative px-3">
      <div class="header-right d-flex gap-3 flex-wrap">
        <a href="#">
          <img src="{{ asset('img/chatbot.svg') }}" width="24px" height="auto" />
        </a>
        <a href="#">
          <img src="{{ asset('img/circle-tick-icon.svg') }}" width="24px" height="auto" />
        </a>
        <a href="#">
          <img src="{{ asset('img/help-icon.svg') }}" width="24px" height="auto" />
        </a>
        <div class="dropdown notification">
          <a href="#" class="notification-icon" id="notificationDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <img src="{{ asset('img/notification-icon.svg') }}" width="24px" height="auto" alt="Notifications" />
          </a>
          <ul class="dropdown-menu dropdown-menu-end p-3 dropdown-submenu-container"
            aria-labelledby="notificationDropdown">
            <li class="d-flex align-items-center w-100 justify-content-between border-bottom pb-2"><span
                class="dropdown-header-text d-flex gap-2 align-items-center">Notifications <span
                  class="rounded-circle bg-danger fs-6 text-white">{{ $notiCount }}</span></span><a class="comman-link link-underline"
                href="javascript:void(0);">View all</a></li>
				<?php if($notifications) {
					foreach($notifications as $key => $value) {
						$notiType = $value->noti_type;
						$description = $value->description;
						if($notiType == 'userspecific') {
							$iconImage = 'img/notification-drop-icon.svg';
						} else if($notiType == 'evidentra') {
							$iconImage = 'img/chatbot.svg';
						}
					?>
					<li class="p-0"><a class="dropdown-item p-0" href="javascript:void(0);"><img src="{{ asset($iconImage) }}" width="20px" height="auto"> {{ $description }}</a></li>
					<?php
					}
				}
				?>
          </ul>
        </div>
        <div class="dropdown user-profile">
          <div class="user-profile-icon" id="userProfileDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <span class="material-icons fw-semibold">{{ $nameInitials; }}</span>
          </div>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userProfileDropdown">
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    Logout
</a>
<li>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
          </ul>
        </div>
        <button class="navbar-toggler position-relative d-md-none collapsed" type="button" data-bs-toggle="collapse"
          data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>

    </div>
  </header>
           <div class="container-fluid">
			<div class="row"> 
				
				 <x-sidebarmain.sidebar />
	  
            
                {{ $slot }}
            
			
			<x-sidebarmain.popups />
			
			<div class="chatbot-container position-fixed">
    <div class="chatbot-header d-flex align-items-center justify-content-between">
      <div class="left-side d-flex align-items-center gap-2">
        <span  id="backtoChatIcon"><i class="material-icons">keyboard_backspace</i> 🤖 Evidentra</span>
        <span id="backtoChat" style="display: none;"><i class="material-icons">keyboard_backspace</i> Highlighted Text</span>
      </div>
      <div class="right-side d-flex align-items-center gap-2">
        <a id="showCashChatbot" href="javascript:void(0)" class="open-chatbot text-black"><i
            class="material-icons">edit</i></a>
        <a id="hideChatbot" href="javascript:void(0)" class="close-chatbot text-black"><i
            class="material-icons">remove</i></a>
        <a id="closeChatbot" href="javascript:void(0)" class="close-chatbot text-black"><i
            class="material-icons">close</i></a>
      </div>
    </div>
    <!-- Chatbot content goes here -->
    <div class="chatbot-content" id="chat-content">
      <div class="chatbot-message-defult mb-3">
        <span class="chatbot-start">🤖</span>
        <p class="text-center mt-2 mb-0 ">AI Coach Assistance, our smart support bot, is here to help.</p>
      </div>

      <div class="chatbot-message d-flex gap-2  mt-3">
        <span class="chatbot-start-reply">🤖</span>
        <div class="chatbot-reply-text-wrapper d-flex flex-column gap-2">
          <p class="mt-0 mb-0 chatbot-reply-text">Hy!</p>
          <p class="mt-0 mb-0 chatbot-reply-text">How may I assist you?</p>
        </div>
      </div>
      <div class="chatbot-message d-flex gap-2 justify-content-end  mt-3">
        <div class="chatbot-reply-text-wrapper-user d-flex flex-column gap-2">
          <p class="mt-0 mb-0 chatbot-reply-text">I want to start working out more regularly, but I'm not sure where to
            begin.</p>
        </div>
      </div>
      <div class="chatbot-message d-flex gap-2 mt-3">
        <span class="chatbot-start-reply">🤖</span>
        <div class="chatbot-reply-text-wrapper d-flex flex-column gap-2">
          <p class="mt-0 mb-0 chatbot-reply-text">That's a great goal! Let’s break it down. How many days a week would
            you like to work out?</p>
        </div>
      </div>
      <div class="chatbot-message d-flex gap-2 justify-content-end  mt-3">
        <div class="chatbot-reply-text-wrapper-user d-flex flex-column gap-2">
          <p class="mt-0 mb-0 chatbot-reply-text">I want to start working out more regularly, but I'm not sure where to
            begin.</p>
          <p class="mt-0 mb-0 chatbot-reply-text">Maybe three times a week to start with.</p>
        </div>
      </div>
      <div class="chatbot-message d-flex gap-2 mt-3">
        <span class="chatbot-start-reply">🤖</span>
        <div class="chatbot-reply-text-wrapper d-flex flex-column gap-2">
          <p class="mt-0 mb-0 chatbot-reply-text">That's a great goal! Let’s break it down. How many days a week would
            you like to work out?</p>
        </div>
      </div>
      <div class="chatbot-message d-flex gap-2 justify-content-end  mt-3">
        <div class="chatbot-reply-text-wrapper-user d-flex flex-column gap-2">
          <p class="mt-0 mb-0 chatbot-reply-text">I want to start working out more regularly, but I'm not sure where to
            begin.</p>
        </div>
      </div>
      <div class="chatbot-message d-flex gap-2 mt-3">
        <span class="chatbot-start-reply">🤖</span>
        <div class="chatbot-reply-text-wrapper d-flex flex-column gap-2">
          <p class="mt-0 mb-0 chatbot-reply-text">That's a great goal! Let’s break it down. How many days a week would
            you like to work out?</p>
        </div>
      </div>
    </div>
    <div class="p-0 chatbot-content flex-column" style="display: none;" id="highlight-content">
      <div class="chatbot-no-message-highlight mb-3 d-flex align-items-center justify-content-center gap-2 flex-column h-100 d-none"><i
        class="material-icons">edit</i>
        No highlighted text
      </div>
      <div class="chatbot-content">
        <div class="chatbot-message-highlight d-flex gap-2 mt-3">
          <span class="chatbot-start-reply">🤖</span>
          <div class="chatbot-reply-text-wrapper d-flex flex-column">
            <p class="chatbot-name d-flex align-items-center justify-content-between">Evidentra <span class="chatbot-time d-flex gap-1 align-items-center">2 days ago <i class="material-icons">chevron_right</i></span></p>
            <p class="mt-0 mb-0 chatbot-reply-text">How many days a week would
              you like to work out?</p>
          </div>
        </div>
        <div class="chatbot-message-highlight d-flex gap-2 mt-3">
          <span class="chatbot-start-reply">🤖</span>
          <div class="chatbot-reply-text-wrapper d-flex flex-column">
            <p class="chatbot-name d-flex align-items-center justify-content-between">Evidentra <span class="chatbot-time d-flex gap-1 align-items-center">2 days ago <i class="material-icons">chevron_right</i></span></p>
            <p class="mt-0 mb-0 chatbot-reply-text">How many days a week would
              you like to work out?</p>
          </div>
        </div>
        <div class="chatbot-message-highlight d-flex gap-2 mt-3">
          <span class="chatbot-start-reply">🤖</span>
          <div class="chatbot-reply-text-wrapper d-flex flex-column">
            <p class="chatbot-name d-flex align-items-center justify-content-between">Evidentra <span class="chatbot-time d-flex gap-1 align-items-center">2 days ago <i class="material-icons">chevron_right</i></span></p>
            <p class="mt-0 mb-0 chatbot-reply-text">How many days a week would
              you like to work out?</p>
          </div>
        </div>
        <div class="chatbot-message-highlight d-flex gap-2 mt-3">
          <span class="chatbot-start-reply">🤖</span>
          <div class="chatbot-reply-text-wrapper d-flex flex-column">
            <p class="chatbot-name d-flex align-items-center justify-content-between">Evidentra <span class="chatbot-time d-flex gap-1 align-items-center">2 days ago <i class="material-icons">chevron_right</i></span></p>
            <p class="mt-0 mb-0 chatbot-reply-text">How many days a week would
              you like to work out?</p>
          </div>
        </div>
      </div>
    </div>
    <div class="chatbot-footer d-flex p-2">
      <textarea id="user-input" placeholder="Type your message..."></textarea>
      <button id="send-btn-chatbot"><i class="material-icons">send</i></button>
    </div>
  </div>
	
	<div class="chatbot position-fixed" id="chatbotEvidentra">
    🤖
    Ask Evidentra
  </div>
  <div class="tooltip" id="copy-tooltip"><i class="material-icons">edit</i> Highlight Text</div>
  
			 </div>
			</div>
			
		<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
		<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
		<script src="{{ asset('plugin/jquery-ui/jquery-ui.js') }}"></script>
		<script src="{{ asset('plugin/bootstrap-timepicker/js/bootstrap-timepicker.js') }}"></script>
		<script src="{{ asset('plugin/bootstrap-datepicker-1.9.0-dist/js/bootstrap-datepicker.min.js') }}"></script>
		<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.4.0/dist/confetti.browser.min.js"></script>
		<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
		<script src="{{ asset('js/custom.js') }}"></script>		
		<script src="{{ asset('js/reports.js') }}"></script>
		<script src="{{ asset('js/datatables.js') }}"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>
		<script>
		function getTime() {
			var dd = new Date();
			var hh = dd.getHours();

			if(hh > 11){
				$('.greetings').html("Good Afternoon");
			}else {
				$('.greetings').html("Good Morning");
			}

		}  

		getTime();			
		</script>
    </body>
</html>
