<?php

namespace app;

class Model
{
    protected const TABLE = '';

    public int $id;
    protected array $errors = [];

    public function load(array $data): bool
    {
        foreach ($data as $key => $datum) {
            if (property_exists($this, $key) && $this->validate($key, $datum)) {
                $this->$key = $datum;
            }
        }

        return empty($this->getErrors());
    }

    public static function findAll(): array
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE;
        return $db->query($sql, static::class);
    }

    public static function findById(int $id)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id = :id LIMIT 1';
        $result = $db->query($sql, static::class, [':id' => $id]);
        return empty($result) ? false : $result[0];
    }

    public function insert()
    {
        if (property_exists($this, 'created_at') && property_exists($this, 'updated_at')) {
            $date = new \DateTime();
            $this->created_at = $date->format('Y-m-d H:i:s');
            $this->updated_at = $date->format('Y-m-d H:i:s');
        }

        $props = $this->getObjectVars();
        $columns = [];
        $binds = [];
        $params = [];

        foreach ($props as $key => $value) {
            $columns[] = $key;
            $binds[] = ':' . $key;
            $params[':' . $key] = $value;
        }

        $sql = 'INSERT INTO ' . static::TABLE . ' (' . implode(', ', $columns) . ') VALUES (' . implode(', ', $binds) . ')';
        $db = new Db();
        $db->execute($sql, $params);
        return $this->id = $db->getLastId();
    }

    public function update(): bool
    {
        if (property_exists($this, 'updated_at')) {
            $date = new \DateTime();
            $this->updated_at = $date->format('Y-m-d H:i:s');
        }

        $props = $this->getObjectVars();
        $binds = [];
        $params = [];

        foreach ($props as $key => $value) {
            if ($key !== 'id') {
                $binds[] = $key . ' = :' . $key;
            }
            $params[':' . $key] = $value;
        }

        $sql = 'UPDATE ' . static::TABLE . ' SET ' . implode(', ', $binds) . ' WHERE id = :id';
        $db = new Db();
        return $db->execute($sql, $params);
    }

    public function save()
    {
        try {
            if (isset($this->id)) {
                return $this->update();
            }
            return $this->insert();
        } catch (\Exception $exception) {
            $this->setError($exception->getMessage());
        }
    }

    public function delete(): bool
    {
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id = :id';
        $db = new Db();
        return $db->execute($sql, [':id' => $this->id]);
    }

    public function setError(string $error)
    {
        $this->errors[] = $error;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    protected function getObjectVars(): array
    {
        $props = get_object_vars($this);
        unset($props['errors']);

        return $props;
    }

    protected function validate(string $key, string $value): bool
    {
        return empty($this->getErrors());
    }
}
