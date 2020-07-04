<?php
session_start();

if (isset($_SESSION['success'])) {

    echo $_SESSION['success'] . '<br />' . '<br />' . '<br />';
    echo 'publicKey - ' . $_SESSION['publicKey'] . '<br />' . '<br />';
    echo 'privateKey - ' . $_SESSION['privateKey'] . '<br />' . '<br />';
    echo 'Please save the keys. My account does not work yet!!!' . '<br />' . '<br />' . '<br />';
	echo 'Module list - '
	
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
    <a href="store/index.html">List of module</a>

    </body>
    </html>


    <?php
}