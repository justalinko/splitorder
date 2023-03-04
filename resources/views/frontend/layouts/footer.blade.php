
	
	<!-- copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p>Copyrights &copy; {{date('Y')}} - <a href="{{url('/')}}">{{env('APP_NAME')}}</a>,  All Rights Reserved.
					</p>
				</div>
				<div class="col-lg-6 text-right col-md-12">
					<div class="social-icons">
						<ul>
							<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end copyright -->
	
	<!-- jquery -->
	<script src="{{asset('assets_frontend/js/jquery-1.11.3.min.js')}}"></script>
	@yield('js')
	<!-- bootstrap -->
	<script src="{{asset('assets_frontend/bootstrap/js/bootstrap.min.js')}}"></script>
	<!-- count down -->
	<script src="{{asset('assets_frontend/js/jquery.countdown.js')}}"></script>
	<!-- isotope -->
	<script src="{{asset('assets_frontend/js/jquery.isotope-3.0.6.min.js')}}"></script>
	<!-- waypoints -->
	<script src="{{asset('assets_frontend/js/waypoints.js')}}"></script>
	<!-- owl carousel -->
	<script src="{{asset('assets_frontend/js/owl.carousel.min.js')}}"></script>
	<!-- magnific popup -->
	<script src="{{asset('assets_frontend/js/jquery.magnific-popup.min.js')}}"></script>
	<!-- mean menu -->
	<script src="{{asset('assets_frontend/js/jquery.meanmenu.min.js')}}"></script>
	<!-- sticker js -->
	<script src="{{asset('assets_frontend/js/sticker.js')}}"></script>
	<!-- main js -->
	<script src="{{asset('assets_frontend/js/main.js')}}"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	@if(session('success'))
	<script>
		Swal.fire({
			icon: 'success',
			title: "{{session('success')}}",
			showConfirmButton: true,
			
		});
	</script>
	@endif

	@if(session('error'))
	<script>
		Swal.fire({
			icon: 'error',
			title: "{{session('error')}}",
			showConfirmButton: true,
			
		});
	</script>
	@endif


	
</body>
</html>