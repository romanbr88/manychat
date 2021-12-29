<?php

namespace app\models\forms;

class DepartmentForm extends BaseForm
{
    public ?string $name;

    public function setModelProperties()
    {
        $this->name = $this->model->getName();
    }

    public function setFormProperties(array $params)
    {
        $this->name = $params['name'];
    }

    protected function rules(): array
    {
        return [
            'required' => ['name'],
        ];
    }

    protected function labels(): array
    {
        return [
            'name' => 'Название',
        ];
    }
}
