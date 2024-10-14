<?php
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once "app/vendor/autoload.php";
require_once "config/server.php";

// Create a simple "default" Doctrine ORM configuration for Attributes
$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: ['src'],
    isDevMode: true,
);

// configuring the params of database
$paramsDb = [
  'driver'    => DB_DRIVER,
  'user'      => DB_USER,
  'password'  => DB_PASS,
  'dbname'    => DB_NAME,
  'host'      => DB_HOST,
];

// configuring the database connection
$connection = DriverManager::getConnection($paramsDb, $config);

// obtaining the entity manager
$entityManager = new EntityManager($connection, $config);


?>
