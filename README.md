# jobsfordesigners

### Installation steps

This project uses MySQL. It must thus be installed on the installation server for the project to work.

This project also expects as working server. It should work with either an Apache or nginx server, however it has only been tested on Apache, so this is the recommended HTTP server.

Here are the step to install this project.

1. Clone this repository
```
git clone https://github.com/olivierhsta/jobsfordesigners.git
```
2. Update the file `./db/.env.php` with your database connection information
3. In the terminal run the following command to create the database tables and populate them
```
php ./db/create.php
php ./db/seed.php
```
4. Start your server and the project should now work.
