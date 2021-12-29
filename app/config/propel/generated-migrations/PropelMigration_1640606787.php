<?php

use app\models\Department;
use app\models\Employee;
use app\models\EmployeeQuery;
use app\models\Project;
use app\models\ProjectEmployee;
use Propel\Generator\Manager\MigrationManager;

require_once __DIR__ . '/../../../../vendor/autoload.php';

set_include_path(__DIR__ . '/../../../models' . PATH_SEPARATOR . get_include_path());
include __DIR__ . '/../generated-conf/config.php';

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1640606787.
 * Generated on 2021-12-27 15:06:27  
 */
class PropelMigration_1640606787 
{
    public $comment = '';

    public function preUp(MigrationManager $manager)
    {
        // add the pre-migration code here
    }

    /**
     * @throws Propel\Runtime\Exception\PropelException
     */
    public function postUp(MigrationManager $manager)
    {
        $departments = [
            'Отдел разработки',
            'Финансовый отдел',
            'Отдел кадров',
            'Отдел логистики',
            'Бухгалтерия',
        ];

        $employees = [
            [
                'first_name' => 'Арсений',
                'last_name' => 'Алексеев',
                'gender' => 'm',
                'birthday' => date("Y-m-d", mt_rand(157766400, 946684800)),
                'salary' => mt_rand(50000, 200000),
                'department_id' => mt_rand(1, 5),
            ],
            [
                'first_name' => 'Георгий',
                'last_name' => 'Петров',
                'gender' => 'm',
                'birthday' => date("Y-m-d", mt_rand(157766400, 946684800)),
                'salary' => mt_rand(50000, 200000),
                'department_id' => mt_rand(1, 5),
            ],
            [
                'first_name' => 'Наталья',
                'last_name' => 'Смирнова',
                'gender' => 'f',
                'birthday' => date("Y-m-d", mt_rand(157766400, 946684800)),
                'salary' => mt_rand(50000, 200000),
                'department_id' => mt_rand(1, 5),
            ],
            [
                'first_name' => 'Марина',
                'last_name' => 'Воробьева',
                'gender' => 'f',
                'birthday' => date("Y-m-d", mt_rand(157766400, 946684800)),
                'salary' => mt_rand(50000, 200000),
                'department_id' => mt_rand(1, 5),
            ],
            [
                'first_name' => 'Родион',
                'last_name' => 'Беляев',
                'gender' => 'm',
                'birthday' => date("Y-m-d", mt_rand(157766400, 946684800)),
                'salary' => mt_rand(50000, 200000),
                'department_id' => mt_rand(1, 5),
            ],
            [
                'first_name' => 'Наталья',
                'last_name' => 'Давыдова',
                'gender' => 'f',
                'birthday' => date("Y-m-d", mt_rand(157766400, 946684800)),
                'salary' => mt_rand(50000, 200000),
                'department_id' => mt_rand(1, 5),
            ],
            [
                'first_name' => 'Тимофей',
                'last_name' => 'Матвеев',
                'gender' => 'm',
                'birthday' => date("Y-m-d", mt_rand(157766400, 946684800)),
                'salary' => mt_rand(50000, 200000),
                'department_id' => mt_rand(1, 5),
            ],
            [
                'first_name' => 'Ксения',
                'last_name' => 'Ларина',
                'gender' => 'f',
                'birthday' => date("Y-m-d", mt_rand(157766400, 946684800)),
                'salary' => mt_rand(50000, 200000),
                'department_id' => mt_rand(1, 5),
            ],
            [
                'first_name' => 'Арина',
                'last_name' => 'Рябова',
                'gender' => 'f',
                'birthday' => date("Y-m-d", mt_rand(157766400, 946684800)),
                'salary' => mt_rand(50000, 200000),
                'department_id' => mt_rand(1, 5),
            ],
            [
                'first_name' => 'Антон',
                'last_name' => 'Морозов',
                'gender' => 'm',
                'birthday' => date("Y-m-d", mt_rand(157766400, 946684800)),
                'salary' => mt_rand(50000, 200000),
                'department_id' => mt_rand(1, 5),
            ],
            [
                'first_name' => 'Вера',
                'last_name' => 'Фролова',
                'gender' => 'f',
                'birthday' => date("Y-m-d", mt_rand(157766400, 946684800)),
                'salary' => mt_rand(50000, 200000),
                'department_id' => mt_rand(1, 5),
            ],
            [
                'first_name' => 'Александр',
                'last_name' => 'Филатов',
                'gender' => 'm',
                'birthday' => date("Y-m-d", mt_rand(157766400, 946684800)),
                'salary' => mt_rand(50000, 200000),
                'department_id' => mt_rand(1, 5),
            ],
            [
                'first_name' => 'Захар',
                'last_name' => 'Яковлев',
                'gender' => 'm',
                'birthday' => date("Y-m-d", mt_rand(157766400, 946684800)),
                'salary' => mt_rand(50000, 200000),
                'department_id' => mt_rand(1, 5),
            ],
            [
                'first_name' => 'Василиса',
                'last_name' => 'Кондратьева',
                'gender' => 'f',
                'birthday' => date("Y-m-d", mt_rand(157766400, 946684800)),
                'salary' => mt_rand(50000, 200000),
                'department_id' => mt_rand(1, 5),
            ],
            [
                'first_name' => 'Семён',
                'last_name' => 'Горохов',
                'gender' => 'm',
                'birthday' => date("Y-m-d", mt_rand(157766400, 946684800)),
                'salary' => mt_rand(50000, 200000),
                'department_id' => mt_rand(1, 5),
            ],
            [
                'first_name' => 'Алиса',
                'last_name' => 'Анисимова',
                'gender' => 'f',
                'birthday' => date("Y-m-d", mt_rand(157766400, 946684800)),
                'salary' => mt_rand(50000, 200000),
                'department_id' => mt_rand(1, 5),
            ],
            [
                'first_name' => 'Сергей',
                'last_name' => 'Макаров',
                'gender' => 'm',
                'birthday' => date("Y-m-d", mt_rand(157766400, 946684800)),
                'salary' => mt_rand(50000, 200000),
                'department_id' => mt_rand(1, 5),
            ],
        ];

        $projects = [
            'Главный проект',
            'Средний проект',
            'Сложный проект',
        ];
        
        foreach ($departments as $department) {
            $model = new Department();
            $model->setName($department);
            $model->save();
        }
        
        foreach ($employees as $employee) {
            $model = new Employee();
            $model->setFirstName($employee['first_name']);
            $model->setLastName($employee['last_name']);
            $model->setGender($employee['gender']);
            $model->setBirthday($employee['birthday']);
            $model->setSalary($employee['salary']);
            $model->setDepartmentId($employee['department_id']);
            $model->save();
        }

        foreach ($projects as $project) {
            $model = new Project();
            $model->setName($project);
            $model->save();
        }

        $employees = EmployeeQuery::create()->find();

        foreach ($employees as $employee) {
            $projectEmployee = new ProjectEmployee();
            $projectEmployee->setProjectId(mt_rand(1, 3));
            $projectEmployee->setEmployeeId($employee->getId());
            $projectEmployee->save();
        }
    }

    public function preDown(MigrationManager $manager)
    {
        // add the pre-migration code here
    }

    public function postDown(MigrationManager $manager)
    {
        // add the post-migration code here
    }

    /**
     * Get the SQL statements for the Up migration
     *
     * @return array list of the SQL strings to execute for the Up migration
     *               the keys being the datasources
     */
    public function getUpSQL()
    {
        $connection_manychat = <<< 'EOT'
EOT;

        return array(
            'manychat' => $connection_manychat,
        );
    }

    /**
     * Get the SQL statements for the Down migration
     *
     * @return array list of the SQL strings to execute for the Down migration
     *               the keys being the datasources
     */
    public function getDownSQL()
    {
        $connection_manychat = <<< 'EOT'
EOT;

        return array(
            'manychat' => $connection_manychat,
        );
    }

}