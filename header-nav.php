<div id="header-nav">
    <hr/>
    <header>
        <ul class="header">
            <span class="left">
                <li>
                    <form>
                        <select>
                            <option value="ENGLISH">ENGLISH</option>
                            <option value="TENGWAR">TENGWAR</option>
                        </select>
                    </form>
                </li>
                <li><a href="/contact-us/contact-us.php">
                    CONTACT US
                </a></li>
            </span>
            <span class="right">
                <li><a href="/login/log-in.php">
                    LOGIN
                </a></li>
                <li><a href="/orders/orders.php">
                    ORDERS
                </a></li>
                <li><a href="/wishlist/wishlist.php">
                    WISH LIST
                </a></li>
                <li><a href="/cart/cart.php">
                    CART
                </a></li>
            </span>
            <div id="display-name" class="center">
                <?php
                    if($_COOKIE['username']) {
                        print_r("Welcome, " . $_COOKIE['username']);
                    }
                ?>
            </div>
        </ul>
    </header>
    <hr/>
    <nav>
        <ul class="nav center">
            <span class="ring-link">
                <li><a href="/catalog/catalog.php">
                    <img class="nav-selection" src="/img/catalog_nav.png" alt="Catalog"/>
                </a></li>
                <li><a href="/collections/collections.php">
                    <img class="nav-selection" src="/img/collections_nav.png" alt="Collections"/>
                </a></li>
            </span>
            <span>
                <li><a href="/index.php">
                    <img class="nav-selection" src="/img/logo.png" alt="Mordor Jewelers"/>
                </a></li>
            </span>
            <span class="ring-link">
                <li><a href="/philosophy/philosophy.php">
                    <img class="nav-selection" src="/img/philosophy_nav.png" alt="Philosophy"/>
                </a></li>
                <li><a href="/symbols/symbols.php">
                    <img class="nav-selection" src="/img/symbols_nav.png" alt="Symbols"/>
                </a></li>
            </span>
        </ul>
    </nav>
</div>