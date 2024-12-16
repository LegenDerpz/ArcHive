== USER CREDENTIALS ==
Admin Account:
	email: admin@gmail.com
	password: nopassword

Normal User Account:
	email: test@gmail.com
	password: password
=======================

//HOW TO USE
- If .env file doesn't exist, create a file called ".env" and paste the following:
	HOST='localhost'
	USER = 'root'
	PASSWORD = ''
	DATABASE_NAME = 'archive'
	PORT = '3306'
	IMAGE_LOCATION = 'ArcHive_Files/Book_Images/'
- Edit .env variables according to your preferences
- Make sure the IMAGE_LOCATION exists. Copy and move the Archive_Files folder if you changed/moved it.
- After everything is setup, go to localhost/ArcHive/Archive.php

// DATABASE SETUP
- Create a database in phpmyadmin called archive. Make sure it is empty before importing. Otherwise, drop all tables.
- Import or query archive.sql file

// To use .env files (if it doesn't work initially)
Method 1:
- Go to Archive/vendor folder
- Extract the "EXTRACT ME HERE" zip file into vendor folder

Method 2:
- Run Composer-Setup
- Run command in directory/VS Code Terminal:
	$ composer require vlucas/phpdotenv
- Reference: https://github.com/vlucas/phpdotenv