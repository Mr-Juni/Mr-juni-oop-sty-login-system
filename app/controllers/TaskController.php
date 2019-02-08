<?php

/**
 * Task Controller
 */
namespace App\Controllers;

use App\Core\App; 
use App\Core\Validation; 

class TaskController
{
	public $output = [];
	public $formValueKeeper = [];
	public $hints = 'hints';
	protected $table_name = 'tasks';
	
	public function InsertTask() {
		//Run the validation process for our registration form
		if (isset($_POST['task_submit'])) 
		{
			$user_id                 =  trim($_POST['user_id']);
			$task_title              = trim($_POST['task_title']);
			$task_description        =  trim($_POST['task_description']);
			$task_accomplish_method  =  trim($_POST['task_accomplish_method']);
			$task_time               =  trim($_POST['task_time']);
			$task_date               =  trim($_POST['task_date']);	

			//Convert to uppper case

				$task_title             = ucfirst($task_title);
				$task_description       = ucfirst($task_description);
				$task_accomplish_method = ucfirst($task_accomplish_method);	

			Validation::bindData('task', $this->table_name, [

					'user_id'                => $user_id,
					'task_title'             => $task_title,
					'task_description'       => $task_description,
					'task_accomplish_method' => $task_accomplish_method,
					'task_time'              => $task_time,
					'task_date'              => $task_date

				]);

			//use to return the od input detaills  if an error occur
			$this->formValueKeeper = Validation::formValueKeeper('task');
				//Get the error output if any 
			$this->output = Validation::getDataTask('task');

			//After Validation

/////////////////////////////////////////////////////////////////////////////
			if (empty($this->output['errors'])) {	

				$table_name = $this->table_name;

				//Insert the name into a database 
				App::get('database')->InsertData($table_name, [

				'user_id'                => $user_id,
				'task_title'             => $task_title,
				'task_description'       => $task_description,
				'task_accomplish_method' => $task_accomplish_method,
				'task_time'              => $task_time,
				'task_date'              => $task_date

				]);
				$this->output['errors'] = 'success';

			    $msgs = $this->output['errors'];
			}else{

				$msgs = $this->output['errors'];
				$infos = $this->formValueKeeper;
				$hints = $this->hints;

			}

			return view("index", [

					'msgs' => $msgs,
					'infos' => $infos,
					'hints' => $hints


				]);
		}


	} 

}