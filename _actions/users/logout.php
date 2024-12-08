<?php
session_start();

use Bb\Blendingbites\Helpers\HTTP;

include('../../env_loader.php');
session_destroy();
HTTP::redirect("/index.php");
?>