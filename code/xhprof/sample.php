<?php

xhprof_enable();

menu_execute_active_handler(); // The code

$xhprof_data = xhprof_disable();

$XHPROF_ROOT = "/var/www/";
include_once $XHPROF_ROOT . "/xhprof_lib/utils/xhprof_lib.php";
include_once $XHPROF_ROOT . "/xhprof_lib/utils/xhprof_runs.php";

$xhprof_runs = new XHProfRuns_Default();
$run_id = $xhprof_runs->save_run($xhprof_data, $_SERVER['SERVER_NAME']);
echo '<a href="http://xhprof.da.go1.com.vn/index.php?run=', $run_id, '&source=', $_SERVER['SERVER_NAME'], '">XHProf #', $run_id, '</a>';
