<?php

define('ROOTPATH', strlen(dirname($_SERVER['SCRIPT_NAME'])) > 1 ? dirname($_SERVER['SCRIPT_NAME']).'/' : '/');
define('VIEWPATH', 'views/');
define('DATABASE', 'data/db.json');