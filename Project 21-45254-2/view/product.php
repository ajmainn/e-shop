<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>

<link rel="stylesheet" type="text/css" href="welcome.css">
<table align='center'>
	<tr>
         <td>
            <fieldset>
            <legend><b>Inventory Management</b></legend>

		<?php echo "<a href='add_product.php'><b>Add Product</b></a>"?><br><br>
		<?php echo "<a href='view_product.php'><b>View Product</b></a>"?><br><br>
		<?php echo "<a href='welcome.php'><b>Back to Main page</b></a>"?><br><br>

	</fieldset>
	
</td>
</tr>
</table>