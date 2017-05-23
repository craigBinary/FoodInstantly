<?php
$token=$_REQUEST["token_oculto"];
error_reporting(E_ALL | E_STRICT);
require('UploadHandler.php');
$upload_handler = new UploadHandler();

