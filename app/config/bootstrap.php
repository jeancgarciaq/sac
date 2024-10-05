<?php
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once "vendor/autoload.php";

// Create a simple "default" Doctrine ORM configuration for Attributes
$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: [__DIR__ . '/src'],
    isDevMode: true,
);

// configuring the params of database
$paramsDb = [
  'driver'    => 'pdo_mysql',
  'user'      => 'root',
  'password'  => '',
  'dbname'    => 'sac',
  'host'      => 'localhost',
];

// configuring the database connection
$connection = DriverManager::getConnection($paramsDb, $config);

// obtaining the entity manager
$entityManager = new EntityManager($connection, $config);

?>
