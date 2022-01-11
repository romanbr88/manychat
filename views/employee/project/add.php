<?php

/**
 * @var models\Employee $employee
 * @var models\Project[] $projects
 * @var models\ProjectEmployee $projectEmployee
 */

$title = 'Добавление проекта сотруднику: ' . $employee->getFullName();
$activePage = 'employee';
$errors = $projectEmployee->getErrors();

include_once __DIR__ . '/../../parts/error.php';
?>

<form method="post">
    <input type="hidden" name="employee_id" value="<?= $employee->id ?>">
    <div class="mb-3">
        <label for="project_id" class="form-label">Проект</label>
        <select class="form-select" id="project_id" name="project_id">
            <option>Не указан</option>
            <?php foreach ($projects as $project): ?>
                <option value="<?= $project->id ?>"
                    <?= (($projectEmployee->project_id ?? '') === $project->id) ? 'selected' : '' ?>><?= $project->name ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Сохранить</button>
</form>