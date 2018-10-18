<?php

if (isset($_POST['submit-encrypt-file'])) {

    $destination = $_POST['destination'];
    $source = $_POST['source'];
    $email_recipient = $_POST['email-recipient'];

    exec('gpg --encrypt --output ' . $destination . ' --recipient ' . $email_recipient . ' ' . $source);
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GnuPG Simple Tool</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<a href="/gnupg">Go Back Index</a>
<br/>

<h1>GnuPG Encrypt File</h1>
<form action="" method="POST">
    <table>
        <tbody>
            <tr>
                <td>Destination:</td>
                <td><input type="text" name="destination" value="" placeholder="/var/www/site/ecrypted_file.gpg"></td>
            </tr>
            <tr>
                <td><br/></td>
            </tr>
            <tr>
                <td>Source:</td>
                <td><input type="text" name="source" value="" placeholder="/var/www/site/source_file.txt"></td>
            </tr>
            <tr>
                <td><br/></td>
            </tr>
            <tr>
                <td>Email Recipient:</td>
                <td><input type="text" name="email-recipient" value="" placeholder=""></td>
            </tr>
            <tr>
                <td><br/></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit-encrypt-file" value="Encrypt File Now" placeholder=""></td>
            </tr>
            <tr>
                <td><br/></td>
            </tr>
        </tbody>
    </table>
</form>
</body>
</html>
