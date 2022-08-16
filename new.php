<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

	<title>Suggestion</title>
	<style type="text/css">
		.error {
			font-size: 15px;
			color: red;
		}
        *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: "Poppins",sans-serif;
    font-weight: 500;
}
body{
    height: 100vh;
    background: #3c4053;
}
header{
    font-size: 30px;
    text-align: center;
    color: #1c093c;
}
.container{
    background-color: #fff;
    width: 50%;
    min-width: 420px;
    padding: 35px 50px;
    transform: translate(-50%,-50%);
    position: absolute;
    left: 50%;
    top: 50%;
    border-radius: 10px;
    box-shadow: 20px 30px 25px rgba(0,0,0,0.15);
}
p{
    position: relative;
    margin: auto;
    width: 100%;
    text-align: center;
    color: #606060;
    font-size: 14px;
    font-weight: 400;
}
        label{
    color: #1c093c;
    font-size: 14px;
}
        textarea,
        input{
    width: 100%;
    font-weight: 400;
    padding: 8px 10px;
    border-radius: 5px;
    border: 1.2px solid #c4cae0;
    margin-top: 5px;
    
}
textarea{
    resize: none;
}
textarea:focus,
input:focus{
    outline: none;
    border-color: #3c4053;
}
.button{
    border: none;
    padding: 10px 20px;
    background: #3c4053;
    color: #fff;
    border-radius: 3px;
}
	</style>
</head>

<body>
	<?php

	$firstnameErr = $lastnameErr = NULL;
	$firstname = $lastname = NULL;

	$flag = true;
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		
			$firstname = test_input($_POST["firstname"]);

		if (empty($_POST["lastname"])) {
			$lastnameErr = "Please type in a suggestion!";
			$flag = false;
		} else {
			$lastname = test_input($_POST["lastname"]);
		}
		

		// submit form if validated successfully
		if ($flag) {

			$conn = new mysqli('localhost', "root", "", "test_db");

			if ($conn->connect_error) {
				die("connection failed error: " . $conn->connect_error);
			}
			
			$sql = "INSERT INTO sug (name,email) VALUES('$firstname', '$lastname') ";

		

			// execute sql insert
			if ($conn->query($sql) === TRUE) {
                header("location: hetra.html");
			}
            else{
                echo "<script> alert('Oops something went wrong!');</script>";
            }
		}
	}

	function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	?>
    <div class="container">
	<form action=" <?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
		<div class="card pt-2 mx-auto" style="max-width: 30rem;">
			<div class="card-header" style="font-size: 25px;
			font-style: italic;">
				<header>Suggestions/Questions</header>
			</div><br>
            <p>Have any questions or suggestions? Drop us a message</p>
			<div class="card-body">
				<div class="card-text mb-2">
					Name <input type="text" name="firstname" class="form-control" placeholder="Name" value="<?= $firstname; ?>">
					<span class="error"> <?= $firstnameErr; ?></span>
				</div>
				<div class="card-text mb-2">
                Suggestions <textarea  name="lastname" id="issue" cols="30" rows="10" placeholder="Type a suggestion" value="<?= $lastname; ?>"></textarea>
					<span class="error"> <?= $lastnameErr; ?></span>
				</div>

				
				<div class="card-text mb-2" style="background-size: 20px;">
					
				</div>
			</div>
			<div class="card-footer mb-2 btn-lg">
				<input class="button" type="submit" name="button">
			</div>
		</div>
	</form>
    </div>
</body>

</html>
