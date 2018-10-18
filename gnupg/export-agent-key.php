<?php

if (isset($_POST['submit-export-public-key'])) {

    $destination = $_POST['destination'];
    $email = $_POST['email'];
    
    switch ($_POST['type']) {
        case 'secret':
            exec('gpg --output ' . $destination . ' --export-secret-key ' . $email);
            break;
        case 'public':
        default:
            exec('gpg --output ' . $destination . ' --export ' . $email);
            break;
    }
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

<h1>GnuPG Export Agent Key</h1>
<form action="" method="POST">
    <table>
        <tbody>
            <tr>
                <td>Type:</td>
                <td>
                    <select name="type" onChange="eventBindOnChangeType()">
                        <option value="public">Public</option>
                        <option value="secret">Secret</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><br/></td>
            </tr>
            <tr>
                <td>Destination:</td>
                <td><input type="text" name="destination" value="" placeholder="/var/www/site/name.gpg.pub.key"></td>
            </tr>
            <tr>
                <td><br/></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text" name="email" value="" placeholder=""></td>
            </tr>
            <tr>
                <td><br/></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit-export-public-key" value="Export Now" placeholder=""></td>
            </tr>
            <tr>
                <td><br/></td>
            </tr>
        </tbody>
    </table>
    <div class="passphrase-note-for-secret-key-" style="display:none;">
        <h2>When exporting the secret key of the agent, it needs to input the passphrase manually in the terminal. Please check the terminal after clicking the export now button.</h2>
    </div>
</form>
<script>
function eventBindOnChangeType() {
    var type = document.getElementsByName("type")[0].value;
    var elePassphraseNoteForSecretKey = document.getElementsByClassName('passphrase-note-for-secret-key-')[0];
    if (type == 'secret') {
        elePassphraseNoteForSecretKey.style.display = '';
    } else {
        elePassphraseNoteForSecretKey.style.display = 'none'; 
    }
}
</script>
</body>
</html>
