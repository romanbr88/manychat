<?php
$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->checkVersion(2);
$serviceContainer->setAdapterClass('manychat', 'pgsql');
$manager = new \Propel\Runtime\Connection\ConnectionManagerSingle();
$manager->setConfiguration([
    'dsn' => 'pgsql:host=postgres;port=5432;dbname=manychat',
    'user' => 'postgres',
    'password' => 'postgres',
    'settings' =>
        [
            'charset' => 'utf8',
            'queries' => [],
        ],
    'classname' => '\\Propel\\Runtime\\Connection\\ConnectionWrapper',
    'model_paths' =>
        [
            0 => 'src',
            1 => 'vendor',
        ],
]);
$manager->setName('manychat');
$serviceContainer->setConnectionManager('manychat', $manager);
$serviceContainer->setDefaultDatasource('manychat');
require_once __DIR__ . '/loadDatabase.php';
