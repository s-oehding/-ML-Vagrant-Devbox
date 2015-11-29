<?php

class Database extends Controller
{

    function index()
    {
        $template = $this->loadView('database_view');
        $checkMysql = $this->checkMysql();
        $template->set('mysql_exists', $checkMysql['exists']);
        $template->set('mysql_running', $checkMysql['running']);
        $template->set('mysqli_running', $checkMysql['running']);
        $template->set('pdo_running', $checkMysql['pdo']);
        $template->set('mysql_version', $checkMysql['version']);
        $template->render();
    }

    function checkMysql()
    {
        global $config;

        if (extension_loaded('mysql') or extension_loaded('mysqli')) :
            $return['exists'] = TRUE;
        endif;
        if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
            $return['mysqli'] = FALSE;
        } else {
            $mysqli = new mysqli($config['db_host'], $config['db_username'], $config['db_password']);
            $return['mysqli'] = TRUE;
            $return['running'] = TRUE;
            if (mysqli_connect_errno()) {
                $return['running'] = FALSE;
            } else {
                $return['version'] = $mysqli->server_info;
            }
            if (class_exists('PDO')) {
                $return['pdo'] = TRUE;
            } else {
                $return['pdo'] = FALSE;
            }
            $mysqli->close();
        }

        return $return;
    }

}

?>
