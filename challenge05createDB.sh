#!/bin/bash
read -s -p "mysql password (1): " password
cat <<- EOF | mysql -h127.0.0.1 -P3306 -uroot -p$password
    GRANT ALL PRIVILEGES ON *.* TO 'mysql'@'%';
    DROP DATABASE IF EXISTS Exads;
    CREATE DATABASE Exads CHARACTER SET utf8 COLLATE utf8_general_ci;
    GRANT ALL PRIVILEGES ON Exads.* TO 'mysql'@'%';
    FLUSH PRIVILEGES;
    ALTER USER 'mysql'@'%' IDENTIFIED WITH mysql_native_password by '1';
    USE Exads;    
    DROP PROCEDURE IF EXISTS create_promotions_table;
    DELIMITER //
        CREATE PROCEDURE create_promotions_table()
        BEGIN
            IF NOT EXISTS(
                SELECT NULL
                    FROM information_schema.tables ist
                    WHERE ist.table_schema = DATABASE() AND
                          ist.table_name = "promotions"
            ) THEN
                CREATE TABLE promotions (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    name VARCHAR(256) NOT NULL,
                    split_percent INT NOT NULL
                );
        
                INSERT INTO promotions (name, split_percent)
                    VALUES 
                        ("Design 1",50),
                        ("Design 2",25),
                        ("Design 3",25);
            END IF;
        END //
    DELIMITER ;
    CALL create_promotions_table;
    DROP PROCEDURE IF EXISTS create_end_user_table;
    DELIMITER //
        CREATE PROCEDURE create_end_user_table()
        BEGIN
            IF NOT EXISTS(
                SELECT NULL
                    FROM information_schema.tables ist
                    WHERE ist.table_schema = DATABASE() AND
                          ist.table_name = "end_user"
            ) THEN
                CREATE TABLE end_user (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    name VARCHAR(256) NOT NULL,
                    email VARCHAR(256) NOT NULL
                );
        
                INSERT INTO end_user (name, email)
                    VALUES 
                        ("USER 1","email1@mail.com"),
                        ("USER 2","email2@mail.com"),
                        ("USER 3","email3@mail.com"),
                        ("USER 4","email4@mail.com"),
                        ("USER 5","email5@mail.com"),
                        ("USER 6","email6@mail.com"),
                        ("USER 7","email7@mail.com"),
                        ("USER 8","email8@mail.com"),
                        ("USER 9","email9@mail.com"),
                        ("USER 10","email10@mail.com"),
                        ("USER 11","email11@mail.com"),
                        ("USER 12","email12@mail.com"),
                        ("USER 13","email13@mail.com"),
                        ("USER 14","email14@mail.com"),
                        ("USER 15","email15@mail.com"),
                        ("USER 16","email16@mail.com"),
                        ("USER 17","email17@mail.com"),
                        ("USER 18","email18@mail.com"),
                        ("USER 19","email19@mail.com"),
                        ("USER 20","email20@mail.com"),
                        ("USER 21","email21@mail.com"),
                        ("USER 22","email22@mail.com"),
                        ("USER 23","email23@mail.com"),
                        ("USER 24","email24@mail.com"),
                        ("USER 25","email25@mail.com"),
                        ("USER 26","email26@mail.com"),
                        ("USER 27","email27@mail.com"),
                        ("USER 28","email28@mail.com"),
                        ("USER 29","email29@mail.com"),
                        ("USER 30","email30@mail.com"),
                        ("USER 31","email31@mail.com"),
                        ("USER 32","email32@mail.com"),
                        ("USER 33","email33@mail.com"),
                        ("USER 34","email34@mail.com"),
                        ("USER 35","email35@mail.com"),
                        ("USER 36","email36@mail.com"),
                        ("USER 37","email37@mail.com"),
                        ("USER 38","email38@mail.com"),
                        ("USER 39","email39@mail.com"),
                        ("USER 40","email40@mail.com");
            END IF;
    END//
    DELIMITER ;
    CALL create_end_user_table;           
EOF

