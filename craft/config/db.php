<?php

/**
 * Database Configuration
 *
 * All of your system's database configuration settings go in here.
 * You can see a list of the default settings in craft/app/etc/config/defaults/db.php
 */

return array(

    // All environments
    '*' => array(
        'tablePrefix' => 'craft',
        'server' => getenv('CRAFTENV_DB_HOST'),
        'database' => getenv('CRAFTENV_DB_NAME'),
        'user' => getenv('CRAFTENV_DB_USER'),
        'password' => getenv('CRAFTENV_DB_PASS')
    )
);