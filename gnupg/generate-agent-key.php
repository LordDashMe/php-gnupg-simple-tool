<?php

if (isset($_POST['submit-generate-key'])) {

    $key_type = trim($_POST['key-type']);
    $key_length = trim($_POST['key-length']);
    $key_sub_type = trim($_POST['key-sub-type']);
    $key_sub_length = trim($_POST['key-sub-length']);
    $real_name = trim($_POST['real-name']);
    $comment = trim($_POST['comment']);
    $email = trim($_POST['email']);
    $expire_date = trim($_POST['expire-date']);
    $password = trim($_POST['password']);

    exec('cat >temporary-details <<EOF
%echo Generating a basic OpenPGP key
Key-Type: ' . $key_type . '
Key-Length: ' . $key_length . '
Subkey-Type: ' . $key_sub_type . '
Subkey-Length: ' . $key_sub_length . '
Name-Real: ' . $real_name . '
Name-Comment: ' . $comment . '
Name-Email: ' . $email . '
Expire-Date: ' . $expire_date . '
Passphrase: ' . $password . '
# Do a commit here, so that we can later print "done" :-)
%commit
%echo done
EOF
    ');
    exec('gpg --batch --full-generate-key temporary-details');
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

<h1>GnuPG Generate Agent Key</h1>
<form action="" method="POST">
    <table>
        <tbody>
            <tr>
                <td>Please select what kind of key you want:</td>
                <td>
                    <select name="key-type" value="">
                        <option value="Default">Default</option>
                        <option value="DSA">DSA</option>
                        <option value="RSA">RSA</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><br/></td>
            </tr>
            <tr>
                <td>Key Length: between 1024 and 4096 bits log:</td>
                <td><input type="text" name="key-length" value="" placeholder="Suggested 2048"></td>
            </tr>
            <tr>
                <td><br/></td>
            </tr>
            <tr>
                <td>Please select what kind of key sub you want:</td>
                <td>
                    <select name="key-sub-type" value="">
                        <option value="Default">Default</option>
                        <option value="DSA">DSA</option>
                        <option value="RSA">RSA</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><br/></td>
            </tr>
            <tr>
                <td>Key Sub Length: between 1024 and 4096 bits log:</td>
                <td><input type="text" name="key-sub-length" value="" placeholder="Suggested 2048"></td>
            </tr>
            <tr>
                <td><br/></td>
            </tr>
            <tr>
                <td>Please specify how long the key should be valid:</td>
            </tr>
            <tr>
                <td>
                    0 = key does not expire
                (n) = key expires in n days
                (n)w = key expires in n weeks
                (n)m = key expires in n months
                (n)y = key expires in n years,
                Key is valid for?
                </td>
                <td><input type="text" name="expire-date" value="" placeholder="Suggested 1y"></td>
            </tr>
            <tr>
                <td><br/></td>
            </tr>
            <tr>
                <td>Real name:</td>
                <td><input type="text" name="real-name" value="" placeholder="Your/Recipient Full Name"></td>
            </tr>
            <tr>
                <td><br/></td>
            </tr>
            <tr>
                <td>Email name:</td>
                <td><input type="text" name="email" value="" placeholder="Your/Recipient Email Address"></td>
            </tr>
            <tr>
                <td><br/></td>
            </tr>
            <tr>
                <td>Comment:</td>
                <td>
                    <textarea name="comment" value="" placeholder=""></textarea>
                </td>
            </tr>
            <tr>
                <td><br/></td>
            </tr>
            <tr>
                <td>Passphrase:</td>
                <td><input type="password" name="password" value="" placeholder=""></td>
            </tr>
            <tr>
                <td><br/></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit-generate-key" value="Generate Key Now" placeholder=""></td>
            </tr>
            <tr>
                <td><br/></td>
            </tr>
        </tbody>
    </table>
</form>
</body>
</html>
