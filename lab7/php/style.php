<?php

header('Content-Type: text/css');


header('Cache-Control: public, max-age=86400');
header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 86400) . ' GMT');


echo "
body {
    background-color: #f0f0f0;
    font-family: Arial, sans-serif;
}
h1 {
    color: #333;
}
";
