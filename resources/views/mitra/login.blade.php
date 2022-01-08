@extends('layouts.screen')

@section('title')
    Login Mitra
@endsection

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content container-xl">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

					<div class="login_form_inner">
						<h3>Login menggunakan data anda</h3>
						<form class="row login_form" action="{{ route('customer.post_login') }}" method="post" id="contactForm" novalidate="novalidate">
  							@csrf
							<div class="col-md-12 form-group mb-25">
								<input type="email" class="form-control br-25" id="email" name="email" placeholder="Email Address">
							</div>
							<div class="col-md-12 form-group mb-25">
								<input type="password" class="form-control br-25" id="password" name="password" placeholder="******">
							</div>
							<div class="col-md-12 form-group mb-25">
								<div class="creat_account">
									<input type="checkbox" id="f-option2" name="remember">
									<label for="f-option2">Keep me logged in</label>
								</div>
							</div>
							<div class="col-md-12 form-group mb-25">
                                <button  type="submit" value="submit"  class="btn btn-outline-light br-25 pdh-30"><i class="fa fa-key" ></i> Login</button>
							</div>
                            <div class="col-md-12 form-group links"><a href="#">Lupa Password?</a> <hr> <a href="{{ route('customer.register') }}">Buat Akun Baru</a></div>
						</form>
					</div>
    </div>
</div>
@endsection


