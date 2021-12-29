<?php

namespace app\models\forms;

class ProjectEmployeeForm extends BaseForm
{
    public ?string $projectId;
    public ?string $employeeId;

    public function setModelProperties()
    {
        $this->projectId = $this->model->getProjectId();
        $this->employeeId = $this->model->getEmployeeId();
    }

    public function setFormProperties(array $params)
    {
        $this->projectId = $params['project_id'];
        $this->employeeId = $params['employee_id'];
    }

    protected function rules(): array
    {
        return [
            'required' => ['project_id', 'employee_id'],
            'integer' => ['project_id', 'employee_id'],
        ];
    }

    protected function labels(): array
    {
        return [
            'project_id' => 'Проект',
            'employee_id' => 'Сотрудник',
        ];
    }
}
