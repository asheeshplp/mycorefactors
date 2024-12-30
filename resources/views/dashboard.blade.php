<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

      <main class="col-md-12 ms-sm-auto col-lg-12 pb-5" id="main-wrapper">
        <div class="container-fluid px-3">
          <div class="note-container">
            <h1 class="text-center mb-0 text-black py-5 fw-bold greetings"></h1>
          </div>

          <div class="row mt-5">
            <h3 class="text-black-one fw-bold">Quick Actions</h3>
          </div>

          <div class="row p-0">
            <div class="col-md-3 col-lg-3 col-xl-2 col-sm-4 mb-lg-3 mb-md-3 mb-sm-3 mb-3 mb-xl-0">
              <div class="card">
                <div class="card-body bg-green text-center border-0 rounded dash-comman-box">
                  <div class="d-flex justify-content-center align-items-center">
                    <a href="#" class="text-decoration-none w-100">
                      <img src="{{ asset('img/explore-icon.svg') }}" width="50px" height="auto">
                      <p class="card-text text-white fw-bold mb-0">Explore Careers</p>
                    </a>

                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-3 col-lg-3 col-xl-2 col-sm-4 mb-lg-3 mb-md-3 mb-sm-3 mb-3 mb-xl-0">
              <div class="card">
                <div class="card-body bg-journal text-center border-0 rounded dash-comman-box">
                  <div class="d-flex justify-content-center align-items-center">
                    <a href="{{ url('myjournal') }}" class="text-decoration-none w-100">
                      <img src="{{ asset('img/book-icon.svg') }}" width="50px" height="auto">
                      <p class="card-text text-white fw-bold mb-0">My Journal</p>
                    </a>

                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-3 col-lg-3 col-xl-2 col-sm-4 mb-lg-3 mb-md-3 mb-sm-3 mb-3 mb-xl-0">
              <div class="card">
                <div class="card-body bg-you-report text-center border-0 rounded dash-comman-box">
                  <div class="d-flex justify-content-center align-items-center">
                    <a href="#" class="text-decoration-none w-100">
                      <img src="{{ asset('img/youreprot.png') }}" class="pb-0" width="50px" height="auto">
                      <p class="card-text text-white fw-bold mb-0">My YOU Report</p>
                    </a>

                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-3 col-lg-3 col-xl-2 col-sm-4 mb-lg-3 mb-md-3 mb-sm-3 mb-3 mb-xl-0">
              <div class="card">
                <div class="card-body bg-three text-center border-0 rounded dash-comman-box">
                  <div class="d-flex justify-content-center align-items-center">
                    <a href="#" class="text-decoration-none w-100">
                      <img src="{{ asset('img/explore-icon.svg') }}" width="50px" height="auto">
                      <p class="card-text text-white fw-bold mb-0">My YOU Report</p>
                    </a>

                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-3 col-lg-3 col-xl-2 col-sm-4 mb-lg-3 mb-md-3 mb-sm-3 mb-3 mb-xl-0">
              <div class="card">
                <div class="card-body bg-four text-center border-0 rounded dash-comman-box">
                  <div class="d-flex justify-content-center align-items-center">
                    <a href="#" class="text-decoration-none w-100">
                      <img src="{{ asset('img/explore-icon.svg') }}" width="50px" height="auto">
                      <p class="card-text text-white fw-bold mb-0">Explore Careers</p>
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-3 col-lg-3 col-xl-2 col-sm-4 mb-lg-3 mb-md-3 mb-sm-3 mb-3 mb-xl-0">
              <div class="card">
                <div class="card-body bg-five text-center border-0 rounded dash-comman-box">
                  <div class="d-flex justify-content-center align-items-center">
                    <a href="{{ url('careerexplorer') }}" class="text-decoration-none w-100">
                      <img src="{{ asset('img/explore-icon.svg') }}" width="50px" height="auto">
                      <p class="card-text text-white fw-bold mb-0">Explore Careers</p>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row mt-5">
            <h3 class="text-black-one  fw-bold">My Assessments</h3>
          </div>
			<?php 
			if($cresultCount > 0) {
				$crClass = 'bg-dark';
				$crhref	=	route('careerpath'); 
				$crimage = 'img/icon-careerpath.png';
			} else {
				$crClass = 'bg-gray';
				$crhref	=	'javascript:void(0);'; 
				$crimage = 'img/careerpath-icon.png';
			}
			?>
          <div class="row p-0">
            <div class="col-md-3 col-lg-3 col-xl-2 col-sm-4 mb-lg-3 mb-md-3 mb-sm-3 mb-3 mb-xl-0">
              <div class="card">
                <div class="card-body {{ $crClass }} text-center border-0 rounded dash-comman-box">
                  <div class="d-flex justify-content-center align-items-center">
                    <a href="{{ $crhref }}" class="text-decoration-none w-100">
                      <img src="{{ asset($crimage) }}" width="50px" height="auto">
                      <p class="card-text text-white fw-bold mb-0">Career Path</p>
                    </a>

                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-3 col-lg-3 col-xl-2 col-sm-4 mb-lg-3 mb-md-3 mb-sm-3 mb-3 mb-xl-0">
              <div class="card">
                <div class="card-body bg-gray text-center border-0 rounded dash-comman-box">
                  <div class="d-flex justify-content-center align-items-center">
                    <a href="#" class="text-decoration-none w-100">
                      <img src="{{ asset('img/type-discovry-icon.png') }}" width="50px" height="auto">
                      <p class="card-text text-white fw-bold mb-0">Type Discovery</p>
                    </a>

                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-3 col-lg-3 col-xl-2 col-sm-4 mb-lg-3 mb-md-3 mb-sm-3 mb-3 mb-xl-0">
              <div class="card">
                <div class="card-body bg-gray text-center border-0 rounded dash-comman-box">
                  <div class="d-flex justify-content-center align-items-center">
                    <a href="#" class="text-decoration-none w-100">
                      <img src="{{ asset('img/type-element-icon.png') }}" width="50px" height="auto">
                      <p class="card-text text-white fw-bold mb-0">Type Elements</p>
                    </a>

                  </div>
                </div>
              </div>
            </div>
			<?php 
			if($sdresultCount > 0) {
				$sdClass = 'bg-dark';
				$sdhref	=	route('socialdynamics'); 
				$sdimage = 'img/icon-socialdynamics.png';
			} else {
				$sdClass = 'bg-gray';
				$sdhref	=	'javascript:void(0);'; 
				$sdimage = 'img/social-dynamic-icon.png';
			}
			?>
            <div class="col-md-3 col-lg-3 col-xl-2 col-sm-4 mb-lg-3 mb-md-3 mb-sm-3 mb-3 mb-xl-0">
              <div class="card">
                <div class="card-body bg-gray {{ $sdClass }} text-center border-0 rounded dash-comman-box">
                  <div class="d-flex justify-content-center align-items-center">
                    <a href="{{ $sdhref }}" class="text-decoration-none w-100">
                      <img src="{{ asset($sdimage) }}" width="50px" height="auto">
                      <p class="card-text text-white fw-bold mb-0">Social Dynamics</p>
                    </a>

                  </div>
                </div>
              </div>
            </div>
			<?php 
			if($eqresultCount > 0) {
				$eqClass = 'bg-dark';
				$href	=	url('myeqreport'); 
				$image = 'img/icon-eqaccelerator.png';
			} else {
				$eqClass = 'bg-gray';
				$href	=	'javascript:void(0);'; 
				$image = 'img/eq-icon.png';
			}
			?>
            <div class="col-md-3 col-lg-3 col-xl-2 col-sm-4 mb-lg-3 mb-md-3 mb-sm-3 mb-3 mb-xl-0">
              <div class="card">
                <div class="card-body {{ $eqClass }} text-center border-0 rounded dash-comman-box">
                  <div class="d-flex justify-content-center align-items-center">
                    <a href="{{ $href }}" class="text-decoration-none w-100">
                      <img src="{{ asset($image) }}" width="50px" height="auto">
                      <p class="card-text text-white fw-bold mb-0">EQAccelerator</p>
                    </a>

                  </div>
                </div>
              </div>
            </div>
          </div>
      </main>
    </div>
 
</x-app-layout>
