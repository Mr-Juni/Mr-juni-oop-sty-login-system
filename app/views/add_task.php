    
    <?php 
		if (!empty($msgs)) {
						
			if($msgs == "success") {
				echo "<div class='alert alert-warning error_div_sty' role='alert'><span class='form-error'>New task's successfully added</span>
				     </div><br>";
			}else {

				echo "<div id='allert_msg' class='alert alert-warning error_div_sty' role='alert'><span class='form-error'>".$msgs."</span></div><br>";
				foreach ($infos as $info) {
					$info['task_title'];
					$info['task_description'];
					$info['task_accomplish_method'];
				}

			}
		}
			
	?>
	
	<div id="add_task" class="animated fadeIn">
		<div id="close_bracket"><span id="close_add_task">Close</span></div>

		<form method="POST" action="/">
			<div id="task_adjust">
				<div class="form-group" id="form_grab">
					<input class="form-control" type="text" name="task_title" value="<?php echo $info['task_title']; ?>" placeholder="Task title">
				</div>
				<div class="form-group" id="form_grab">
					<input class="form-control" type="date" name="task_date" min="<?php echo $date_current ?>" placeholder="Task Due date">
				</div>
				
				<div class="form-group" id="form_grab">
					<textarea placeholder="Write a short description about your task..." class="form-control" id="text_area_sty" name="task_description"><?php echo $info['task_description'] ?></textarea> 
				</div>

				<div class="form-group" id="form_grab">
					<textarea placeholder="How would you accomplish this task..." class="form-control" id="text_area_sty" name="task_accomplish_method"><?php echo $info['task_accomplish_method'] ?></textarea> 
				</div>	

				<div class="form-group" >
					<input class="form-control" type="hidden" name="task_time" value="<?php echo $time_current ?>">
				</div>

				<div class="form-group">
					<input class="form-control" type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>">
				</div>

				<div class="form-group" id="form_grab">
					<input class="form-control btn_drive" type="submit" name="task_submit" value="Add Task">
				</div>	

			</div>
		</form>
	</div>

