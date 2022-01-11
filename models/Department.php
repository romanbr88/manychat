<?php

namespace models;

use app\Model;

class Department extends Model
{
    protected const TABLE = 'department';

    public string $name;
    public string $created_at;
    public string $updated_at;

    protected function validate(string $key, string $value): bool
    {
        if ($key === 'name') {
            if (empty($value)) {
                $this->setError('Название отдела должно быть заполнено');
                return false;
            }
        }

        return true;
    }
}
