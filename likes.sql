create database if not exists registration_db;
use registration_db;

CREATE TABLE IF NOT EXISTS likes(
    image_id INT NOT NULL,
    user_id INT NOT NULL,
    FOREIGN KEY (image_id) REFERENCES images(image_id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);
