<?php

/**
 * @var models\Project[] $projects
 */

$title = 'Проекты';
$activePage = 'project';
?>

<a href="/project/create" class="btn btn-primary mb-2">Добавить проект</a>
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            <th scope="col">Дата создания</th>
            <th scope="col">Дата редактирования</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php if (isset($projects)): ?>
            <?php foreach ($projects as $key => $project): ?>
                <tr>
                    <td><?= ++$key ?></td>
                    <td><?= $project->name ?></td>
                    <td><?= $project->created_at ?></td>
                    <td><?= $project->updated_at ?></td>
                    <td>
                        <a href="/project/employee?id=<?= $project->id ?>" title="Сотрудники проекта"
                           class="text-decoration-none">
                            <span data-feather="users"></span>
                        </a>
                        <a href="/project/update?id=<?= $project->id ?>" title="Редактировать"
                           class="ml-2 text-decoration-none">
                            <span data-feather="edit"></span>
                        </a>
                        <a href="/project/delete?id=<?= $project->id ?>" title="Удалить"
                           class="ml-2 text-decoration-none"
                           data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <span data-feather="trash-2"></span>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="alert alert-warning">
                Проектов не найдено
            </div>
        <?php endif; ?>
        </tbody>
    </table>
</div>