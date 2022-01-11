<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title><?= $title ?? '' ?></title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/dashboard.css" rel="stylesheet">
</head>
<body>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/">ManyChat</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</header>
<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link <?= ($activePage === 'home') ? 'active' : '' ?>" href="/">
                            <span data-feather="home"></span>
                            Главная
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($activePage === 'department') ? 'active' : '' ?>" href="/department">
                            <span data-feather="coffee"></span>
                            Отделы
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($activePage === 'project') ? 'active' : '' ?>" href="/project">
                            <span data-feather="layers"></span>
                            Проекты
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($activePage === 'employee') ? 'active' : '' ?>" href="/employee">
                            <span data-feather="users"></span>
                            Сотрудники
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($activePage === 'report') ? 'active' : '' ?>" href="/report">
                            <span data-feather="bar-chart-2"></span>
                            Отчеты
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2"><?= $title ?? '' ?></h1>
            </div>
            <div class="container-fluid">
                <?= $content ?>
            </div>
        </main>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Подтверждение действия</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Вы действительно хотите удалить этот элемент?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                    <button type="submit" class="btn btn-primary">Удалить</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="/js/bootstrap.bundle.min.js"></script>
<script src="/js/feather.min.js"></script>
<script src="/js/dashboard.js"></script>
</body>
</html>