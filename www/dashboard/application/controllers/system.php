<?php

class System extends Controller {
	
	function index()
	{
		$template = $this->loadView('system_view');
		$template->set('memoryUsage', $this->getServerMemoryUsage());
		$template->render();
	}

	public function getServerMemoryUsage(){

	    $free = shell_exec('free');
	    $free = (string)trim($free);
	    $free_arr = explode("\n", $free);
	    $mem = explode(" ", $free_arr[1]);
	    $mem = array_filter($mem);
	    $mem = array_merge($mem);
	    $memory_usage = $mem[2]/$mem[1]*100;

	    return $memory_usage;
	}
}

?>
