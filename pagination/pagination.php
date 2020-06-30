<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="" name="description">
	<meta content="" name="author">
	<link href="" rel="shortcut icon">

	<title>Pagination</title><!-- Bootstrap core CSS -->
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.css" rel="stylesheet">
</head>

<body>
	<div class="container">
		<div class="well">
			<h2>Pagination</h2>
		</div>

		<div class="well">
			<table class="table table-condensed">
				<thead>
					<tr>
						<th>Employee ID</th>
						<th>Last Name</th>
						<th>First Name</th>
						<th>Email</th>
						<th>Salary</th>
					</tr>
				</thead>

				<tbody>
					<?php
					//create a mySQL connection
					$dbhost    = 'localhost';
					$dbuser    = 'root';
					$dbpass    = '';
					$conn = mysql_connect($dbhost, $dbuser, $dbpass);
					if (!$conn) {
						die('Could not connect: ' . mysql_error());
					}
					mysql_select_db('oracledbm');
					/* Get total number of records */
					$sql    = "SELECT count(*) FROM employees ";
					$retval = mysql_query($sql, $conn);
					
					if (!$retval) {
						die('Could not get data: ' . mysql_error());
					}
					
					//this is the current page per number ($current_page)	
					$current_page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
				
					//record per Page($per_page)	
					$per_page = 5;
					//total count record ($total_count)
					$row = mysql_fetch_array($retval, MYSQL_NUM);
				    $total_count = $row[0];
					
					//it gets the result of total_count over per page
					$total_pages = $total_count/$per_page;
					//get the off set current page minus 1 multiply by record per page	
					$offset = ($current_page - 1) * $per_page;
					//move to previous record by subtracting one into the current record
					$previous_page = $current_page - 1;
					//mvove to next record by incrementing the current page by one		
					$next_page = $current_page + 1;
					//check if previous record is still greater than one then it returns to true
					$has_previous_page =  $previous_page >= 1 ? true : false;
					//check if Next record is still lesser than one total pages then it returns to true
					$has_next_page = $next_page <= $total_pages ? true : false;
					
					//find records of employee and we specify the offset and the limit record per page
					$sql = "SELECT employee_id, LAST_NAME, FIRST_NAME, EMAIL, salary FROM employees LIMIT {$per_page} OFFSET {$offset}"; 
					$retval = mysql_query($sql, $conn);
					if (!$retval) {
						die('Could not get data: ' . mysql_error());
					}
					while ($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
						echo '<tr>';
						echo '<td>' . $row['employee_id'] . '</td>';
						echo '<td>' . $row['LAST_NAME'] . '</td>';
						echo '<td>' . $row['FIRST_NAME'] . '</td>';
						echo '<td>' . $row['EMAIL'] . '</td>';
						echo '<td>' . $row['salary'] . '</td>';
						
					}

					echo '</tr>';
					echo '</tbody>';
					echo '</table>';
					
					echo '<ul class="pagination" align="center">';
									
					if ($total_pages > 1){
						//this is for previous record
						if ($has_previous_page){
						echo ' <li><a href=pagination.php?page='.$previous_page.'>&laquo; </a> </li>';
						}
						 //it loops to all pages
						 for($i = 1; $i <= $total_pages; $i++){
							//check if the value of i is set to current page	
							if ($i == $current_page){
							//then it sset the i to be active or focused
								echo '<li class="active"><span>'. $i.' <span class="sr-only">(current)</span></span></li>';
							 }else {
							 //display the page number
								echo ' <li><a href=pagination.php?page='.$i.'> '. $i .' </a></li>';
							 }
						 }
						//this is for next record		
						if ($has_next_page){
						echo ' <li><a href=pagination.php?page='.$next_page.'>&raquo;</a></li> ';
						}
						
					}
					
					echo '</ul>';
					mysql_close($conn);
					?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>