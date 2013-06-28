<?php /*
    Filename:   inbox.php
    Location:   /application/views/profile
*/ ?>

<h1>Inbox</h1>

<div class="spacer"></div>

<button id="openNewMessage" type="button">New Message</button>

<form id="newMessage" method="post" action="">
	<input id="messageFrom" type="text" size="5" value="<?php echo $this->session->userdata('username'); ?>"/>
	<br><p>To:<input id="messageTo" type="text" size="57" maxlength="50"/></p>
	<p>Subject:<input id="subject" type="text" size="50" maxlength="50"/></p><br>
	
	<p><input onblur="textCounter(this.form.recipients,this,140);" disabled  onfocus="this.blur();" tabindex="999" maxlength="3" size="3" value="140" name="counter">Characters Remaining.</p>
	<textarea onblur="textCounter(this,this.form.counter,140);" id="message" onkeyup="textCounter(this,this.form.counter,140);" style="WIDTH: 608px; HEIGHT: 94px" name="message" rows="1" cols="15" ></textarea>
	<br><input type="submit" value="Send" />
</form>
<div id="successMessage">Your Message has Successfully been Sent!</div>

<div class="spacer"></div>

<button id="refreshMail" type="button">Refresh Inbox</button>

<div class="raw100"><b>
	<div class="raw10">From</div>
	<div class="raw10">Subject</div>
	<div class="raw20">Date</div>
	<div class="raw50">Message</div></b>
</div>
<?php foreach($mail as $msg) : ?>

            <div class="raw100">
                <div class="raw10"><?php echo $msg->msgFrom; ?></div>
                <div class="raw10"><?php echo $msg->msgSubject; ?></div>
                <div class="raw20"><?php echo $msg->msgDate; ?></div>
                <div class="raw50"><?php echo $msg->message; ?></div>
            </div>

        <?php endforeach; ?>


<div class="spacer"></div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js">
</script>
<script>
$(document).ready(function()
{
	$('#newMessage').hide();
	$('#successMessage').hide();
	$('#messageFrom').hide();

	//New Message Toggle
	$('#openNewMessage').click(function()
	{
		$('#newMessage').toggle("down");
	})

	//NewMessage Submit
	$('#newMessage').submit(function(e)
	{
		e.preventDefault();
		//debug variable checks, comment out later
		/*console.log("<?php echo $this->session->userdata('username'); ?>");
		console.log($('#messageFrom').val());
		console.log($('#messageTo').val());
		console.log($('#subject').val());
		console.log($('#message').val());*/

		$.post("<?php echo site_url('inbox/send'); ?>", { messageFrom:$('#messageFrom').val(), messageTo:$('#messageTo').val(), subject:$('#subject').val(), message:$('#message').val() }, function(result)
		{
			if(result)
			{
				$('#newMessage').fadeOut("slow", function()
				{
					$('#successMessage').fadeIn(1000, function()
					{
						$(this).delay(1000).fadeOut(2000);
					})
				})
			}
			else //fail message send
			{
				alert("Error! The user you are sending to does not exist. Your Message was not sent.")
			}
		})
	})

	//Refresh mail
	$('#refreshMail').click(function()
	{
		$.post("")
	})
})
</script>

<script>
function textCounter(field, countfield, maxlimit) 
{
	if(field.value.length > maxlimit)
	{
		field.value = field.value.substring(0, maxlimit);
	  	field.blur();
	  	field.focus();
	  	return false;
 	}
 	else
 	{
  		countfield.value = maxlimit - field.value.length;
 	}
}
</script>

<?php /* End of File */ ?>