<?php
spl_autoload_register(function ($className) {
    require_once 'Bo/Feature.php';
    require_once 'Types/IFeature.php';
    require_once 'Cls/DBConnection/Connection.php';
    require_once 'Types/IConnection.php';
    require_once 'Cls/Config/ApplicationSetting.php';
    require_once 'Cls/FeatureManagerFactory.php';
    require_once 'Types/IFeatureManager.php';
    require_once 'Cls/FeatureManager.php';
});
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
       echo phpinfo();
        ?>
    </body>
</html>
