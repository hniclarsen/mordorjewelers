<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/signup/sign-up.css"/>
    </head>
    <body>
        <?php require_once "../header-nav.html" ?>
        <div id="sign-up-page">
            <h1 class="center">Sign Up</h1>
            <div class="form1" id="sign-up">
                <div class="col2-left">
                    <label for="name">Your Name</label>
                    <input id="name" type="text" placeholder="Your Name"/>
                    <label for="passwd">Password</label>
                    <input id="passwd" type="text" placeholder="Password"/>
                </div>
                <div class="col2-right">
                    <label for="email">E-mail Address</label>
                    <input id="email" type="text" placeholder="E-mail Address"/>
                    <label for="conf-passwd">Confirm Password</label>
                    <input id="conf-passwd" type="text" placeholder="Confirm Password"/>
                </div>
                <div id="sign-up-submit">
                    <input type="submit" value="Sign Up"/>
                </div>
            </div>
            <div class="text-link"><a href="/login/log-in.php">
                Already have an account? Log in here.
            </a></div>
        </div>
        <?php require_once "../footer.html" ?>
    </body>
</html>