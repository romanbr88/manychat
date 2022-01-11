<?php

/**
 * @var models\Project $project
 */

$errors = $project->getErrors();
include_once __DIR__ . '/../parts/error.php';
?>

<form method="post">
    <div class="mb-3">
        <label for="name" class="form-label">Название проекта</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $project->name ?? '' ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Сохранить</button>
</form>