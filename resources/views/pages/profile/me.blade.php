@extends('layout.main')

@section('body')
  <div class="section-container contact-container">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-12">
          <div class="section-container-spacer">
            <p class="text-center"><a href="">Profile</a></p>
            <p class="text-center"><a href="#" id="qr-code-generator">Generate QR Code</a><div id='qr-code-img'></div></p> 
            <p class="text-center"><a href="#" id="user-generate-pdf">Convert Word to PDF Document</a></p>
            <p class="text-center"><a href="#">Convert PDF to Word Document</a></p>
            <p class="text-center"><a href="#" id="user-upload-storage">Upload file to the Storage</a></p>
            <p class="text-center"><a href="{{ config('ojs.hostname') }}">OJS</a></p> 
            <p class="text-center"><a href="{{ route('account') }}">Back to the Dashboard</a></p> 
          </div>
        </div>  
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script>
    $( document ).ready(function() {
        $('#qr-code-generator').on("click", function() {
          $("#ojs-iframe").remove();
          $("#ojs-iframe-br").remove();

          let height = $(window).height();
          let width  = $(window).width();
          $("#qr-code-generator").after("<br id='ojs-iframe-br'><iframe id='ojs-iframe'src='{{ route('user-qr-code') }}'></iframe>");

          $("#ojs-iframe").width(width/5.3);
          $("#ojs-iframe").height(height/2.7);
        });

        $('#user-generate-pdf').on("click", function() {
          $("#user-generate-pdf-form").remove();
          $("#user-generate-pdf").after("<form id='user-generate-pdf-form' method='POST' action='{{ route('user-generate-pdf') }}' enctype='multipart/form-data'><input type='file' id='attachment' name='attachment' accept='.docx' /><input type='hidden' name='_token' value='{{ csrf_token() }}' /><input type='submit' /></form>");
        });

        $('#user-upload-storage').on("click", function() {
          $("#user-upload-storage-form").remove();
          $("#user-upload-storage").after("<form id='user-upload-storage-form' method='POST' action='{{ route('user-upload-storage') }}' enctype='multipart/form-data'><input type='file' id='attachment' name='attachment' accept='.docx, .pdf' /><input type='hidden' name='_token' value='{{ csrf_token() }}' /><input type='submit' /></form>");
        });
    });
  </script>
@endsection