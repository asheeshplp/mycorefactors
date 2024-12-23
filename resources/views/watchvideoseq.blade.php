<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Watch Videos') }}
        </h2>
    </x-slot>
	
	 <main class="col-md-12 ms-sm-auto col-lg-12 pb-5" id="main-wrapper">
          <div class="container-fluid px-3">
            <div class="note-container-accessment justify-content-center">
              <img src="{{ asset('img/eq-logo.svg') }}" width="58px" height="auto" />
              <h1 class="mb-0 text-white">Watch Videos</h1>
            </div>
          </div>
		  
		   <div class="container-fluid px-3 mt-3">
            <div class="row">
				<div class="card card-bg-gray">
                  <div class="card-body">
					<div class="btn-info d-flex gap-3">
                        <a href="{{ url('myeqreport') }}" id="myreport" class="btn-info-comman uppertab">My Report</a>
                        <a href="{{ url('exploreeq') }}" id="exploreeq" class="btn-info-comman uppertab">Explore EQ</a>
                        <a href="{{ url('watchvideoseq') }}" id="watchvideos" class="active btn-info-comman uppertab">Watch Videos</a>
                        <a href="{{ url('externalresourceseq') }}" id="externalresources" class="btn-info-comman uppertab">External Resources</a>                        
                    </div>
					<div class="row">
						<div class="col-md-12">
							<div class="loader" style="visibility:hidden;"></div>						  
					</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="loader" style="display:none;"></div>
						  <div class="alert alert-warning">
							<strong>Sorry!</strong> No Content to display.
						</div>
					</div>
					</div>
				</div>
				</div>
			</div>
		</div>
</x-app-layout>

