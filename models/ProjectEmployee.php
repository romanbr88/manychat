<?php

namespace models;

use app\Db;
use app\Model;

class ProjectEmployee extends Model
{
    protected const TABLE = 'project_employee';

    public int $project_id;
    public int $employee_id;

    public static function getProjectWithoutEmployee(int $employeeId): ?array
    {
        $db = new Db();
        $sql = 'SELECT * FROM project
WHERE id NOT IN (SELECT project_id FROM project_employee WHERE employee_id = :employee_id)
ORDER BY name';
        $result = $db->query($sql, Project::class, [':employee_id' => $employeeId]);
        return empty($result) ? null : $result;
    }

    public static function getEmployeeWithoutProject(int $projectId): ?array
    {
        $db = new Db();
        $sql = 'SELECT * FROM employee
WHERE id NOT IN (SELECT employee_id FROM project_employee WHERE project_id = :project_id)
ORDER BY last_name';
        $result = $db->query($sql, Employee::class, [':project_id' => $projectId]);
        return empty($result) ? null : $result;
    }

    public static function findByEmployeeIdAndProjectId(int $employeeId, int $projectId): ?ProjectEmployee
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE employee_id = :employee_id AND project_id = :project_id LIMIT 1';
        $result = $db->query($sql, static::class, [':employee_id' => $employeeId, ':project_id' => $projectId]);
        return empty($result) ? null : $result[0];
    }

    public function delete(): bool
    {
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE employee_id = :employee_id AND project_id = :project_id';
        $db = new Db();
        return $db->execute($sql, [':employee_id' => $this->employee_id, ':project_id' => $this->project_id]);
    }

    protected function validate(string $key, string $value): bool
    {
        if ($key === 'project_id') {
            if (!is_numeric($value)) {
                $this->setError('Не выбран проект');
                return false;
            }
        }

        if ($key === 'employee_id') {
            if (!is_numeric($value)) {
                $this->setError('Не выбран сотрудник');
                return false;
            }
        }

        return true;
    }
}
