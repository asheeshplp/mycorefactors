<?php
use App\Traits\ReportsTrait;
ReportsTrait::checkreports();
$eqresultCount 	= Session::get('eqresultCount');
$cresultCount 	= Session::get('cresultCount');
$sdresultCount 	= Session::get('sdresultCount');
$teresultCount 	= Session::get('teresultCount');
$tdresultCount 	= Session::get('tdresultCount');
?>
<nav id="sidebarMenu" class="d-md-block collapse sidebar">
	<div class="position-sticky">
		<ul class="nav flex-column sidebar-menu">
			<li class="nav-item">
			  <a class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}" aria-current="page" href="{{ route('dashboard') }}">
				<i class="material-icons">assessment</i>
				<span class="nav-text">Dashboard</span>
			  </a>
			</li>
			<li class="nav-item">
			  <a class="nav-link {{ request()->is('careerexplorer*') ? 'active' : '' }}" aria-current="page" href="{{ url('careerexplorer') }}">
				<i class="material-icons">explore</i>
				<span class="nav-text">Explore Career</span>
			  </a>
			</li>
			<li class="nav-item">
			  <a class="nav-link pe-cursor {{ request()->is('myjournal*') ? 'active' : '' }}" aria-current="page" onclick="toggleSubmenu(event)">
				<i class="material-icons">book</i>
				<span class="nav-text">My Journal</span>
				<i class="material-icons dropdown-icon">arrow_drop_down</i>
			  </a>
			  <ul class="nav flex-column submenu {{ request()->is('myjournal*') ? 'active' : '' }}" style="display: none">
				<li class="nav-item">
				  <a class="nav-link" href="{{ url('myjournal') }}">
					<span class="nav-text">View Journal</span>
				  </a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="main-journal-emty.html">
					<span class="nav-text">Add Entry</span>
				  </a>
				</li>
			  </ul>
			</li>
			<?php 
			if($cresultCount > 0) {
				$crClass = 'display:block';
			} else {
				$crClass = 'display:hidden';
			}
			?>
			<li style="{{ $crClass }}" class="nav-item">
			  <a class="nav-link {{ request()->is('careerpath*') ? 'active' : '' }}" aria-current="page" href="{{ url('careerpath') }}">
				<i class="material-icons">assessment</i>
				<span class="nav-text">Career Path</span>
			  </a>
			</li>
			<?php 
			if($eqresultCount > 0) {
				$eqClass = 'display:block;';
			} else {
				$eqClass = 'display:none;';
			}
			?>
			<li style="{{ $eqClass }}" class="nav-item">
			  <a class="nav-link {{ request()->is('myeqreport*') ? 'active' : '' }}" aria-current="page" href="{{ url('myeqreport') }}">
				<i class="material-icons">assessment</i>
				<span class="nav-text">EQ Accelerator</span>
			  </a>
			</li>
			<?php 
			if($sdresultCount > 0) {
				$sdClass = 'display:block;';
			} else {
				$sdClass = 'display:none;';
			}
			?>
			<li style="{{ $sdClass }}" class="nav-item">
			  <a class="nav-link {{ request()->is('socialdynamics*') ? 'active' : '' }}" aria-current="page" href="{{ url('myeqreport') }}">
				<i class="material-icons">assessment</i>
				<span class="nav-text">Social Dynamics</span>
			  </a>
			</li>
			<?php 
			if($teresultCount > 0) {
				$teClass = 'display:block;';
			} else {
				$teClass = 'display:none;';
			}
			?>
			<li style="{{ $teClass }}" class="nav-item">
			  <a class="nav-link {{ request()->is('typeelements*') ? 'active' : '' }}" aria-current="page" href="{{ url('myeqreport') }}">
				<i class="material-icons">assessment</i>
				<span class="nav-text">Type Elements</span>
			  </a>
			</li>
			<?php 
			if($tdresultCount > 0) {
				$tdClass = 'display:block;';
			} else {
				$tdClass = 'display:none;';
			}
			?>
			<li style="{{ $tdClass }}" class="nav-item">
			  <a class="nav-link {{ request()->is('typediscovery*') ? 'active' : '' }}" aria-current="page" href="{{ url('myeqreport') }}">
				<i class="material-icons">assessment</i>
				<span class="nav-text">Type Discovery</span>
			  </a>
			</li>
		</ul>
	</div>
</nav>