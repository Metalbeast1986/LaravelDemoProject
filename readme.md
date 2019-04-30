
Setup instructions:
1. Please download project folder to xampp folder on Your local machine:
	for example: C:\xampp\htdocs

2. Database setup:
a. in localhost/phpmyadmin select database and assign selected data base in file .env which is in root folder of project. Execute the following SQL query to create the tables inside your MySQL database.
b. use cmd or gitbash and select root folder of the project (for example run command: cd /c/xampp2/htdocs/LaravelDemo)
when in root folder simply run artisan command:
$ php artisan migrate

Now all necessary database tables should have been deployed

Run xampp and launch project. Project link becomes like this:
http://localhost/LaravelDemo/public/
