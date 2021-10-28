@extends('layout.main')

@section('body')
  <div class="section-container contact-container">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-12">
          <div class="section-container-spacer">
            <h2 class="text-center">Dashboard</h2>
            <p class="text-center"><a href="{{ route('user-profile') }}" class="btn btn-primary">My Profile</a></p>
          </div>
        </div>  
      </div>
    </div>
  </div>
@endsection