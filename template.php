
<!DOCTYPE html>
<html>
    
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" type="text/css" href="styles/StyleSheet.css">
    </head>
    
    <body>
        <div id="wrapper">
            <div id="banner">
            
            </div>
            
            <nav id ="navigation">
                <ul id="nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="levintan.php">Paint</a></li>
                    <li><a href="#">Shop</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="Management.php">Management</a></li>
                </ul>
            </nav>
            
            <div id="content_area">
                <?php echo $content; ?>
            </div> 
            
            <footer>
                <p> All right reserved <p>
            </footer>
        </div>
    </body>
    
</html>