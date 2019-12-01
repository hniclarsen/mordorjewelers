<!DOCTYPE html>
<html>
    <head>
        <?php require_once "../global-head.php" ?>
        <link rel="stylesheet" type="text/css" href="/signup/sign-up.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="sign-up.js"></script>
    </head>
    <body>
        <?php require_once "../header-nav.php" ?>
        <div id="toast">
            <?php
                if(isset($_SESSION['sentiment'])) {
                    echo nl2br($_SESSION['sentiment']);
                    unset($_SESSION['sentiment']);
                    echo "<script>showToast('invalid');</script>";
                };
            ?>
        </div>
        <div id="sign-up-page">
            <h1 class="center">Sign Up</h1>
            <form action="sign-up-handler.php" method="post" class="form1" id="sign-up">
                <div class="col2-left">
                    <label for="name">Your Name</label>
                        <input id="name" name="name" type="text" placeholder="Your Name"
                            <?php
                                if(isset($_SESSION['name'])) {
                                    echo "value={$_SESSION['name']}";
                                    unset($_SESSION['name']);
                                }
                            ?>
                        />
                    <label for="email">E-mail Address</label>
                        <input id="email" name="email" type="text" placeholder="E-mail Address"
                            <?php
                                if(isset($_SESSION['email'])) {
                                    echo "value={$_SESSION['email']}";
                                    unset($_SESSION['email']);
                                }
                            ?>
                        />
                </div>
                <div class="col2-right">
                    <label for="passwd">Password</label>
                        <input id="passwd" name="passwd" type="password" placeholder="Password"/>
                    <label for="conf-passwd">Confirm Password</label>
                        <input id="conf-passwd" name="conf-passwd" type="password" placeholder="Confirm Password"/>
                </div>
                <div id="sign-up-submit">
                    <input type="submit" value="Sign Up"/>
                </div>
            </form>
            <div id="message">
                <?php 
                    if(isset($_SESSION['message'])) {
                        echo nl2br($_SESSION['message']);
                        unset($_SESSION['message']);
                    }
                ?>
            </div>
            <div class="text-link"><a href="/login/log-in.php">
                Already have an account? Log in here.
            </a></div>
            <pre id="password-rules" class="center">
            <em>Password must contain:</em>
                * Minimum of 8 characters
                * Minimum of 1 upper case letter
                * Minimum of 1 lower case letter
                * Minimum of 1 digit [0-9]
                * Minimum of 1 special character [!@#$%^&*()]
            </pre>
        </div>
        <?php require_once "../footer.html" ?>
    </body>
</html>