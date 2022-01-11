<?php

/**
 * @var models\Employee[] $employees
 */

$title = 'Сотрудники';
$activePage = 'employee';
?>

<a href="/employee/create" class="btn btn-primary mb-2">Добавить сотрудника</a>
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
            <th scope="col">Дата создания</th>
            <th scope="col">Дата редактирования</th>
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
                    <td><?= $employee->getDepartment()->name ?? '' ?></td>
                    <td><?= $employee->created_at ?></td>
                    <td><?= $employee->updated_at ?></td>
                    <td>
                        <a href="/employee/project?id=<?= $employee->id ?>" title="Проекты сотрудника"
                           class="text-decoration-none">
                            <span data-feather="layers"></span>
                        </a>
                        <a href="/employee/update?id=<?= $employee->id ?>" title="Редактировать"
                           class="ml-2 text-decoration-none">
                            <span data-feather="edit"></span>
                        </a>
                        <a href="/employee/delete?id=<?= $employee->id ?>" title="Удалить"
                           class="ml-2 text-decoration-none"
                           data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <span data-feather="trash-2"></span>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="alert alert-warning">
                Сотрудников не найдено
            </div>
        <?php endif; ?>
        </tbody>
    </table>
</div>