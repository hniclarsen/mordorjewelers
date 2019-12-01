<!DOCTYPE html>
<html>
    <head>
        <?php require_once "../../global-head.php" ?>
        <link rel="stylesheet" type="text/css" href="product-editor.css"/>
    </head>
    <body>
        <?php require_once "../../header-nav.php" ?>
        <div id="product-editor-page">
            <h1>Create Product</h1>
            <form action="product-editor-handler.php" method="post" id="product-editor-form">
                <label for="name">Product Name</label>
                    <input id="name" name="name" type="text" placeholder="Product Name"/>
                <label for="price">Price</label>
                    <input id="price" name="price" type="text" placeholder="Price"/>
                <label for="qty">Quantity Available</label>
                    <input id="qty" name="qty" type="text" placeholder="Qty"/>
                <label for="description">Description</label>
                    <textarea id="description" name="description"></textarea>
                <label for="img">Upload Images</label>
                    <input id="img" name="img" type="file" accept="img/*" multiple="true"/>
                <input type="submit" value="Create Product"/>
            </form>
        </div>
        <?php require_once "../../footer.html" ?>
    </body>
</html>