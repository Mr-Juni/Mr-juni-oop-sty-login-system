<?php

/**
 * Session Class
 */
namespace App\Core;

class Session
{
	
	public function start()
	{
		session_start();
	}

	public function destroy()
	{
		session_destroy();
	}

}