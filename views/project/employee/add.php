<?php

/**
 * @var models\Project $project
 * @var models\Employee[] $employees
 * @var models\ProjectEmployee $projectEmployee
 */

$title = 'Добавление сотрудника на проект: ' . $project->name;
$activePage = 'project';
$errors = $projectEmployee->getErrors();

include_once __DIR__ . '/../../parts/error.php';
?>

<form method="post">
    <input type="hidden" name="project_id" value="<?= $project->id ?>">
    <div class="mb-3">
        <label for="employee_id" class="form-label">Сотрудник</label>
        <select class="form-select" id="employee_id" name="employee_id">
            <option>Не указан</option>
            <?php foreach ($employees as $employee): ?>
                <option value="<?= $employee->id ?>"
                    <?= (($projectEmployee->employee_id ?? '') === $employee->id) ? 'selected' : '' ?>><?= $employee->getFullName() ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Сохранить</button>
</form>
