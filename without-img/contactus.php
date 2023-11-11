<!DOCTYPE html>
<html>
<head>
    <title>Send an Email</title>
    <link rel="stylesheet" href="contactuo.css">
</head>
<body>
<div class= container>
	<div class="box">
		<h4 class="sent-notification"></h4>
        <div class="content">
		<form id="myForm">
			<h2>Send an Email</h2>
</div>
			<label>Name</label>
            <br>
			<input id="name" type="text" >
			<br><br>

			<label>Email</label>
            <br>
			<input id="email" type="text" >
			<br><br>

			<label>Subject</label>
            <br>
			<input id="subject" type="text" >
			<br><br>

			<label>Message</label>
            <br>
			<textarea id="Message" rows="5" ></textarea><!--textarea tag should be closed (In this coding UI textarea close tag cannot be used)-->
			<br><br>

			<button type="button" onclick="sendEmail()" value="Send An Email">Submit</button>
		</form>
</div>
<div class=paragraphe>
<h1>Fill the form <br> to <span class="contact-us">contact us</span></h1>
<p><span class= our-information>our information </span><br><br> <img src="incoming-call.png" alt="">  +213(0) 23 93 48 19 <br> <img src="letter.png" alt="">  email@gmail.com <br> <img src="location-on-map.png" alt="">  BP 32 Bab Ezzouar, 16611-ALGER</p>
</div>
</div>

	<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
        function sendEmail() {
            var name = $("#name");
            var email = $("#email");
            var subject = $("#subject");
            var body = $("#body");

            if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
                $.ajax({
                   url: 'sendEmail.php',
                   method: 'POST',
                   dataType: 'json',
                   data: {
                       name: name.val(),
                       email: email.val(),
                       subject: subject.val(),
                       body: body.val()
                   }, success: function (response) {
                        $('#myForm')[0].reset();
                        $('.sent-notification').text("Message Sent Successfully.");
                   }
                });
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }
    </script>

</body>
</html>
      