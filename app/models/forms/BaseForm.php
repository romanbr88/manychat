<?php

namespace app\models\forms;

use Exception;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Map\TableMap;
use Tightenco\Collect\Support\Collection;
use Valitron\Validator;

abstract class BaseForm
{
    protected Validator $validator;
    public ActiveRecordInterface $model;

    public function __construct(ActiveRecordInterface $model)
    {
        Validator::lang('ru');
        $this->model = $model;
        $this->setModelProperties();
    }

    private function load(array $params)
    {
        $this->validator = new Validator($params);
        $this->validator->labels($this->labels());
        $this->setFormProperties($params);
    }

    /**
     * @throws Exception
     */
    public function save(array $params): bool
    {
        $this->load($params);
        if ($this->validate()) {
            $this->model->fromArray($params, TableMap::TYPE_FIELDNAME);
            $this->model->save();
            return true;
        }

        return false;
    }

    /**
     * @throws Exception
     */
    public function validate(): bool
    {
        $this->validator->rules($this->rules());
        return $this->validator->validate();
    }

    public function getErrors(): ?Collection
    {
        if (isset($this->validator)) {
            $collect = collect($this->validator->errors());
            return $collect->flatten();
        }
        return null;
    }

    abstract public function setModelProperties();

    abstract public function setFormProperties(array $params);

    protected function rules(): array
    {
        return [];
    }

    protected function labels(): array
    {
        return [];
    }
}
