<?php

use app\Db;
use models\Department;
use models\Employee;
use models\Project;
use models\ProjectEmployee;

require_once __DIR__ . '/autoload.php';

$sql = file_get_contents(__DIR__ . '/app/sql/manychat.sql');
$db = new Db();
$db->exec($sql);

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
    $model->name = $department;
    $model->save();
}

foreach ($employees as $employee) {
    $model = new Employee();
    $model->load($employee);
    $model->save();
}

foreach ($projects as $project) {
    $model = new Project();
    $model->name = $project;
    $model->save();
}

$employees = Employee::findAll();

foreach ($employees as $employee) {
    $projectEmployee = new ProjectEmployee();
    $projectEmployee->project_id = mt_rand(1, 3);
    $projectEmployee->employee_id = $employee->id;
    $projectEmployee->save();
}
