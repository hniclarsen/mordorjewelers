<!DOCTYPE html>
<html>
    <head>
        <?php require_once "../global-head.php" ?>
        <link rel="stylesheet" type="text/css" href="/login/login.css"/>
    </head>
    <body>
        <?php require_once "../header-nav.php" ?>
        <div id="log-in-page">
            <h1 class="center">Log In</h1>
            <form action="log-in-handler.php" method="post" class="form1" id="log-in">
                <div id="log-in-fields">
                    <label for="email">E-mail Address</label>
                      <input id="email" name="email" type="text" placeholder="E-mail Address"/>
                    <label for="passwd">Password</label>
                      <input id="passwd" name="passwd" type="password" placeholder="Password"/>
                </div>
                <div id="log-in-submit">
                    <input type="submit" value="Log In"/>
                </div>
            </form>
            <div class="text-link"><a href="/signup/sign-up.php">
                Don't have an account? Sign up here.
            </a></div>
        </div>
        <?php require_once "../footer.html" ?>
    </body>
</html>