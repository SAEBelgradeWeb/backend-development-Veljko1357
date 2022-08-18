## VintageCarGo
####   Veljko Kovinic

#### LOGIN INFORMATION:
##### username: admin@admin.com
##### password: admin

or you can create a new user on the register page and login with those credentials

To start the project properly you first need to import the database.

## Project pages: 
### cars:
On the cars page you can chose to:
1. add - create a new entry for a car - colors are preset choices from a seperate table with a foreign key in the cars table - image types are jpg, jpeg, png
2. edit - edit an already existing car - edit everything about the selected car - it will change the image name in the directory 
3. delete - delete a selected car 

### users: 
1. add - add a new user to the list and you can log in with it afterwards 
2. edit - edit user's name, username or password with password confirmation
3. delete - delete selected user

### about
-- just a filler page

#### notes
- couldn't figure out how to delete an image from repository in project - replacement works and it database-wise it works fine
- couldn't make the message only pop up on failed login attempts 
- notice error on login page which may or may not occur - I've put error_reporting to avoid it, but just a heads up
