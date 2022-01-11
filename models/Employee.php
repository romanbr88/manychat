<?php

namespace models;

use app\Db;
use app\Model;

class Employee extends Model
{
    protected const TABLE = 'employee';

    public string $first_name;
    public string $last_name;
    public string $gender;
    public ?string $birthday;
    public ?float $salary;
    public ?int $department_id;
    public string $created_at;
    public string $updated_at;

    public function getFormatGender(): string
    {
        switch ($this->gender) {
            case 'm':
                $gender = 'муж.';
                break;
            case 'f':
                $gender = 'жен.';
                break;
            default:
                $gender = 'Не указан';
        }

        return $gender;
    }

    public function getFullName(): string
    {
        return $this->last_name . ' ' . $this->first_name;
    }

    public function getDepartment(): ?Department
    {
        if (!empty($this->department_id)) {
            return Department::findById($this->department_id);
        }

        return null;
    }

    public function getProjects(): ?array
    {
        $db = new Db();
        $sql = 'SELECT * FROM project
LEFT JOIN project_employee ON project_employee.project_id = project.id
WHERE project_employee.employee_id = :id';
        $result = $db->query($sql, Project::class, [':id' => $this->id]);
        return empty($result) ? null : $result;
    }

    protected function validate(string $key, string $value): bool
    {
        if ($key === 'first_name') {
            if (empty($value)) {
                $this->setError('Имя должно быть заполнено');
                return false;
            }
        }

        if ($key === 'last_name') {
            if (empty($value)) {
                $this->setError('Фамилия должна быть заполнена');
                return false;
            }
        }

        if ($key === 'gender') {
            if (empty($value)) {
                $this->setError('Пол сотрудника должен быть указан');
                return false;
            } else {
                if (!in_array($value, ['m', 'f'])) {
                    $this->setError('Неверное значение пола сотрудника');
                    return false;
                }
            }
        }

        if ($key === 'salary') {
            if (empty($value)) {
                $this->setError('Зарплата должна быть указана');
                return false;
            } else {
                if (!is_numeric($value)) {
                    $this->setError('Зарплата должна быть числом');
                    return false;
                }
            }
        }

        if ($key === 'birthday') {
            if (!empty($value)) {
                $date = \Datetime::createFromFormat('Y-m-d', $value);
                if (!$date) {
                    $this->setError('Дата должна быть в формате ГГГГ-ММ-ДД');
                    return false;
                }
            }
        }

        if ($key === 'department_id') {
            if (!is_numeric($value)) {
                $this->setError('Не выбран отдел');
                return false;
            }
        }

        return true;
    }
}
