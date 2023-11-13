<?php
namespace core;
	
class Model {
	
	public $last_visit = '1';

public function __construct() {
global $conn;
// Создание таблицы администратора
$sql = "CREATE TABLE IF NOT EXISTS `forum`.`admin` (
`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(96) NOT NULL ,
`password` VARCHAR(96) NOT NULL ,
`email` VARCHAR(96) NOT NULL ,
`phone` VARCHAR(16) NOT NULL ,
`rendKey` VARCHAR(96),
`time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (`id`)
) ENGINE = InnoDB";
mysqli_query($conn, $sql); // создаем таблицу

// Создание таблицу модераторов 
$sql = "CREATE TABLE IF NOT EXISTS `forum`.`modtrators` (
`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(96) NOT NULL ,
`password` VARCHAR(96) NOT NULL ,
`email` VARCHAR(96) NOT NULL ,
`phone` VARCHAR(16) NOT NULL ,
`rendKey` VARCHAR(96),
`time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (`id`)
) ENGINE = InnoDB";
mysqli_query($conn, $sql); // создаем таблицу

// Создание таблицу  пользователей. 
$sql = "CREATE TABLE IF NOT EXISTS `forum`.`users` (
`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(96) NOT NULL ,
`password` VARCHAR(96) NOT NULL ,
`email` VARCHAR(96) NOT NULL ,
`phone` VARCHAR(16) NOT NULL ,
`rendKey` VARCHAR(96),
`time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
`last_visit` DATETIME NOT NULL DEFAULT '1000-01-01 00:00:00',
`ban` VARCHAR(3) NOT NULL DEFAULT 'нет',
PRIMARY KEY (`id`)
) ENGINE = InnoDB";
mysqli_query($conn, $sql); // создаем таблицу

// Создание таблицу постов
$sql = "CREATE TABLE IF NOT EXISTS `forum`.`posts` (
`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
`theme` VARCHAR(200) NOT NULL ,
`post` VARCHAR(1000) NOT NULL ,
`numanswers` INT UNSIGNED NOT NULL,
`numdisplays` INT UNSIGNED NOT NULL,
`time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
`id_user` INT UNSIGNED NOT NULL,
`name` VARCHAR(96) NOT NULL ,
`approved` VARCHAR(10) NOT NULL  DEFAULT 'нет',
PRIMARY KEY (`id`)
) ENGINE = InnoDB";
mysqli_query($conn, $sql); // создаем таблицу

// Создание таблицу ответов
$sql = "CREATE TABLE IF NOT EXISTS `forum`.`answers` (
`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
`answer` VARCHAR(1000) NOT NULL ,
`time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
`id_theme` INT UNSIGNED NOT NULL,
`id_user_answer` INT UNSIGNED NOT NULL,
PRIMARY KEY (`id`)
) ENGINE = InnoDB";
mysqli_query($conn, $sql); // создаем таблицу	
if(COMMENT) echo 'Это я - класс Model.php<br>';
}

}
