# Venue Manager

#### Venue management system for mutli-space venues

Including:
- CodeIgniter 4.0.3
- FullCalendar Scheduler 5.1.0
- Bootstrap 4.5.0


## Initial Configuration & Set Up
Open the app/Config/App.php file with a text editor and set your base URL.

Open the app/Config/Database.php file with a text editor and set your database settings. 

To disable PHP error reporting and any other development-only functionality,
the ENVIRONMENT constant must be set to “production” in the .env file.

More information can be found in the CodeIgniter [documentation](https://codeigniter.com/user_guide/installation/running.html).

## Database
The database structure is included in the database_structure.sql file. 
This includes an Administrator user, with the password set to password123

## CodeIgniter 4
CodeIgniter is a PHP full-stack web framework that is light, fast, flexible, and secure. 
More information can be found at the [official site](http://codeigniter.com).

- [Documentation](https://codeigniter4.github.io/userguide/). 
- [MIT Licence](https://codeigniter.com/user_guide/license.html)


## FullCalendar Scheduler
- [Documentation](https://fullcalendar.io/docs)
- [GPLv3 Licence](http://www.gnu.org/licenses/gpl-3.0.en.html)


## Bootstrap 4
- [Documentation](https://getbootstrap.com/docs/4.5/getting-started/introduction/)
- [MIT Licence](https://github.com/twbs/bootstrap/blob/main/LICENSE)

## Server Requirements

PHP version 7.2 or higher is required, with the following extensions installed: 

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)
