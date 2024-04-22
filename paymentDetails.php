<?php
session_start();
require 'connection.php';

if (isset($_SESSION['email'])) {
	$emailAddres = $_SESSION['email'];

	$query = "SELECT * FROM user WHERE email='$emailAddres'";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_assoc($result);
	$userId = $row['user_id'];

}



$code = $_SESSION['code'];

$query = "SELECT * FROM orders WHERE orderCode='$code'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$orderId = $row['orderId'];
$total = $_SESSION['total'];


if (isset($_POST['Proceed'])) {
	$totalBill = $_POST['totalBill'];
	$cardName = $_POST["cardName"];
	$cardNumber = md5($_POST["cardNumber"]);
	$exDate = md5($_POST["exDate"]);
	$cvv = md5($_POST["cvv"]);

	$insert = "INSERT INTO `payments`(`orderId`, `user_id`, `totalBill`, `cardName`, `cardNumber`, `exDate`, `cvv`) VALUES ('$orderId','$userId','$totalBill','$cardName','$cardNumber','$exDate','$cvv')";
	mysqli_query($con, $insert);

	echo "
          <script>
        alert('payment successfully!');
        window.location.href='invoice.php?id=$orderId';
        </script>";
}

?>

<!Doctype html>
<html lang="en">

<head>

	<title>Payment</title>

	<link rel="stylesheet" type="text/css" href="payDetail.css">

</head>

<body>

	<div class="container">

		<form action="" method="POST" name="payForm" onsubmit="return pay()">

			<div class="row">

				<div class="col">

					<h3 class="title">Complete Your Payment </h3>

					<div class="inputBox">

						<input type="hidden" name="id" value="<?php echo $orderId; ?>">
						<div class="payDet">
							<span>Total Bill </span><br>

							<input type="text" name="totalBill" value="<?php echo $total; ?>">
						</div>

						<div class="payDet">
							<span>Name On Card </span><br>
							<div class="error">
								<p id="result1"></p>
							</div>
							<input type="text" name="cardName" placeholder="John wick">

						</div>
						<div class="payDet">
							<span>Creadit Card Number</span><br>
							<div class="error">
								<p id="result2"></p>
							</div>
							<input type="text" name="cardNumber" placeholder="0000 0000 0000 0000 ">
						</div>
						<div class="payDet">
							<span>Exp date</span><br>
							<input type="text" name="exDate" placeholder="month/year">
						</div>

						<div class="payDet">
							<span>CVV </span><br>
							<div class="error">
								<p id="result3"></p>
							</div>
							<input type="text" name="cvv" placeholder="00000">
						</div>

					</div>

				</div>

			</div>

			<input type="Submit" value="Proceed " name="Proceed" class="submit_btn">

		</form>
		<div class="cartImg">
			<img src="image/pay1.jpg" alt="">
		</div>
	</div>
	<?php
	if (isset($_REQUEST['proceed'])) {
		$_SESSION['id'] = $_POST['id'];
	}

	?>
	<script>
		function pay() {

			if (!document.payForm.cardName.value.match(/^[A-Za-z" "]+$/)) {
				document.getElementById("result1").innerHTML = "Enter the correct name";
				return false;
			}

			else if (isNaN(document.payForm.cardNumber.value)) {
				document.getElementById("result2").innerHTML = "Enter the correct card number";
				return false;
			}
			else if (document.payForm.cardNumber.value.length < 12) {
				document.getElementById("result2").innerHTML = "Enter the correct card number";
				return false;
			}
			else if (isNaN(document.payForm.cvv.value)) {
				document.getElementById("result3").innerHTML = "Enter the correct cvv";
				return false;
			}
			else if (document.payForm.cvv.value.length < 3) {
				document.getElementById("result3").innerHTML = "Enter the correct cvv";
				return false;
			}

		}
	</script>
</body>