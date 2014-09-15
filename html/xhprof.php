<?php

function __xhprof_save()
{
	$data = xhprof_disable();
	$runs = new XHProfRuns_Default();
	$runs->save_run($data, 'slim');
}
xhprof_enable();
register_shutdown_function('__xhprof_save');

