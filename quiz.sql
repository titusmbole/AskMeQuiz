CREATE TABLE  IF NOT EXISTS questions(
	id int (11) auto_increment primary key,
	question_category varchar (255) not null,
	question varchar (255) not null,
	question_moreinfo varchar (2000) not null,
	question_file_attachment varchar (100) not null,
	question_id varchar (100) not null,
	question_ask_date varchar (100) not null,
	question_asked_by varchar (100) not null,
	question_tags varchar (100) not null
); 

CREATE TABLE  IF NOT EXISTS categories(
	id int (11) auto_increment primary key,
	category_name varchar (200) not null
); 


-- INSERT INTO categories(category_name) VALUES
-- ()



