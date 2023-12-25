<?php
session_start();
session_destroy();
header('Location: storage.html');
exit();

?>
