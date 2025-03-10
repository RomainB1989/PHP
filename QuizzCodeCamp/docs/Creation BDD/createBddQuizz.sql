CREATE DATABASE IF NOT EXISTS quizz CHAR SET utf8mb4;
USE quizz;
CREATE TABLE IF NOT EXISTS `role`(
   id_role INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
   name_role VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS users(
   id_user INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
   firstname_user VARCHAR(50) NOT NULL,
   lastname_user VARCHAR(50) NOT NULL,
   email_user VARCHAR(50) NOT NULL UNIQUE,
   password_user VARCHAR(255) NOT NULL,
   avatar_user VARCHAR(255),
   id_role INT NOT NULL,
   CONSTRAINT fk_users_role FOREIGN KEY(id_role) REFERENCES Role(id_role) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS category(
   id_category INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
   title_category VARCHAR(50) NOT NULL
) ;

CREATE TABLE IF NOT EXISTS quizz(
   id_quizz INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
   title_quizz VARCHAR(255) NOT NULL,
   description_quizz TEXT NOT NULL,
   img_quizz VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS question(
   id_question INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
   title_question VARCHAR(255) NOT NULL,
   description_question VARCHAR(255) NOT NULL,
   img_question VARCHAR(255) NOT NULL,
   multiple_question INT NOT NULL
);

CREATE TABLE IF NOT EXISTS answer(
   id_answer INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
   text_answer VARCHAR(100) NOT NULL,
   valid_answer BOOLEAN NOT NULL,
   point_answer INT NOT NULL,
   question_id INT NOT NULL,
   CONSTRAINT fk_answer_question FOREIGN KEY(question_id) REFERENCES question(id_question) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS played(
	id_played INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	sucessfull_played BOOLEAN NOT NULL,
	create_at_played DATETIME NOT NULL,
	user_id INT NOT NULL,
	quizz_id INT NOT NULL,
	question_id INT NOT NULL,
	CONSTRAINT fk_played_user FOREIGN KEY(user_id) REFERENCES users(id_user)  ON DELETE CASCADE,
	CONSTRAINT fk_played_quizz FOREIGN KEY(quizz_id) REFERENCES quizz(id_quizz)  ON DELETE CASCADE,
	CONSTRAINT fk_player_question FOREIGN KEY(question_id) REFERENCES question(id_question)  ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS to_answer(
   answer_id INT NOT NULL,
   played_id INT NOT NULL,
   PRIMARY KEY(answer_id, played_id),
   CONSTRAINT fk_answer_answer FOREIGN KEY(answer_id) REFERENCES answer(id_answer)  ON DELETE CASCADE,
   CONSTRAINT fk_answer_played FOREIGN KEY(played_id) REFERENCES played(id_played)  ON DELETE CASCADE
);

CREATE TABLE to_qualify(
   category_id INT NOT NULL,
   quizz_id INT NOT NULL,
   PRIMARY KEY(category_id, quizz_id),
   CONSTRAINT fk_qualify_category FOREIGN KEY(category_id) REFERENCES category(id_category)  ON DELETE CASCADE,
   CONSTRAINT fk_qualify_quizz FOREIGN KEY(quizz_id) REFERENCES quizz(id_quizz)  ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS commentary(
   id_commentary INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
   content_commentary VARCHAR(50) NOT NULL,
   date_commentary DATETIME NOT NULL,
   id_quizz INT NOT NULL,
   id_user INT NOT NULL,
   CONSTRAINT fk_commentary_quizz FOREIGN KEY(id_quizz) REFERENCES quizz(id_quizz)  ON DELETE CASCADE,
   CONSTRAINT fk_commentary_user FOREIGN KEY(id_user) REFERENCES users(id_user)  ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS respond_to(
   id_answer INT NOT NULL,
   id_first INT NOT NULL,
   PRIMARY KEY(id_answer, id_first),
   CONSTRAINT fk_respond_answer FOREIGN KEY(id_answer) REFERENCES commentary(id_commentary)  ON DELETE CASCADE,
   CONSTRAINT fk_respond_first FOREIGN KEY(id_first) REFERENCES commentary(id_commentary)  ON DELETE CASCADE
);

INSERT INTO `role` (name_role) VALUES ("utilisateur"), ("administrateur");

