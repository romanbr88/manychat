<?php

/**
 * @var models\Department[] $departments
 */

$title = 'Список отделов';
$activePage = 'department';
?>
<a href="/department/create" class="btn btn-primary mb-2">Добавить отдел</a>
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
        <?php if (isset($departments)): ?>
            <?php foreach ($departments as $key => $department): ?>
                <tr>
                    <td><?= ++$key ?></td>
                    <td><?= $department->name ?></td>
                    <td><?= $department->created_at ?></td>
                    <td><?= $department->updated_at ?></td>
                    <td>
                        <a href="/department/update?id=<?= $department->id ?>" title="Редактировать"
                           class="text-decoration-none">
                            <span data-feather="edit"></span>
                        </a>
                        <a href="/department/delete?id=<?= $department->id ?>" title="Удалить"
                           class="ml-2 text-decoration-none"
                           data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <span data-feather="trash-2"></span>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="alert alert-warning">
                Отделов не найдено
            </div>
        <?php endif; ?>
        </tbody>
    </table>
</div>