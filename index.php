<!DOCTYPE html>
<html>
<head>
    <title>PHP Webmail</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="<?= $dark_mode ? 'dark-mode' : '' ?>">
<div class="container">
    <h1>Send Email</h1>
    <form action="sendmail.php" method="post">
        <label for="from">From:</label>
        <input type="email" name="from" id="from" required>
        <label for="fromName">From Name:</label>
        <input type="text" name="fromName" id="fromName" required>
        <label for="to">To:</label>
        <input type="email" name="to" id="to" required>
        <label for="toName">To Name:</label>
        <input type="text" name="toName" id="toName" required>
        <label for="subject">Subject:</label>
        <input type="text" name="subject" id="subject" required>
        <label for="message">Message:</label>
        <textarea name="message" id="message" rows="5" required></textarea>
        <input type="submit" value="Send">
    </form>
    <a href="?dark_mode=<?= $dark_mode ? '0' : '1' ?>">Darker</a>

    <h1>Email Panel</h1>
    <ul>
        <?php foreach ($emails['items'] as $email): ?>
            <li>
                <fieldset>
                    <strong>From:</strong> <?= $email['From']['Mailbox'] ?>@<?= $email['From']['Domain'] ?><br>
                    <strong>To:</strong> <?= $email['To'][0]['Mailbox'] ?>@<?= $email['To'][0]['Domain'] ?><br>
                </fieldset>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
</body>
</html>