<?php

namespace app\models\forms;

class EmployeeForm extends BaseForm
{
    public ?string $firstName;
    public ?string $lastName;
    public ?string $gender;
    public ?string $birthday;
    public ?string $salary;
    public ?string $departmentId;

    public function setModelProperties()
    {
        $this->firstName = $this->model->getFirstName();
        $this->lastName = $this->model->getLastName();
        $this->gender = $this->model->getGender();
        $this->birthday = $this->model->getBirthday('Y-m-d');
        $this->salary = $this->model->getSalary();
        $this->departmentId = $this->model->getDepartmentId();
    }

    public function setFormProperties(array $params)
    {
        $this->firstName = $params['first_name'];
        $this->lastName = $params['last_name'];
        $this->gender = $params['gender'];
        $this->birthday = $params['birthday'];
        $this->salary = $params['salary'];
        $this->departmentId = $params['department_id'];
    }

    protected function rules(): array
    {
        return [
            'required' => ['first_name', 'last_name', 'gender'],
            'dateFormat' => [['birthday', 'Y-m-d']],
            'in' => [['gender', ['m', 'f']]],
            'numeric' => ['salary'],
            'integer' => ['department_id'],
        ];
    }

    protected function labels(): array
    {
        return [
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'gender' => 'Пол',
            'birthday' => 'Дата рождения',
            'salary' => 'Зарплата',
            'department_id' => 'Отдел',
        ];
    }
}
