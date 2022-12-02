<?php
	if (count(@$_SESSION) == 0) {
		ini_set('register_globals',1);
		ini_set('session.bug_compat_42',0);
		ini_set('session.bug_compat_warn',0);
		ini_set('session.gc_maxlifetime',60);
		ini_set('session.cookie_lifetime',0);
		ini_set('session.cache_expire',1);
		ini_set('session.auto_start',1);
		ini_set('session.cache_limiter', 1);
		ini_set('display_errors', 1);
		ini_set('session.save_path', 'tmp');
		session_start();
	}
?>
