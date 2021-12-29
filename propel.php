<?php
return [
    'propel' => [
        'database' => [
            'connections' => [
                'manychat' => [
                    'adapter' => 'pgsql',
                    'dsn' => 'pgsql:host=postgres;port=5432;dbname=manychat',
                    'user' => 'postgres',
                    'password' => 'postgres',
                    'settings' => [
                        'charset' => 'utf8'
                    ]
                ]
            ]
        ],
        'runtime' => [
            'defaultConnection' => 'manychat',
            'connections' => ['manychat']
        ],
        'generator' => [
            'defaultConnection' => 'manychat',
            'connections' => ['manychat']
        ],
        'paths' => [
            'schemaDir' => './app/config/propel',
            'sqlDir' => './app/config/propel/generated-sql',
            'phpConfDir' => './app/config/propel/generated-conf',
            'migrationDir' => './app/config/propel/generated-migrations',
            'phpDir' => '.',
        ],
    ]
];
