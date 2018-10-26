<?php

class Interview
{
	// change to constant to be called 
	const title = 'Interview test';

}


$lipsum = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus incidunt, quasi aliquid, quod officia commodi magni eum? Provident, sed necessitatibus perferendis nisi illum quos, incidunt sit tempora quasi, pariatur natus.';
$people = array(
	array('id'=>1, 'first_name'=>'John', 'last_name'=>'Smith', 'email'=>'john.smith@hotmail.com'),
	array('id'=>2, 'first_name'=>'Paul', 'last_name'=>'Allen', 'email'=>'paul.allen@microsoft.com'),
	array('id'=>3, 'first_name'=>'James', 'last_name'=>'Johnston', 'email'=>'james.johnston@gmail.com'),
	array('id'=>4, 'first_name'=>'Steve', 'last_name'=>'Buscemi', 'email'=>'steve.buscemi@yahoo.com'),
	array('id'=>5, 'first_name'=>'Doug', 'last_name'=>'Simons', 'email'=>'doug.simons@hotmail.com')
);
$person = $_POST['person'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Interview test</title>
	<style>
		body {font: normal 14px/1.5 sans-serif;}
	</style>
</head>
<body>

		<!-- instantiate class with Paamayim Nekudotayim -->
    	<h1><?=Interview::title ;?></h1>

	<?php
	// fixed loop to start at 0 and go to 9 to print the $lipsum variable 10 times
	// Print 10 times
	for ($i=0; $i<10; $i++) {
		echo '<p>'.$lipsum.'</p>';
	}
	?>

	<hr>

<!-- it is not safe to use $_SERVER['REQUEST_URI'] in a form. It is better to leave blank -->

<!-- method needs to post to transfer data for this form -->

	<form method="post" action="">
		<p><label for="firstName">First name</label> <input type="text" name="person[first_name]" id="firstName"></p>
		<p><label for="lastName">Last name</label> <input type="text" name="person[last_name]" id="lastName"></p>
		<p><label for="email">Email</label> <input type="text" name="person[email]" id="email"></p>
		<p><input type="submit" value="Submit" /></p>
	</form>

	<?php
	
	
	
	 if ($person): ?>
     
<!-- $_POST did not have the complete identifiers   --> 
  
		<p><strong>Person</strong> <?= $_POST['person']['first_name'];?>, <?= $_POST['person']['last_name'];?>, <?= $_POST['person']['email'] ;?></p>
	<?php
	
	 endif; ?>


	<hr>
	
	<?php
	
	//turn array into object
	$people = json_decode(json_encode($people));
	
	?>

	<table>
		<thead>
			<tr>
				<th>First name</th>
				<th>Last name</th>
				<th>Email</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($people as $person): ?>
				<tr>
					<td><?=$person->first_name;?></td>
					<td><?=$person->last_name;?></td>
					<td><?=$person->email;?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

</body>
</html>
