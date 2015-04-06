<?php

if (!empty($_GET['profile'])) {
  xhprof_enable(XHPROF_FLAGS_CPU + XHPROF_FLAGS_MEMORY);
  $XHPROF_ROOT = "/data/disk/o1/static/xhprof";
  require_once $XHPROF_ROOT . "/xhprof_lib/utils/xhprof_lib.php";
  require_once $XHPROF_ROOT . "/xhprof_lib/utils/xhprof_runs.php";
}

define('DRUPAL_ROOT', getcwd());
require_once DRUPAL_ROOT . '/includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
menu_execute_active_handler();

if (!empty($_GET['profile'])) {
  $xhprof_runs = new XHProfRuns_Default();
  $run_id = $xhprof_runs->save_run($output = xhprof_disable(), $_SERVER['SERVER_NAME']);
  echo '<a href="http://xhprof.dev.redfusionlabs.com/?run=', $run_id, '&source=', $_SERVER['SERVER_NAME'], '">XHProf #', $run_id, '</a>';
}
