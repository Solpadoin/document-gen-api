@extends('layout.main')

@section('body')
<iframe id="ojs-iframe" src="{{ config('ojs.hostname') }}"></iframe>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
  $( document ).ready(function() {
    let height = $(window).height();
    let width  = $(window).width();
    console.log(height, width);
    $("#ojs-iframe").width(width);
    $("#ojs-iframe").height(height);
  });
</script>
@endsection