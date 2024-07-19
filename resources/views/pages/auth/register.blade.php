@extends('layout.template')

@section('content')
<section class="vh-100 vw-100">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 text-black">
          <div class="px-5 ms-xl-4">
            <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
          </div>
          <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
            <form style="width: 23rem;" action="{{route('register.store')}}" method="POST">
              @csrf
              <h3 class="fw-bold mb-3 pb-3" style="letter-spacing: 1px;">Register</h3>

              <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="name">Username</label>
                <input type="text" id="name" name="name" value="{{Session::get('username')}}" class="form-control form-control-lg rounded-5" autocomplete="off" />
              </div>

              <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="email">Email</label>
                <input type="email" id="email" name="email" value="{{Session::get('email')}}" class="form-control form-control-lg rounded-5" autocomplete="off"/>
              </div>

              <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="password">Password</label>
                <input type="password" id="password" name="password" value="{{Session::get('password')}}" class="form-control form-control-lg rounded-5" autocomplete="off"/>
              </div>

              <div class="pt-1 mb-4">
                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary rounded-5 w-100" type="submit">Register</button>
              </div>
              <p>Already have an account? <a href="{{route('login')}}" class="link-primary" style="text-decoration: none">Login here</a></p>
            </form>
          </div>
        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block custom-background vh-100">
          
        </div>
      </div>
    </div>
  </section>
@endsection