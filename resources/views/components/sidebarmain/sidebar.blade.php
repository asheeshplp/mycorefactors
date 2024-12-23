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
			  <a class="nav-link" aria-current="page" href="#">
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
		</ul>
	</div>
</nav>