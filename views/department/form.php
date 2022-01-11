<?php

/**
 * @var models\Department $department
 */

$errors = $department->getErrors();
include_once __DIR__ . '/../parts/error.php';
?>

<form method="post">
    <div class="mb-3">
        <label for="name" class="form-label">Название отдела</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $department->name ?? '' ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Сохранить</button>
</form>