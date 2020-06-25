# Cinema-program
A website for cinema program and information about the films.

The above is the old idea. Please, read bellow.

1. There is file admin_database.php in this aplication. Please, execute it in the browser to create database and to create tables.
Application contains three tables:
#### 1.1 "users" :
 contains information of registrated users
#### 1.2 "images" :
 contains images and foreign key to "users". This foreign key point who is aploaded the image.
#### 1.3 "likes" :
 that is mapping table. The idea here is to contains information who user is liked a given image.
 
 2. Application functionality:
<br/> 2.1 Registration page - includes:
<br/> - validation of password - if password less then 6 simbols; if password matches 
<br/> - check if user exists
<br/> - passworfd encrypting
<br/> 2.2 Login page - checking for existing user and correct password; If seesion is valide ridirect to Welcome page;
<br/> 2.3 Welcome page - contains functionality like reset password, log out. Where log out redirect to Login page;
<br/> 2.4 Reset password - password validation and confirmation matching check.
 
