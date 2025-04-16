<nav id="sidebar" class="sidebar js-sidebar">
	<div class="sidebar-content js-simplebar">
		<a class="sidebar-brand" href="index.html">
			<span class="align-middle">AdminKit</span>
		</a>

		<ul class="sidebar-nav">
			<li class="sidebar-header">
				Pages
			</li>

			<li class="sidebar-item {{ Request::segment(1) === 'dashboard' ? 'active' : '' }}">
				<a class="sidebar-link" href="/dashboard">
					<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
				</a>
			</li>

			<li class="sidebar-header">
				Manage
			</li>

			<li class="sidebar-item {{ Request::segment(1) === 'category' ? 'active' : '' }}">
				<a class="sidebar-link " href="/category">
					<i class="align-middle" data-feather="box"></i> <span class="align-middle">Category</span>
				</a>
			</li>

			<li class="sidebar-item {{ Request::segment(1) === 'product' ? 'active' : '' }}">
				<a class="sidebar-link" href="/product">
					<i class="align-middle" data-feather="tag"></i> <span class="align-middle">Product</span>
				</a>
			</li>

		</ul>
	</div>
</nav>