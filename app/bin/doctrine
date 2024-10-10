#!/usr/bin/env php
<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;

// path to bootstrap.php
//require __DIR__ . '..\config\bootstrap.php';
require 'config/bootstrap.php';

ConsoleRunner::run(
    new SingleManagerProvider($entityManager)
);
