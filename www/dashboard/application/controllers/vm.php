<?php

require_once(APP_DIR . 'helpers/system_helper.php');


class Vm extends Controller
{

    function index()
    {
        $template = $this->loadView('vm_view');
        $template->set('memoryUsage', $this->getMemoryUsage());
        $template->render();
    }

    function getMemoryUsage()
    {
        $free = shell_exec('free');
        $free = (string)trim($free);
        $free_arr = explode("\n", $free);
        $mem = explode(" ", $free_arr[1]);
        $mem = array_filter($mem);
        $mem = array_merge($mem);
        $memory_usage = $mem[2] / $mem[1] * 100;

        return $memory_usage;
    }

    function getCpuLoad()
    {
        $stat1 = file('/proc/stat');
        sleep(1);
        $stat2 = file('/proc/stat');
        $info1 = explode(" ", preg_replace("!cpu +!", "", $stat1[0]));
        $info2 = explode(" ", preg_replace("!cpu +!", "", $stat2[0]));
        $dif = array();
        $dif['user'] = $info2[0] - $info1[0];
        $dif['nice'] = $info2[1] - $info1[1];
        $dif['sys'] = $info2[2] - $info1[2];
        $dif['idle'] = $info2[3] - $info1[3];
        $total = array_sum($dif);
        $cpu = array();
        foreach ($dif as $x => $y) $cpu[$x] = round($y / $total * 100, 1);

        // print_r($cpu);
        return json_encode($cpu);
    }

    function getUptime()
    {
        $uptime = system("uptime");
        return $uptime;
    }

    function getCpuInfo()
    {
        $cpu = system("cat /proc/cpuinfo | grep \"model name\\|processor\"");
    }


    function getSystemInformation()
    {
        // Hostname
        $hostname = php_uname('n');
        // OS
        if (!($os = shell_exec('/usr/bin/lsb_release -ds | cut -d= -f2 | tr -d \'"\''))) {
            if (!($os = shell_exec('cat /etc/system-release | cut -d= -f2 | tr -d \'"\''))) {
                if (!($os = shell_exec('find /etc/*-release -type f -exec cat {} \; | grep PRETTY_NAME | tail -n 1 | cut -d= -f2 | tr -d \'"\''))) {
                    $os = 'N.A';
                }
            }
        }
        $os = trim($os, '"');
        $os = str_replace("\n", '', $os);
        // Kernel
        if (!($kernel = shell_exec('/bin/uname -r'))) {
            $kernel = 'N.A';
        }
        // Uptime
        if (!($totalSeconds = shell_exec('/usr/bin/cut -d. -f1 /proc/uptime'))) {
            $uptime = 'N.A';
        } else {
            $uptime = $totalSeconds;
        }
        // Last boot
        if (!($upt_tmp = shell_exec('cat /proc/uptime'))) {
            $last_boot = 'N.A';
        } else {
            $upt = explode(' ', $upt_tmp);
            $last_boot = date('Y-m-d H:i:s', time() - intval($upt[0]));
        }
        // Current users
        if (!($current_users = shell_exec('who -u | awk \'{ print $1 }\' | wc -l'))) {
            $current_users = 'N.A';
        }
        // Server datetime
        if (!($server_date = shell_exec('/bin/date'))) {
            $server_date = date('Y-m-d H:i:s');
        }
        $datas = array(
            'hostname' => $hostname,
            'os' => $os,
            'kernel' => $kernel,
            'uptime' => $uptime,
            'last_boot' => $last_boot,
            'current_users' => $current_users,
            'server_date' => $server_date,
        );
        print_r($datas);
    }

    function getServices()
    {

        $helper = new System_helper();

        $datas = array();

        $available_protocols = array('tcp', 'udp');

        $show_port = $helper->get('services:show_port');

        if (count($helper->get('services:list')) > 0) {
            foreach ($helper->get('services:list') as $service) {
                $host = $service['host'];
                $port = $service['port'];
                $name = $service['name'];
                $protocol = isset($service['protocol']) && in_array($service['protocol'], $available_protocols) ? $service['protocol'] : 'tcp';

                if ($helper->scanPort($host, $port, $protocol))
                    $status = 1;
                else
                    $status = 0;

                $datas[] = array(
                    'port' => $show_port === true ? $port : '',
                    'name' => $name,
                    'status' => $status,
                );
            }
        }


        echo json_encode($datas);
    }
}

?>
