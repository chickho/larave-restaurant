<header class="navbar navbar-expand-md" style='background-color:#331A00'>
	<div class="container-xl">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu">
			<span class="navbar-toggler-icon"></span>
		</button>
		<a href="/" class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pr-0 pr-md-3">
			<img src="./static/logo-home.png" alt="Tabler" class="navbar-brand-image">
		</a>
		<div class="navbar-nav flex-row order-md-last">
			@auth
				<!-- @canany(['customer','guest','tamu'])
					<div class="flex flex-col sm:flex-row mr-5 text-light mt-2">
						<a class="mt-3 hover:underline sm:mx-3 sm:mt-3 text-light" href="">Shop</a>
						<a href="{{ route('cart.list') }}" class="flex items-center text-light">
							<i class="fas fa-solid fa-cart-arrow-down text-light ml-2"></i>
							{{ Cart::getTotalQuantity()}}
						</a>
					</div>
				@endcanany -->
				<div class="nav-item dropdown">
					<a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-toggle="dropdown">
						<div class="d-none d-xl-block pl-2">
							<div style='color:#fff'>{{auth()->user()->name }}</div>
							<div class="mt-1 small" style='color:#fff'>{{auth()->user()->email }}</div>
						</div>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						@can('customer')
							<a href="/point" class="dropdown-item">
								<i class="fas fa-award fa-fw me-1"></i>
								&nbsp;&nbsp;Points</a>
							<a href="/user-voucher" class="dropdown-item">
								<i class="fas fa-receipt fa-fw me-1"></i>
								&nbsp;&nbsp;Your Voucher</a>
						@endcan
						<form action="/logout" method="post">
							@csrf
							<button type="submit" class="dropdown-item">
								<i class="fas fa-sign-out-alt fa-fw me-1"></i>
								&nbsp;&nbsp;Logout</button>
						</form>
					</div>
				</div>
			@else
				<div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
					<a class="nav-link text-light" href="/login">Login / Register</a>
					<div class='text-light'>or</div>
					<a class="nav-link text-light" href="/login-as-guest">Guest</a>
				</div>
			@endauth
		</div>
		<div class="collapse navbar-collapse " id="navbar-menu">
			<div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
				<ul class="navbar-nav">
					<li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
						<a class="nav-link text-light" href="/">
							<i class="fas fa-home fa-fw me-1"></i>
							&nbsp;&nbsp;Home
						</a>
					</li>
					@can('admin')
						<li
							class="nav-item {{ Request::is('user*') || Request::is('outlet*') || Request::is('table*') || Request::is('menu*') || Request::is('voucher*') ? 'active' : '' }} dropdown">
							<a class="nav-link dropdown-toggle text-light" href="#navbar-base" data-toggle="dropdown" role="button"
								aria-expanded="false">
								<i class="fas fa-box fa-fw me-1"></i>
								&nbsp;&nbsp;Master
							</a>
							<ul class="dropdown-menu">
								<li>
									<a class="dropdown-item" href="/user">
										User
									</a>
								</li>
								<li>
									<a class="dropdown-item" href="/role">
										Role User
									</a>
								</li>
								<li>
									<a class="dropdown-item" href="/table">
										Table
									</a>
								</li>
								<li>
									<a class="dropdown-item" href="/menu">
										Menu
									</a>
								</li>
								<li>
									<a class="dropdown-item" href="/voucher">
										Voucher
									</a>
								</li>
								<li>
									<a class="dropdown-item" href="/payments">
										Payment
									</a>
								</li>
							</ul>
						</li>
					@endcan
					@canany(['customer', 'guest', 'tamu', 'admin'])
						<li class="nav-item {{ Request::is('order*') ? 'active' : '' }}">
							<a class="nav-link text-light" href="/order">
								<i class="fas fa-file-alt fa-fw me-1"></i>
								&nbsp;&nbsp;Order
							</a>
						</li>
					@endcanany
					@canany(['customer', 'guest', 'tamu'])
						<li class="nav-item {{ Request::is('history*') ? 'active' : '' }}">
							<a class="nav-link text-light" href="/history">
								<i class="fas fa-history fa-fw me-1"></i>
								&nbsp;&nbsp;History
							</a>
						</li>
					@endcanany
					@can('cashier')
						<li class="nav-item {{ Request::is('menu*') ? 'active' : '' }}">
							<a class="nav-link text-light" href="/menu">
								<i class="far fa-file-alt fa-fw me-1"></i>
								&nbsp;&nbsp;Menu
							</a>
						</li>
					@endcan
					@canany(['cashier', 'admin'])
						<li class="nav-item {{ Request::is('cashier*') ? 'active' : '' }}">
							<a class="nav-link text-light" href="/cashier">
								<i class="fas fa-cash-register fa-fw me-1"></i>
								&nbsp;&nbsp;Cashier
							</a>
						</li>
					@endcanany
					@canany(['kitchen', 'admin'])
						<li class="nav-item {{ Request::is('kitchen*') ? 'active' : '' }}">
							<a class="nav-link text-light" href="/kitchen">
								<span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg"
										class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
										fill="none" stroke-linecap="round" stroke-linejoin="round">
										<path stroke="none" d="M0 0h24v24H0z"></path>
										<path d="M3 19l15 -15l3 3l-6 6l2 2a14 14 0 0 1 -14 4"></path>
									</svg>
								</span>
								<span class="nav-link-title">
									Kitchen
								</span>
							</a>
						</li>
					@endcanany
					@canany(['kitchen', 'admin', 'cashier','guest','customer', 'tamu'])
						<li class="nav-item {{ Request::is('outlet*') ? 'active' : '' }}">
							<a class="nav-link text-light" href="/outlet">
								<span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg"
										class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
										fill="none" stroke-linecap="round" stroke-linejoin="round">
										<path stroke="none" d="M0 0h24v24H0z"></path>
										<path d="M3 19l15 -15l3 3l-6 6l2 2a14 14 0 0 1 -14 4"></path>
									</svg>
								</span>
								<span class="nav-link-title">
									Outlets
								</span>
							</a>
						</li>
					@endcanany
					@can('admin')
						<li class="nav-item {{ Request::is('laporan*') ? 'active' : '' }}">
							<a class="nav-link text-light" href="/laporan">
								<i class="fas fa-file-alt fa-fw me-1"></i>
								&nbsp;&nbsp;Laporan
							</a>
						</li>
					@endcan
				</ul>
			</div>
		</div>
	</div>
</header>
