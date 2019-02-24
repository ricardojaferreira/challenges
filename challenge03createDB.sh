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
    DROP PROCEDURE IF EXISTS create_exads_test_table;
    DELIMITER //
        CREATE PROCEDURE create_exads_test_table()
        BEGIN
            IF NOT EXISTS(
                SELECT NULL
                    FROM information_schema.tables ist
                    WHERE ist.table_schema = DATABASE() AND
                          ist.table_name = "exads_test"
            ) THEN
                CREATE TABLE exads_test (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    name VARCHAR(256) NOT NULL,
                    age INT NOT NULL,
                    job_title VARCHAR(256)
                );
        
                INSERT INTO exads_test (name, age, job_title)
                    VALUES 
                        ("Peter",20,"Taxi Driver"),
                        ("Mary",35,"Bartender"),
                        ("Adam",24,"Student"),
                        ("Rose",40,"Full time mom");
            END IF;
        END //
    DELIMITER ;
    CALL create_exads_test_table;           
EOF

