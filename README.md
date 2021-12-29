# Тестовое задание для ManyChat

Параметры для подключения к БД задаются в файле `app/config/propel/generated-conf/config.php`:

```
$manager->setConfiguration([
  'dsn' => 'pgsql:host=localhost;port=5432;dbname=manychat',
  'user' => 'postgres',
  'password' => 'postgres',
  ...
]);
```

Для запуска проекта локально, необходимо последовательно выполнить несколько команд:

#### 1. Установка необходимых пакетов:
`composer install`

#### 2. Создание необходимых таблиц:
- Linux: `vendor/bin/propel sql:insert`
- Windows: `vendor\bin\propel.bat sql:insert`

#### 3. Загрузка тестовых данных:
- Linux: `vendor/bin/propel migration:up`
- Windows: `vendor\bin\propel.bat migration:up`

## Запуск Docker-контейнера

Для запуска проекта из Docker-контейнера выполнить последовательно команды:

#### 1. Сборка и запуск контейнера:
`docker-compose up -d`

#### 2. Установка необходимых пакетов:
`docker-compose exec php composer install`

#### 3. Загрузка тестовых данных:
`docker-compose exec php vendor/bin/propel migration:up
`