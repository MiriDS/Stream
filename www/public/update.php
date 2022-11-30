<?php

    $host = DB_HOST;
    $name = DB_NAME;
    $user = DB_USER;
    $pass = DB_PASS;

    $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);

    print 'Connecting to '. DB_TYPE .'...<br />';

    try {
        $db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);

        print 'Connected to '. DB_TYPE .'<br />';
    
        $stmt = $db->query("SELECT COUNT(*) FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$name'");
        
        print 'Checking if database '. DB_NAME .' exists...<br />';

        if ($stmt->fetchColumn() == 1) {
            print 'Database '. DB_NAME .' is exists!<br />';
        
            print 'Updating '. DB_NAME .'<br />';

			$db->exec("use $name");
            $db->exec("SET NAMES utf8mb4;
            SET FOREIGN_KEY_CHECKS = 0;
            
            -- ----------------------------
            -- Table structure for scheduler
            -- ----------------------------
            DROP TABLE IF EXISTS `scheduler`;
            CREATE TABLE `scheduler` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `name` varchar(255) DEFAULT NULL,
              `text_preset` int(11) DEFAULT NULL,
              `graphic_preset` int(11) DEFAULT NULL,
              `group` int(11) DEFAULT NULL,
              `start_time` datetime DEFAULT NULL,
              `end_time` datetime DEFAULT NULL,
              `period` int(11) DEFAULT NULL,
              `is_deleted` int(11) DEFAULT 0,
              `status` int(11) DEFAULT 0,
              `sent` tinyint(4) DEFAULT 0,
              PRIMARY KEY (`id`) USING BTREE
            ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;
            
            SET FOREIGN_KEY_CHECKS = 1;");

            echo 'Job done! <br />';

            print '<a href="' . URL . '">Go to app.</a>';
        } else {
            print 'Database '. DB_NAME .' is not exists!<br />';

            print '<a href="' . URL . 'init">Initialize app.</a>';
        }
    }
    catch(PDOException $e) {
        echo $e->getMessage();
        exit;
    }


?>