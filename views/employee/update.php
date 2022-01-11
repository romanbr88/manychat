<?php

/**
 * @var models\Employee $employee
 */

$title = 'Редактирование сотрудника: ' . $employee->getFullName();
$activePage = 'employee';

include __DIR__ . '/form.php';
