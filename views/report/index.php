<?php

/**
 * @var array $reports
 */

$title = 'Отчеты';
$activePage = 'report';
?>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Id проекта</th>
                <th scope="col">Название проекта</th>
                <th scope="col">Бюджет</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($reports as $key => $report): ?>
                <tr>
                    <td><?= ++$key ?></td>
                    <td><?= $report['id'] ?></td>
                    <td><?= $report['name'] ?></td>
                    <td><?= $report['budget'] ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>