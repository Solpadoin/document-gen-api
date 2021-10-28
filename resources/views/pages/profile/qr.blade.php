<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div id="qr-code-img">
        </div>
    </body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $( document ).ready(function() {
      $.getScript("https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js", function() {
        new QRCode(document.getElementById("qr-code-img"), "UserData{13331:222:32112}");
      });
    });
</script>