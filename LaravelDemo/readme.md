
Setup instructions:
1. Please download project folder to xampp folder on Your local machine:
	for example: C:\xampp\htdocs

2. Database setup:
a. in localhost/phpmyadmin select database and Execute the following SQL query to create the tables inside your MySQL database.

CREATE TABLE visits (
    id BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    visit_date date  NULL,
    patient_id int(11) NOT NULL,
    patient_fullname varchar(255) NOT NULL,
    doctor_id int(11) NOT NULL,
    doctor_fullname varchar(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE doctor (
    id BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    occupation varchar(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE patients (
    id BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    dateofbirth date NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
b. in project root folder in file .env change database to selected one in a. point (for example DB_DATABASE=laravel) 

Run xampp and launch project. Project link becomes like this:
http://localhost/LaravelDemo/public/
