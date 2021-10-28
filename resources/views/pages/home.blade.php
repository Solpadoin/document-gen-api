@extends('layout.main')

@section('body')
  <style>
  .center {
      margin: 0 auto;
      width: 30%;
  }
  </style>
  <div class="section-container contact-container">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-12">
          <div class="section-container-spacer">
            <h2 class="text-center">Get in touch</h2>
            <p class="text-center">If you have any questions, you can write your request to us. We will receive it and contact back with you.</p>
          </div>
          <div class="card-container">
            <div class="card card-shadow col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2 reveal">
              <form action="" class="reveal-content">
                <div class="row">
                  <div class="col-md-7">
                    <div class="form-group">
                      <label for="email">Enter your email</label>
                      <input type="email" class="form-control" id="email" placeholder="email">
                    </div>
                    <div class="form-group">
                      <label for="subject">Enter subject of your issue</label>
                      <input type="text" class="form-control" id="subject" placeholder="subject">
                    </div>
                    <div class="form-group">
                      <label for="subject">Describe your problem here</label>
                      <textarea class="form-control" rows="3" placeholder="enter your message"></textarea>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <ul class="list-unstyled address-container">
                      <li class="text-right">
                        + 38 (097) 123 45
                        <span class="fa-icon">
                          <i class="fa fa-phone" aria-hidden="true"></i>
                        </span>
                      </li>
                      <li class="text-right">
                        Kyiv, Lvovska 17-B.
                        <span class="fa-icon">
                          <i class="fa fa fa-map-o" aria-hidden="true"></i>
                        </span>
                      </li>
                      <li class="text-right">
                        ojs-support@rpa.com
                        <span class="fa-icon">
                          <i class="fa fa fa-envelope" aria-hidden="true"></i>
                        </span>
                      </li>
                      <li>
                        <br><br><br>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6266.603694851314!2d30.518719367139774!3d50.43440403357903!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4cf02b2b3a94f%3A0x783fe299564db0c2!2z0J3QodCaIMKr0J7Qu9C40LzQv9C40LnRgdC60LjQucK7!5e0!3m2!1sru!2sua!4v1635084521886!5m2!1sru!2sua" width="100%" height="25%" style="border:2;" allowfullscreen="" loading="lazy"></iframe>
                      </li>
                    </ul>
                  </div>
                  <div class="center">
                      <button type="submit" class="btn btn-primary">Send message</button>
                  </div>      
                </div>
              </form>
            </div>
            <div class="card-image col-xs-12" style="background-image: url('/assets/images/img-01.jpg')">
            </div>
          </div>
        </div>  
      </div>
    </div>
  </div>
@endsection