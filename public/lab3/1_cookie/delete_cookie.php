<?php

$cookieName = 'username';

set cookie($cookieName, '', time() - 3600, "/");
header('Location: index.php');
exit;
