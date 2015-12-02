<?php

class Main extends Controller
{
    public function __construct()
    {
        $this->loadPlugin('notifications');
        public $notification = new Notifications();
    }

    function index()
    {
        $template = $this->loadView('main_view');
        // $template->render();
        $notification->push('Test Title','Body');
        print_r($_SESSION['Notifications']);
    }

}

?>
