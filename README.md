A Quick Guide on Getting Set Up

Usee brew to install LAMP stack

Use duplicator, download the package and installer.

Move them to ~/Sites/your/path/

run the apache server. $ sudo apachectl start

run the mysql server. $ mysql.server start

Open http://localhost/~[yourusername]/your/path/installer.php

Fill out
    use aw_duplicate for db name
    possibly use 127.0.0.1 instead of localhost for host
Run it.

If necessary, manually edit wp-config.php with
    db: aw_duplicate
    user: root
    password: [your root pass]
    host: 127.0.0.1

Navigate to http://localhost/~[yourusername]/your/path/
The AW site should be up and running
