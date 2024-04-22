<html>

<head>
	<link rel="stylesheet" href="addItemStyle.css">
	<title>Products</title>
</head>

<body>
	<button class="btnadd"><a href="addProduct.php" class="addNew">NEW PRODUCT</a></button>
	<div class="card-body">

		<div class="table-responsive">

			<table>

				<thead>

					<tr>

						<th>p_name</th>
						<th>p_image</th>
						<th>wood</th>
						<th>price </th>
						<th>star </th>
						<th>Action</th>
					</tr>

				</thead>

				<tbody>

					<?php

					require 'connection.php';
					$select_products = mysqli_query($con, "SELECT * FROM `product`");
					if (mysqli_num_rows($select_products) > 0) {
						while ($row = mysqli_fetch_assoc($select_products)) {
							?>

							<tr>


								<td>
									<?php echo $row['proName']; ?>
								</td>
								<td><img src="uploaded_img/<?php echo $row['proPic']; ?>" height="100" alt=""></td>
								<td>
									<?php echo $row['wood']; ?>
								</td>
								<td>
									<?php echo $row['price']; ?>
								</td>
								<td>
									<?php echo $row['star']; ?>
								</td>

								<td>
									<button><a href="pro-delete.php?delete=<?php echo $row['proId']; ?>">Delete</button></a>
									<br>
									<button><a href="pro-update.php?edit=<?php echo $row['proId']; ?>"> Update</button></a>
								</td>
							</tr>
							<?php
						}
						;

					}
					;
					?>

				</tbody>
			</table>
</body>

</html>