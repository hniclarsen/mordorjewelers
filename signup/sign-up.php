<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" href="favicon.ico" type="image/x-icon"/>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
        <link href="data:image/x-icon;base64,AAABAAEAEBAAAAEAIABoBAAAFgAAACgAAAAQAAAAIAAAAAEAIAAAAAAAAAQAABMLAAATCwAAAAAAAAAAAAAUI0n/JS1S/yo1XP8tPWf/JjVq/yc0bv8zT5D/L0SG/yI1cf8iUJ7/HkOC/xIVSP8LEzj/CAcd/wYLJf8FEzj/HzBr/ywuSv8zQHP/Mk6A/yZRhf8pUJj/PGep/zNdqP8kRpP/Ileq/xc+hP8QMnT/CRhJ/wUFJP8EBCL/AwQk/yFHrP8nRJT/Hidf/yI8gv8fMWT/JEN+/ycvd/8cIXD/GSJ1/xYnhP8QH2H/DTdx/w8yaP8HF0//BQk9/wYNQf8oQXP/Klax/xVJp/8cRJD/GSt+/xURWP8aSKX/GWK8/xtbtP8PS7f/DQ5U/wgALv8JLm7/CD2Y/wYRWv8JEEH/Cgw3/w4iX/8SSZn/Did3/w8qgP8JUbX/GKjw/xfK//8gvv//EZv3/wtk0/8HJoT/Bg9b/wUle/8QNH3/GUSX/wQBNv8KIm7/EDR9/w4fev8RkvP/CZr5/wlf4v81o+z/MJHl/wUzuP8QkfL/Cp/+/wcnh/8GAEj/MILO/yN/6P8FCFL/CjeQ/wpHrP8khdD/Iojp/w1Kzf8CJqb/eLDV/4K2xf8ON6D/Byuw/wk9pf8Qcdj/F33S/ymg+/8kkfD/LbX1/1DU+v+A////RtL8/xs5rP8VR7j/DSqv/1mi2P+yytL/V3vH/wAhlv8GFWP/EleS/3////84uPX/BG3P/xljtP8aedL/MIHU/yqv8v8ol/b/IGfn/x9f6/9Nqdz/ptXV/06Ey/8CNaz/EVLF/zuz8v8uqfD/EHHJ/wdCoP8NEE3/DTCK/w00kf8RSq//LNL+/0PO//8lbtf/N4vS/0Ov2f8BP8D/EG/Z/xa6+/8JTrD/ABd9/wU3lP8GEWr/DhA8/wsobv8XSZv/HUe3/xxZy/8gh9z/E63+/z/h//8htvr/CHTx/wmK9f8ERK7/BBx2/wkjgP8QJnf/DhBR/xEYUf8KLXX/DDWI/w4jdv8FClL/AAFW/wU3n/8Iab//FXHQ/w4/of8BB3T/Cwda/wwfaP8OP5r/GSN3/xMQRf8FACz/CRxd/w0sYv8EHlz/BCBh/wMJRP8GCEv/Cgxe/wgJTv8GBkf/AwAp/xIiXf8PPpb/CRle/w0ST/8TE1X/EDJr/wIBJ/8DBCj/AhdS/wEbXv8DImz/BCdv/wora/8IGlH/BiJi/xMucv8OGUT/Bgo8/wkQUf8ICC3/DRA4/wogQv8CARn/AQEg/wECIP8BBi3/Agk4/wMSUf8MNnr/Dj+B/wMcXP8XQ5H/J0mP/wYFH/8EBCr/DBFE/xMlVP8JH0b/BB5N/wEGJ/8BAhr/AQEb/wEBGv8CACH/BwY0/wgLO/8BAi3/AAo4/wgSPf8GCB3/AwIY/wcRPv8narT/AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA==" rel="icon" type="image/x-icon" />
        <link rel="stylesheet" type="text/css" href="/signup/sign-up.css"/>
    </head>
    <body>
        <?php require_once "../header-nav.html" ?>
        <div id="sign-up-page">
            <h1 class="center">Sign Up</h1>
            <form action="sign-up-handler.php" method="post" class="form1" id="sign-up">
                <div class="col2-left">
                    <label for="name">Your Name</label>
                        <input id="name" name="name" type="text" placeholder="Your Name"/>
                    <label for="passwd">Password</label>
                        <input id="passwd" name="passwd" type="text" placeholder="Password"/>
                </div>
                <div class="col2-right">
                    <label for="email">E-mail Address</label>
                        <input id="email" name="email" type="text" placeholder="E-mail Address"/>
                    <label for="conf-passwd">Confirm Password</label>
                        <input id="conf-passwd" name="conf-passwd" type="text" placeholder="Confirm Password"/>
                </div>
                <div id="sign-up-submit">
                    <input type="submit" value="Sign Up"/>
                </div>
            </form>
            <div class="text-link"><a href="/login/log-in.php">
                Already have an account? Log in here.
            </a></div>
        </div>
        <?php require_once "../footer.html" ?>
    </body>
</html>