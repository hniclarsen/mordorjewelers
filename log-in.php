<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="global.css"/>
    </head>
    <body>
        <?php require_once "./header-nav.html" ?>
        <div id="log-in-page">
            <h1 class="center">Log In</h1>
            <div class="form1" id="log-in">
                <div id="log-in-fields">
                    <label for="email">E-mail Address</label>
                    <input id="email" type="text" placeholder="E-mail Address"/>
                    <label for="passwd">Password</label>
                    <input id="passwd" type="text" placeholder="Password"/>
                </div>
                <div id="log-in-submit">
                    <input type="submit" value="Log In"/>
                </div>
            </div>
            <div class="registration-link"><a href="sign-up.php">
                Don't have an account? Sign up here.
            </a></div>
        </div>
        <?php require_once "./footer.html" ?>
    </body>
</html>