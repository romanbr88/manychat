<?php

namespace app\models;

use app\models\Base\Employee as BaseEmployee;

/**
 * Skeleton subclass for representing a row from the 'employee' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 */
class Employee extends BaseEmployee
{
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
}
