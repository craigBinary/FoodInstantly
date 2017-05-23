<?php
$archivo=$_REQUEST["archivo"];
error_reporting(E_ALL | E_STRICT);
require('UploadHandler2.php');
$upload_handler = new UploadHandler2();

