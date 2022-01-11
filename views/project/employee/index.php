<?php

/**
 * @var models\Employee[] $employees
 * @var models\Project $project
 */

$title = 'Сотрудники проекта: ' . $project->name;
$activePage = 'project';
?>

<a href="/project/employee/create?project_id=<?= $project->id ?>" class="btn btn-primary mb-2">Добавить сотрудника на
    проект</a>
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Имя</th>
            <th scope="col">Фамилия</th>
            <th scope="col">Пол</th>
            <th scope="col">Дата рождения</th>
            <th scope="col">Зарплата</th>
            <th scope="col">Отдел</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php if (isset($employees)): ?>
            <?php foreach ($employees as $key => $employee): ?>
                <tr>
                    <td><?= ++$key ?></td>
                    <td><?= $employee->first_name ?></td>
                    <td><?= $employee->last_name ?></td>
                    <td><?= $employee->getFormatGender() ?></td>
                    <td><?= $employee->birthday ?></td>
                    <td><?= $employee->salary ?></td>
                    <td><?= $employee->getDepartment()->name ?></td>
                    <td>
                        <a href="/project/employee/delete?project_id=<?= $project->id ?>&employee_id=<?= $employee->id ?>"
                           title="Удалить сотрудника из проекта" class="ml-2 text-decoration-none"
                           data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <span data-feather="trash-2"></span>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="alert alert-warning">
                На проекте нет сотрудников
            </div>
        <?php endif; ?>
        </tbody>
    </table>
</div>