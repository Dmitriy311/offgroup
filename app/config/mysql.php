<?php
function getConfig()
{
    $mysql_conf['host'] = 'localhost:3306';
    $mysql_conf['dbname'] = 'offgroup';
    $mysql_conf['username'] = 'admin';
    $mysql_conf['password'] = 'admin';
    $mysql_conf['charset'] = 'utf8mb4';

    return $mysql_conf;
}