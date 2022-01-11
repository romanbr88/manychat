<?php

namespace app;

use PDO;

class Db
{
    protected PDO $dbh;

    public function __construct()
    {
        $config = include __DIR__ . '/../config.php';
        $this->dbh = new \PDO(
            $config['db']['dsn'],
            $config['db']['username'],
            $config['db']['password']
        );
    }

    public function query(string $sql, string $class, array $params = []): array
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(PDO::FETCH_CLASS, $class);
    }

    public function queryToArray(string $sql, array $params = []): array
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll();
    }

    public function execute(string $sql, array $params = []): bool
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }

    public function exec(string $sql): bool
    {
        return $this->dbh->exec($sql);
    }

    public function getLastId()
    {
        return $this->dbh->lastInsertId();
    }
}
