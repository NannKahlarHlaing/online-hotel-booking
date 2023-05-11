@extends('frontend.index')

@section('content')
<section class="user-register mb-50 scroll-bottom">
	<div class="container">
		<div class="offset-md-4 col-md-4 bg-light">
			<form class="form mt--100" action="{{ url('/create_user') }}" method="POST">
				@csrf
				<div class="mb-3">
				  <label for="name" class="form-label">Name</label>
				  <input type="text" class="form-control" id="name" name="cus_name" value="{{old('cus_name')}}">
				  @error('name')
						<p class="danger" role="alert">
							<strong>{{ $message }}</strong>
						</p>
					@enderror
				</div>
				<div class="mb-3">
					<label for="NRC" class="form-label">NRC</label>
					<input type="text" class="form-control" id="NRC" name="NRC" value="{{old('NRC')}}">
					@error('NRC')
						<p class="danger" role="alert">
							<strong>{{ $message }}</strong>
						</p>
					@enderror
				</div>
				<div class="mb-3">
					<label for="phone" class="form-label">Phone Number</label>
					<input type="text" class="form-control" id="phone" name="phone" value="{{old('phone')}}">
					@error('phone')
						<p class="danger" role="alert">
							<strong>{{ $message }}</strong>
						</p>
					@enderror
				</div>
				<div class="mb-3">
					<label for="email" class="form-label">Email</label>
					<input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
					@error('email')
						<p class="danger" role="alert">
							<strong>{{ $message }}</strong>
						</p>
					@enderror
				</div>
				<div class="mb-3">
					<label for="password" class="form-label">Password</label>
					<input type="text" class="form-control" id="password" name="password" >
				  	@error('password')
						<p class="danger" role="alert">
							<strong>{{ $message }}</strong>
						</p>
					@enderror
				</div>
				
				<div class="mb-3">
					<label for="password" class="form-label">Password</label>
					<input type="text" class="form-control" id="password_confirmation" name="name">
					@error('password_confirmation')
						<p class="danger" role="alert">
							<strong>{{ $message }}</strong>
						</p>
					@enderror
				  </div>
				<button type="submit" class="btn-book">Submit</button>
			  </form>
		</div>
    </div>
</section>
@endsection