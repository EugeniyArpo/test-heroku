<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test</title>
</head>
<body>

<form action="index.php" method="post">
    <div class="container">
        <h1>Register</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>
        <input type="hidden" name="send" value="1">
        <label for="name"><b>Name</b></label>
        <input type="text" placeholder="Enter Name" name="name" id="name" required>
        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
        <hr>
        <button type="submit" class="registerbtn">Register</button>
    </div>
</form>

</body>
</html>

<?php
session_start();
if (isset($_POST['send'])) {

    $publicKey = md5(microtime() . rand());
    $privateKey = md5(microtime() . rand());

    $login = $_POST['name'];
    $pass = $_POST['psw'];


    file_put_contents('.users', $login . ':' . $publicKey . PHP_EOL, FILE_APPEND);

    var_dump($publicKey);
    var_dump($privateKey);

    $hash = base64_encode(sha1($privateKey, true));

    $contents = $publicKey . ':{SHA}' . $hash;

    file_put_contents('.htpasswd', $contents . PHP_EOL, FILE_APPEND);

    $_SESSION['success'] = "Welcome  $login";
    $_SESSION['publicKey'] = "$publicKey";
    $_SESSION['privateKey'] = "$privateKey";

    Header('Location: /success.php');
    exit;

}


//$publicKey = md5(microtime().rand());
//$privateKey = md5(microtime().rand());
//
//var_dump($publicKey);
//var_dump($privateKey);
//
//$login = 'foo';
//$pass = 'pass';
//$hash = base64_encode(sha1($pass, true));
//
//$contents = $login . ':{SHA}' . $hash;
//
//file_put_contents('.htpasswd', $contents);