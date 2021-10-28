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
            <h2 class="text-center">Register a new account</h2>
            <p class="text-center">On this page you can create new SHARED account</p>
          </div>
          <div class="card-container">
            <div class="card card-shadow col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2 reveal">
              <form action="{{ route('register-post') }}" method="POST" class="reveal-content">
                @csrf
                <div class="row">
                  <div class="">
                      <div class="form-group">
                        <label for="username">Come up with your new user name</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="" required>
                      </div>

                      <div class="form-group">
                        <label for="email">Your existing email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="" required>
                      </div>

                      <div class="form-group">
                        <label for="password">Enter a new password which will be used for your authentication</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="" required>
                      </div>

                      <div class="form-group">
                        <label for="repeat-password">Repeat your password</label>
                        <input type="password" class="form-control" id="subject" name="repeat-password" placeholder="" required>
                      </div>
                      
                      <div class="row justify-content-center center">
                        <button type="submit" class="btn btn-primary">Register</button>
                      </div>
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