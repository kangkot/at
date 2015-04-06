<?php # local settings.php 

function node_init() {
  if (!empty($_GET['profile'])) {
    $XHPROF_ROOT = "/data/disk/o1/static/xhprof";
    require_once $XHPROF_ROOT . "/xhprof_lib/utils/xhprof_lib.php";
    require_once $XHPROF_ROOT . "/xhprof_lib/utils/xhprof_runs.php";
    error_reporting(E_ALL & ~E_NOTICE);
    xhprof_enable(XHPROF_FLAGS_NO_BUILTINS | XHPROF_FLAGS_CPU | XHPROF_FLAGS_MEMORY);
  }
}

function system_exit() {
  if (!empty($_GET['profile'])) {
    $output = xhprof_disable();
    echo '<a href="http://xhprof.dev.example.com/?&symbol=menu_execute_active_handler',
      '&source=', $_SERVER['SERVER_NAME'],
      '&run=', $run_id = (new XHProfRuns_Default())->save_run($output, $_SERVER['SERVER_NAME']), '">XHProf #', $run_id, '</a>';
  }
}
