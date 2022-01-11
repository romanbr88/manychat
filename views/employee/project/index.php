<?php

/**
 * @var models\Employee $employee
 * @var models\Project[] $projects
 */

$title = 'Проекты сотрудника: ' . $employee->getFullName();
$activePage = 'employee';
?>

<a href="/employee/project/create?employee_id=<?= $employee->id ?>" class="btn btn-primary mb-2">Добавить проект
    сотруднику</a>
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php if (isset($projects)): ?>
            <?php foreach ($projects as $key => $project): ?>
                <tr>
                    <td><?= ++$key ?></td>
                    <td><?= $project->name ?></td>
                    <td>
                        <a href="/employee/project/delete?employee_id=<?= $employee->id ?>&project_id=<?= $project->id ?>"
                           title="Удалить проект у сотрудника" class="ml-2 text-decoration-none"
                           data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <span data-feather="trash-2"></span>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="alert alert-warning">
                У сотрудника нет проектов
            </div>
        <?php endif; ?>
        </tbody>
    </table>
</div>