
<?php require("partial/head.php"); ?>

<?php require("add_task.php"); ?>
		<div>
			<?php 
				if (isset($_SESSION['username'])) {
					echo "<div id='welcome_sty'>
							<h1>Welcome! @".$_SESSION['username'].", to your task manager web app</h1>
						  </div>";
				 }else{
				 	echo "<div id='welcome_sty'>
							<h1>Welcome! You need to be Logged in to see your Task's</h1>
						  </div>";
				 }
			?>
		</div>
		<h1 id='heading_sty'>YOUR TASKS</h1>
<?php 
	if (isset($_SESSION['username'])) { ?>
		<div id="task_sty">

			<table class="table table-dark">
					  <thead>
					    <tr>
					      <th scope="col">No.</th>
					      <th scope="col">Title</th>
					      <th scope="col">Description</th>
					      <th scope="col">Created Time</th>
					      <th scope="col">Due date</th>
					      <th scope="col">Status</th>
					      <th scope="col">Confirm</th>
					      <th scope="col">Delete</th>
					    </tr>
					  </thead>
					  <tbody>
	        	<?php 
	        	if ($tasks) {
	        		$counter = 0;
	        		foreach ($tasks as $task) {

		     			$_SESSION['task_id']  		  = $task->task_id;
						$_SESSION['task_title'] 	  = $task->task_title;
						$_SESSION['task_description'] = $task->task_description;
						$_SESSION['task_time']    	  = $task->task_time;
						$_SESSION['task_date']        = $task->task_date;	
						$_SESSION['status']        =    $task->status;  

						 $counter++;  	
						 if ($_SESSION['status'] == 0) {
						 	    	$_SESSION['status'] = 'Not completed';
						  }else {
						  	$_SESSION['status'] = 'Completed';
						  }   
				?>
					    <tr>
					      <th scope="row"><?= $counter ?></th>
					      <td><?= $_SESSION['task_title']; ?></td>
					      <td><?= $_SESSION['task_description']; ?></td>
					      <td><?= $_SESSION['task_time']; ?></td>
					      <td><?= $_SESSION['task_date'];?></td>
					      <td><?= $_SESSION['status'];?></td>
					      <td><button>Confirm</button></td>
					      <td><button>Delete</button></td>
					    </tr>
					 

				<?php } 
					
				}else{ ?>
					<tr>
				      <td><p id="loading_trick">Loading Task's... <a href="/">Click to Refresh</a> or you have no  recent task.</p></td>
				    </tr>
				<?php } ?>
			 </tbody>
			</table>		
		</div>
<?php } ?>

<div>
	
</div>
<?php require("partial/footer.php"); ?>