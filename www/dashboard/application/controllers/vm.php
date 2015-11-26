<?php

class Vm extends Controller {

	function index()
	{
		$template = $this->loadView('vm_view');
		$template->set('memoryUsage', $this->getMemoryUsage());
		$template->render();
	}

	function getMemoryUsage(){
		$free = shell_exec('free');
		$free = (string)trim($free);
		$free_arr = explode("\n", $free);
		$mem = explode(" ", $free_arr[1]);
		$mem = array_filter($mem);
		$mem = array_merge($mem);
		$memory_usage = $mem[2]/$mem[1]*100;

		return $memory_usage;
	}

	function getCpuStatus(){
		$loads=sys_getloadavg();
		$core_nums=trim(shell_exec("grep -P '^physical id' /proc/cpuinfo|wc -l"));
		$load=$loads[0]*10;
		// $return['core_nums'] = $core_nums;
		// $return['load'] = $load;
		return $load;
	}
}

?>
