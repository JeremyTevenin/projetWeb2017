<!DOCTYPE HTML>
<html>
	<head>
		<script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>
        <link rel="stylesheet" type='text/css' href="form.css">
        <link rel="stylesheet" type='text/css' href="common.css">
		<?php
			include('connect.php');
		?>
	</head>
	<body>
        <?php
            include('header.php');
        ?>
		<form method='post' action='inscription_confirm.php'>
			<fieldset>
				<legend>Inscription</legend>
				<table>
					<tr>
						<td>Pseudo : </td>
						<td><input type='text' name='pseudo' required='required' id='pseudo' pattern='[a-zA-Z0-9\._]+'></td>
						<td id='tickPs'></td>
					</tr>
					<tr>
						<td>Mot de passe : </td>
						<td><input type='password' name='password' id ='password' required='required'></td>
						<td id='tickPa1'></td>
					</tr>
					<tr>
						<td>Réentrez le mot de passe : </td>
						<td><input type='password' name='password2' id ='password2' required='required'></td>
						<td id='tickPa2'></td>
					</tr>
					<tr>
						<td></td>
						<td><input type='submit' name='submit' id='submit' value='Validez'></td>
					</tr>
				</table>
			</fieldset>
		</form>
		<script>
			var xmlhttp = new XMLHttpRequest();
            var pass = true;
            var pseudo = true;
			$( '#pseudo' ).keyup(function() {
				var url = 'login_test.php?pseudo=' + $( '#pseudo' ).val();
				xmlhttp.open('get', url, false);
				xmlhttp.send();
				if (!xmlhttp.responseText) {
					document.getElementById('tickPs').innerHTML = '<img src="cross.png" title="Ce pseudo n\'est pas disponible">';
                    $( '#pseudo' ).css("border-color", "red");
                    $('#submit').attr('disabled', 'true');
                    pseudo = false;
                    
				} else {
					document.getElementById('tickPs').innerHTML = '<img src="tick.png">';
                    $( '#pseudo' ).css("border-color", " green");
                    pseudo = true;
                    if (pass && pseudo) { 
                        $('#submit').removeAttr('disabled');
                    }
                }
			});
            $( '#password2' ).keyup(function() {
                if ($( '#password' ).val() == $( '#password2' ).val()) {
                    $( '#password' ).css("border-color", " green");
                    $( '#password2' ).css("border-color", "green");
					document.getElementById('tickPa1').innerHTML = '<img src="tick.png">';
					document.getElementById('tickPa2').innerHTML = '<img src="tick.png">';
                    pass = true;
                    if (pass && pseudo) { 
                        $('#submit').removeAttr('disabled');
                    }
                } else {
                    $( '#password' ).css("border-color", "red");
                    $( '#password2' ).css("border-color", "red");
					document.getElementById('tickPa1').innerHTML = '<img src="cross.png">';
					document.getElementById('tickPa2').innerHTML = '<img src="cross.png">';
                    $('#submit').attr('disabled', 'true');
                    pass = false;
                }
            });
            $( '#password' ).keyup(function() {
                if ($( '#password' ).val() == $( '#password2' ).val()) {
                    $( '#password' ).css("border-color", " green");
                    $( '#password2' ).css("border-color", "green");
					document.getElementById('tickPa1').innerHTML = '<img src="tick.png">';
					document.getElementById('tickPa2').innerHTML = '<img src="tick.png">';
                    pass = true;
                    if (pass && pseudo) { 
                        $('#submit').removeAttr('disabled');
                    }
                } else {
                    $( '#password' ).css("border-color", "red");
                    $( '#password2' ).css("border-color", "red");
					document.getElementById('tickPa1').innerHTML = '<img src="cross.png">';
					document.getElementById('tickPa2').innerHTML = '<img src="cross.png">';
                    $('#submit').attr('disabled', 'true');
                    pass = false;
                }
            });
		</script>
	</body>
</html>
