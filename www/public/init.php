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

        if ($stmt->fetchColumn() <= 0 ) {
            print 'Database '. DB_NAME .' not exists...<br />';
        
            print 'Creating '. DB_NAME .'<br />';

            $db->exec("CREATE DATABASE `$name`;")
            or die(print_r($db->errorInfo(), true));

            // CREATE USER '$user'@'$host' IDENTIFIED BY '$pass';
            // GRANT ALL ON `$name`.* TO '$user'@'$host';
            // FLUSH PRIVILEGES;


            print 'Batabase '. DB_NAME .' is successfully created<br />';

            $db->exec("use $name");
            $db->exec("SET NAMES utf8mb4;
            SET FOREIGN_KEY_CHECKS = 0;
            
            -- ----------------------------
            -- Table structure for admins
            -- ----------------------------
            DROP TABLE IF EXISTS `admins`;
            CREATE TABLE `admins`  (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `username` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
              `password` varchar(120) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
              `salt` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
              `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
              PRIMARY KEY (`id`) USING BTREE
            ) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;
            -- ----------------------------
            -- Records of admins
            -- ----------------------------
            BEGIN;
            INSERT INTO `admins` (`id`, `username`, `password`, `salt`, `name`) VALUES (2, 'miri', 'ec64688bbb80cb0efc6bacb510fad32d', 'wsdl', 'MiriDS');
            INSERT INTO `admins` (`id`, `username`, `password`, `salt`, `name`) VALUES (3, 'admin', '2fc460e0e4982ad5c7ec9b395fac24ac', NULL, 'Administrator');
            COMMIT;
            -- ----------------------------
            -- Table structure for ch_groups
            -- ----------------------------
            DROP TABLE IF EXISTS `ch_groups`;
            CREATE TABLE `ch_groups`  (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
              `created_at` timestamp(0) NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
              `is_deleted` smallint(6) NULL DEFAULT 0,
              PRIMARY KEY (`id`) USING BTREE
            ) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;
            
            -- ----------------------------
            -- Table structure for ch_groups_channels
            -- ----------------------------
            DROP TABLE IF EXISTS `ch_groups_channels`;
            CREATE TABLE `ch_groups_channels`  (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `ch_group_id` int(11) NULL DEFAULT 0,
              `channel_id` int(11) NULL DEFAULT 0,
              `created_at` timestamp(0) NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
              `is_deleted` smallint(6) NULL DEFAULT 0,
              PRIMARY KEY (`id`) USING BTREE
            ) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;
            
            -- ----------------------------
            -- Table structure for channels
            -- ----------------------------
            DROP TABLE IF EXISTS `channels`;
            CREATE TABLE `channels`  (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `id_from_api` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
              `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
              `alias` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
              `state` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
              `disabled` tinyint(1) NULL DEFAULT NULL,
              `is_deleted` tinyint(255) NULL DEFAULT 0,
              `server_ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
              `created_at` timestamp(0) NULL DEFAULT current_timestamp,
              PRIMARY KEY (`id`) USING BTREE
            ) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;
            
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
            ) ENGINE = InnoDB AUTO_INCREMENT = 5 DEFAULT CHARSET = utf8mb4 ROW_FORMAT = Dynamic;
            
            -- ----------------------------
            -- Table structure for scheduler_logs
            -- ----------------------------
            DROP TABLE IF EXISTS `scheduler_logs`;
            CREATE TABLE `scheduler_logs`  (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `action` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
              `created_by` int(11) NULL DEFAULT 0,
              `created_at` timestamp(0) NULL DEFAULT current_timestamp,
              `task_id` int(11) NULL DEFAULT NULL,
              `status` int(11) NULL DEFAULT 0,
              `note` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
              PRIMARY KEY (`id`) USING BTREE
            ) ENGINE = InnoDB AUTO_INCREMENT = 110 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;
            
            -- ----------------------------
            -- Table structure for servers
            -- ----------------------------
            DROP TABLE IF EXISTS `servers`;
            CREATE TABLE `servers`  (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `ip_address` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
              `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
              `is_deleted` smallint(6) NULL DEFAULT 0,
              PRIMARY KEY (`id`) USING BTREE
            ) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;
            
            -- ----------------------------
            -- Table structure for text_presets
            -- ----------------------------
            DROP TABLE IF EXISTS `text_presets`;
            CREATE TABLE `text_presets`  (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
              `text` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
              `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
              `is_deleted` smallint(6) NULL DEFAULT 0,
              PRIMARY KEY (`id`) USING BTREE
            ) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;
            
            SET FOREIGN_KEY_CHECKS = 1;");

            print 'Adding tables and updating information... <br />';

            echo 'Job done! <br />';

            print '<a href="' . URL . '">Go to app.</a>';
        } else {
            print 'Database '. DB_NAME .' is exists!<br />';

            print '<a href="' . URL . '">Go to app.</a>';
        }
    }
    catch(PDOException $e) {
        echo $e->getMessage();
        exit;
    }


?>