@extends('layout.main')

@section('body')
  <style>
  .center {
      margin: 0 auto;
      width: 10%;
  }
  </style>
  <div class="section-container contact-container">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-12">
          <div class="section-container-spacer">
            <h2 class="text-center">Please log-in to the system</h2>
            <p class="text-center">Enter your valid and existing account (OJS account also can be used)</p>
          </div>
          <div class="card-container">
            <div class="card card-shadow col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2 reveal">
              <form action="{{ route('login-post') }}" method="POST" class="reveal-content">
                @csrf
                <div class="row">
                  <div class="">
                      <div class="form-group">
                        <label for="email">Enter your account email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="" required>
                      </div>

                      <div class="form-group">
                        <label for="password">Enter your account password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="" required>
                      </div>
                  </div>
                  <div class="row justify-content-center center">
                        <button type="submit" class="btn btn-primary">Login</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>  
      </div>
    </div>
  </div>
@endsection