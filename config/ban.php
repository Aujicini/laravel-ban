<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Namespace Support
    |--------------------------------------------------------------------------
    |
    | Once enabled you can ban a user to a certain defined namespace. For example,
    | I could do `$user->ban($options, 'chat')`. This can be used to chat ban a user
    | or you could do `$user->ban($options, 'site')`. Which can mean the user is banned
    | from the site. We enable this by default.
    |
    */

    'namespace_support' => true,

    /*
    |--------------------------------------------------------------------------
    | Ban Table Name
    |--------------------------------------------------------------------------
    |
    | This defines the table name to use when migrating the database. This value can 
    | be anything you want. This is useful if you have a table already defined bans. 
    | This is to eliminate any conflict with the table names.
    |
    */

    'ban_table' => 'bans',

];
