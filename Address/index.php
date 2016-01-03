<?php

mb_internal_encoding('UTF-8');

require_once('userlib/config.php');	
require_once(LIBPATH.'execute.php');
require_once(LIBPATH.'view.php');
require_once(LIBPATH.'data.php');

// インスタンスの作成
$execute = new execute();
// main関数の実行
$execute->main();

?>
