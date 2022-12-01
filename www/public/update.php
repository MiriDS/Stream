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

        if ($stmt->fetchColumn() == 1 ) {
            print 'Database '. DB_NAME .' is exists.<br />';
        
            print 'Updating tables of '. DB_NAME .'<br />';            

            $db->exec("use $name");
            $db->exec("SET NAMES utf8mb4;
            SET FOREIGN_KEY_CHECKS = 0;
            
            -- ----------------------------
            -- Table structure for graphic_presets
            -- ----------------------------
            DROP TABLE IF EXISTS `graphic_presets`;
            CREATE TABLE `graphic_presets`  (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
              `passes_count` int(11) NULL DEFAULT 0,
              `pause_between_passes` int(11) NULL DEFAULT NULL,
              `font_color` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
              `background_color` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
              `bottom_margin` smallint(6) NULL DEFAULT NULL,
              `font_size` smallint(6) NULL DEFAULT NULL,
              `text_padding` smallint(6) NULL DEFAULT NULL,
              `text_speed` smallint(6) NULL DEFAULT NULL,
              `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
              `is_deleted` smallint(6) NULL DEFAULT 0,
              PRIMARY KEY (`id`) USING BTREE
            ) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;
            
            SET FOREIGN_KEY_CHECKS = 1;");

            echo 'Job done! <br />';

            print '<a href="' . URL . '">Go to app.</a>';
        } else {
            print 'Database '. DB_NAME .' is not exists!<br />';

            print '<a href="' . URL . 'init">Go init app.</a>';
        }
    }
    catch(PDOException $e) {
        echo $e->getMessage();
        exit;
    }


?>