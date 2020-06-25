create database if not exists registration_db;
use registration_db;

CREATE TABLE IF NOT EXISTS images(
    image_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    image_description VARCHAR(150),
    image LONGBLOB NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)

);
