CREATE DATABASE IF NOT EXISTS epinature CHAR SET utf8mb4;

USE epinature;

CREATE TABLE IF NOT EXISTS category(
	id_category INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    name_category VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS products(
   product_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
   name_product VARCHAR(50) NOT NULL,
   `resume` VARCHAR(100),
   `description` VARCHAR(500) NOT NULL,
   ingredients VARCHAR(300) NOT NULL,
   price DECIMAL(7,2) NOT NULL,
   stock_number INT NOT NULL,
   is_available BOOL NOT NULL,
   id_category INT NOT NULL,
   CONSTRAINT fk_product_category FOREIGN KEY(id_category) REFERENCES category(id_category) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS location(
   id_location INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
   name_location VARCHAR(50) NOT NULL,
   adress_location VARCHAR(100) NOT NULL,
   day_location VARCHAR(10) NOT NULL,
   time_start_location VARCHAR(5) NOT NULL,
   time_end_location VARCHAR(5) NOT NULL
);

CREATE TABLE IF NOT EXISTS image(
   id_image INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
   url_image VARCHAR(100) NOT NULL,
   name_image VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS `role`(
   id_role INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
   name_role VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS users(
   user_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
   email VARCHAR(100) NOT NULL,
   phone_number VARCHAR(15),
   firstname VARCHAR(50) NOT NULL,
   lastname VARCHAR(50) NOT NULL,
   password VARCHAR(255) NOT NULL,
   id_role INT,
   CONSTRAINT fk_users_role FOREIGN KEY(id_role) REFERENCES `role`(id_role) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS article(
   article_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
   article_title VARCHAR(50),
   article_text VARCHAR(1000),
   article_date DATETIME NOT NULL,
   user_id INT NOT NULL,
   CONSTRAINT fk_article_user FOREIGN KEY(user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS orders(
   order_id INT NOT NULL PRIMARY KEY,
   order_date DATETIME NOT NULL,
   total_ammount DECIMAL(7,2) NOT NULL,
   order_nb_weeks INT NOT NULL,
   order_state VARCHAR(15) NOT NULL,
   id_location INT NOT NULL,
   user_id INT NOT NULL,
   CONSTRAINT fk_order_location FOREIGN KEY(id_location) REFERENCES location(id_location) ON DELETE CASCADE,
   CONSTRAINT fk_order_user FOREIGN KEY(user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS contain(
   product_id INT NOT NULL,
   order_id INT NOT NULL,
   order_quantity INT NOT NULL,
   PRIMARY KEY(product_id, order_id),
   CONSTRAINT fk_contain_product FOREIGN KEY(product_id) REFERENCES products(product_id) ON DELETE CASCADE,
   CONSTRAINT fk_contain_order FOREIGN KEY(order_id) REFERENCES orders(order_id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS `show`(
   product_id INT NOT NULL,
   id_image INT NOT NULL,
   PRIMARY KEY(product_id, id_image),
   CONSTRAINT fk_show_product FOREIGN KEY(product_id) REFERENCES Products(product_id) ON DELETE CASCADE,
   CONSTRAINT fk_show_image FOREIGN KEY(id_image) REFERENCES image(id_image) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS possess(
   id_location INT NOT NULL,
   id_image INT NOT NULL,
   PRIMARY KEY(id_location, id_image),
   CONSTRAINT fk_possess_location FOREIGN KEY(id_location) REFERENCES location(id_location) ON DELETE CASCADE,
   CONSTRAINT fk_possess_image FOREIGN KEY(id_image) REFERENCES image(id_image) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS has(
   article_id INT NOT NULL,
   id_image INT NOT NULL,
   PRIMARY KEY(article_id, id_image),
   CONSTRAINT fk_has_article FOREIGN KEY(article_id) REFERENCES Article(article_id) ON DELETE CASCADE,
   CONSTRAINT fk_has_image FOREIGN KEY(id_image) REFERENCES image(id_image) ON DELETE CASCADE
);
