<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <p>Обнаружены ошибки в заполнении формы:</p>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>