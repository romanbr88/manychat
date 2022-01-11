<?php

namespace models;

use app\Db;
use app\Model;

class Project extends Model
{
    protected const TABLE = 'project';

    public string $name;
    public string $created_at;
    public string $updated_at;

    public function getEmployees(): ?array
    {
        $db = new Db();
        $sql = 'SELECT * FROM employee
LEFT JOIN project_employee ON project_employee.employee_id = employee.id
WHERE project_employee.project_id = :id';
        $result = $db->query($sql, Employee::class, [':id' => $this->id]);
        return empty($result) ? null : $result;
    }

    protected function validate(string $key, string $value): bool
    {
        if ($key === 'name') {
            if (empty($value)) {
                $this->setError('Название проекта должно быть заполнено');
                return false;
            }
        }

        return true;
    }
}