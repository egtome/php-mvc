<?php
defined('SITE_LOADED') OR exit('Access denied');
?>
<html lang="es">
    <head>
        <title><?php echo $this->title ?></title>
        <meta charset="UTF-8">
        
        <!-- Main CSS -->
        <link rel="stylesheet" type="text/css" href="assets/css/styles.css" />

    </head>
    <body>
<?php
//HEADER
include('sections/header.php');
//END HEADER

require_once ($this->view . '.php');

//FOOTER
include('sections/footer.php');
//END FOOTER
?>
    </body>
</html>


