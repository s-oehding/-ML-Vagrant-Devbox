<?php
/**
* Notification System
*/
class Notifications
{
	

	/**
	 * Class constructor: Initializes the session and creates the notifications array if it doesn't exist
	 *
	 */
	public function __construct() {
		
		if (!isset($_SESSION['Notifications']) || !is_array($_SESSION['Notifications'])) {
			$_SESSION['Notifications'] = array();
		}
		
	}
	
	/**
	 * Pulls the oldest notification off the stack and returns it 
	 *
	 * @return void
	 */
	public function shift() {
		return array_shift($_SESSION['Notifications']);
	}
	
	
	/**
	 * Pulls the most recent notification off the stack and returns it
	 *
	 * @return StdClass
	 */
	public function pop() {
		return array_pop($_SESSION['Notifications']);
	}

	/**
	 * Returns the entire notification stack and resets the contents
	 *
	 * @return array
	 */
	public function popAll() {
		$list = $_SESSION['Notifications'];
		$_SESSION['Notifications'] = array();
		return $list;
	}
	
	
	/**
	 * Appends a new notification onto the stack
	 *
	 * @return $this
	 */
	public function push($title = 'Message Title',$message = 'Message Body', $class = 'info') {
		$_SESSION['Notifications'][] = (object)array('title'=>$title,'message'=>$message, 'className'=>$class);
		return json_encode($this);
	}

}
?>