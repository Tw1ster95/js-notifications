<?php
    session_start();
    if(isset($_POST['submit_form'])) {
        if(!isset($_POST['name']) || !strlen($_POST['name'])) {
            $_SESSION['notification_error'] = 'Failed to submit the name';
        }
        else if(strlen($_POST['name']) < 3) {
            $_SESSION['notification_warn'] = 'Submitted name shorter than 3 characters';
        }
        else {
            $_SESSION['notification_success'] = 'Successfuly submitted the name';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="style.css">
        
        <script src="notifications.js"></script>
    </head>
    <body>
        <form action="index.php" method="post">
            <input type="text" name="name" placeholder="Name">
            <button type="submit" name="submit_form">Submit</button>
        </form>
        
        <button type="button" id="clickHere">Click Me</button>

        <script>
            const notifications = new Notifications({
                showDelay: 500,
                transitionSpeed: 1000,
                hideDelay: 5000
            });

            document.getElementById('clickHere').addEventListener('click', (e) => notifications.addNotification('success', 'You clicked the button.'))
            
            <?php if(isset($_SESSION['notification_success'])): ?>
                notifications.addNotification('success', '<?php echo $_SESSION['notification_success']; ?>');
            <?php endif; ?>
            <?php if(isset($_SESSION['notification_warn'])): ?>
                notifications.addNotification('warn', '<?php echo $_SESSION['notification_warn']; ?>');
            <?php endif; ?>
            <?php if(isset($_SESSION['notification_error'])): ?>
                notifications.addNotification('error', '<?php echo $_SESSION['notification_error']; ?>');
            <?php endif; ?>
        </script>

        <?php
            unset($_SESSION['notification_success']);
            unset($_SESSION['notification_warn']);
            unset($_SESSION['notification_error']);
        ?>
    </body>
</html>