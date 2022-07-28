<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>Sign in - Warunk Upnormal</title>
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
	<meta name="msapplication-TileColor" content="#206bc4" />
	<meta name="theme-color" content="#206bc4" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="mobile-web-app-capable" content="yes" />
	<meta name="HandheldFriendly" content="True" />
	<meta name="MobileOptimized" content="320" />
	<meta name="robots" content="noindex,nofollow,noarchive" />
	<link rel="icon" href="./static/upnormal.jpeg" type="image/x-icon" />
	<link rel="shortcut icon" href="./static/upnormal.jpeg" type="image/x-icon" />
	<!-- CSS files -->
	<link href="./css/tabler.min.css" rel="stylesheet" />
	<link href="./css/demo.min.css" rel="stylesheet" />
	<link href="./css/style.css" rel="stylesheet" />
	<style>
		body {
			display: none;
		}

	</style>
</head>

<body class="antialiased border-top-wide border-primary d-flex flex-column bg-pattern">
	<div class="flex-fill d-flex flex-column justify-content-center">
		<div class="container-tight py-6">
			@if (session()->has('success'))
				<div class="alert alert-important alert-success alert-dismissible" role="alert">
					<div class="d-flex">
						<div>
						</div>
						<div>
							{{ session('success') }}
						</div>
					</div>
					<a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
				</div>
			@endif

			@if (session()->has('loginError'))
				<div class="alert alert-important alert-danger alert-dismissible" role="alert">
					<div class="d-flex">
						<div>
						</div>
						<div>
							{{ session('loginError') }}
						</div>
					</div>
					<a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
				</div>
			@endif
			<div class="text-center mb-4">
				<img src="./static/upnormal-logo-1.png" height="100" alt="">
			</div>
			<form class="card card-md" action="/login-as-guest" method="post">
				@csrf
				<div class="card-body">
					<h2 class="mb-5 text-center">Login As Guest</h2>
					<div class="mb-3">
						<label class="form-label">Email</label>
						<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email"
							value="{{ old('email') }}" required>
						@error('email')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
					</div>
					<div class="mb-2">
						<label class="form-label">
							Nama
						</label>
						<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama"
							value="{{ old('name') }}" required>
						@error('name')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
					</div>
					<div class="form-footer">
						<button type="submit" class="btn btn-primary btn-block">Login As Guest</button>
					</div>
				</div>
				<div class="text-center text-muted mb-2">
					Already have account? <a href="/login" tabindex="-1">Log In</a>
				</div>
				<div class="text-center text-muted mb-4">
					Don't have account yet? <a href="/register" tabindex="-1">Register</a>
				</div>
			</form>
		</div>
	</div>
	<!-- Libs JS -->
	<script src="./libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<!-- Tabler Core -->
	<script src="./js/tabler.min.js"></script>
	<script>
	 document.body.style.display = "block"
	</script>
</body>

</html>
