<?php

/**
 * @var models\Employee $employee
 * @var models\Department[] $departments
 */

$errors = $employee->getErrors();
include_once __DIR__ . '/../parts/error.php';
?>

<form method="post">
    <div class="mb-3">
        <label for="first_name" class="form-label">Имя</label>
        <input type="text" class="form-control" id="first_name" name="first_name"
               value="<?= $employee->first_name ?? '' ?>" required>
    </div>
    <div class="mb-3">
        <label for="last_name" class="form-label">Фамилия</label>
        <input type="text" class="form-control" id="last_name" name="last_name"
               value="<?= $employee->last_name ?? '' ?>" required>
    </div>
    <div class="mb-3">
        <label for="gender" class="form-label">Пол</label>
        <select class="form-select" id="gender" name="gender" required>
            <option value="">Не указан</option>
            <option value="m" <?= (($employee->gender ?? '') === 'm') ? 'selected' : '' ?>>Мужской</option>
            <option value="f" <?= (($employee->gender ?? '') === 'f') ? 'selected' : '' ?>>Женский</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="birthday" class="form-label">Дата рождения</label>
        <input type="text" class="form-control" id="birthday" name="birthday" value="<?= $employee->birthday ?? '' ?>"
               required>
    </div>
    <div class="mb-3">
        <label for="salary" class="form-label">Зарплата</label>
        <input type="text" class="form-control" id="salary" name="salary" value="<?= $employee->salary ?? '' ?>"
               required>
    </div>
    <div class="mb-3">
        <label for="department_id" class="form-label">Отдел</label>
        <select class="form-select" id="department_id" name="department_id">
            <option value="">Не указан</option>
            <?php foreach ($departments as $department): ?>
                <option value="<?= $department->id ?>"
                    <?= (($employee->department_id ?? '') === $department->id) ? 'selected' : '' ?>><?= $department->name ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Сохранить</button>
</form>