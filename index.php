<?php
/**
 * @filename index.php
 * @encoding UTF-8
 * @datetime 2016-3-17  0:05:54
 * @version 1.0
 */
require dirname(__FILE__).'/system/app.php';
require dirname(__FILE__).'/config/config.php';

Application::run($CONFIG);