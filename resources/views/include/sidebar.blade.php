<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SHOP</span>
    </a>
    <!-- Sidebar -->
	<form id="filterForm"  name="categoryForm" enctype="multipart/form-data" method="post">

		<div class="sidebar">
			<!-- Sidebar user (optional) -->
			<nav class="mt-2">
				<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
					data-accordion="false">
					<li class="nav-item ">
						<a href="#" class="nav-link">
							<p>
								Topic
								<i class="fas fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item nav-link1">
								<div class="form-group">
									@foreach($topics as $topic)
									<div class="form-check">
										<input class="form-check-input" type="checkbox" name="topics[]" value="{{$topic->id}}">
										<label class="form-check-label">{{$topic->name}}</label>
									</div> 
									@endforeach
								</div>
							</li>
						</ul>
					</li>

					<li class="nav-item menu-is-opening menu-open">
						<a href="#" class="nav-link">
							<p>
								Price Range
								<i class="fas fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item nav-link1">
								<div class="form-group">
									<label for="customRange2" class="form-label">0 to {{ $maxPrice }}</label>
									<input type="range" class="form-range" min="0" max="{{ $maxPrice }}" value="{{ $maxPrice }}"  name="price_range">
			 
								</div>
							</li>
						</ul>
					</li>
				</ul>
			</nav>
		</div>
	</form>
</aside>
