# Тестовое задание для ManyChat

Параметры для подключения к БД задаются в файле `config.php`:

```
'db' => [
        'dsn' => 'pgsql:host=localhost;port=5432;dbname=manychat',
        'username' => 'postgres',
        'password' => 'postgres',
    ]
```

## Запуск Docker-контейнера

Для запуска проекта из Docker-контейнера выполнить последовательно команды:

#### 1. Сборка и запуск контейнера:
`docker-compose up -d`

#### 2. Загрузка тестовых данных:
`docker-compose exec php php init.php`