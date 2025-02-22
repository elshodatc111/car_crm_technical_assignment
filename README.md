
# Система бронирования автомобилей

## Описание проекта

Проект **Система бронирования автомобилей** представляет собой RESTful API, позволяющее пользователям:
- Создавать, просматривать и управлять информацией об автомобилях;
- Осуществлять бронирование автомобилей;
- Отслеживать события создания и удаления бронирований через Observer Pattern.

API реализован с использованием последней версии Laravel, с применением современных практик разработки: Eloquent ORM, PSR-стандарты, SOLID принципы, а также Repository-Service паттерна для разделения бизнес-логики и доступа к данным.

## Функциональность

### Управление автомобилями

- **Создание автомобиля**  
  **Метод:** `POST /api/cars`  
  **Параметры запроса:**
  - `name` (string, обязательный) – название автомобиля;
  - `model` (string, обязательный) – модель автомобиля;
  - `number_plate` (string, обязательный) – государственный номер;
  - `description` (string, необязательный) – описание автомобиля.

- **Получение списка автомобилей**  
  **Метод:** `GET /api/cars`  
  **Описание:** Возвращает список всех автомобилей.

### Бронирование

- **Создание бронирования**  
  **Метод:** `POST /api/bookings`  
  **Параметры запроса:**
  - `car_id` (integer, обязательный) – идентификатор автомобиля;
  - `user_id` (integer, обязательный) – идентификатор пользователя;
  - `start_time` (datetime, обязательный) – время начала бронирования;
  - `end_time` (datetime, обязательный) – время окончания бронирования.

- **Получение бронирований для автомобиля**  
  **Метод:** `GET /api/cars/{id}/bookings`  
  **Описание:** Возвращает список бронирований для конкретного автомобиля (где `{id}` — идентификатор автомобиля).

- **Удаление бронирования**  
  **Метод:** `DELETE /api/bookings/{id}`  
  **Описание:** Удаляет бронирование по его идентификатору.

## Технологии и инструменты

- **Laravel** (последняя версия)
- **Eloquent ORM** для работы с базой данных
- **PSR Coding Standards**
- **SOLID принципы**
- **Repository-Service Pattern** – разделение бизнес-логики и доступа к данным
- **Observer Pattern** – отслеживание событий (создания, удаления бронирований)
- **Swagger** для документирования API
- **Unit и Feature тесты** для обеспечения качества кода

## Структура базы данных

### Таблица `cars`
- `id`: BIGINT, первичный ключ
- `name`: STRING, название автомобиля
- `model`: STRING, модель автомобиля
- `number_plate`: STRING, государственный номер (уникальное)
- `description`: TEXT, описание автомобиля (необязательно)
- `created_at`, `updated_at`: TIMESTAMP

### Таблица `bookings`
- `id`: BIGINT, первичный ключ
- `car_id`: BIGINT, внешний ключ к таблице `cars`
- `user_id`: BIGINT, идентификатор пользователя
- `start_time`: DATETIME, время начала бронирования
- `end_time`: DATETIME, время окончания бронирования
- `created_at`, `updated_at`: TIMESTAMP

## Установка и запуск

1. **Клонирование репозитория:**

   ```bash
   git clone https://github.com/yourusername/your-repository.git
   ```

2. **Переход в директорию проекта:**

   ```bash
   cd your-repository
   ```

3. **Установка зависимостей через Composer:**

   ```bash
   composer install
   ```

4. **Копирование файла конфигурации окружения и настройка:**

   ```bash
   cp .env.example .env
   ```

   Отредактируйте файл `.env`, указав параметры подключения к базе данных.

5. **Генерация ключа приложения:**

   ```bash
   php artisan key:generate
   ```

6. **Выполнение миграций:**

   ```bash
   php artisan migrate
   ```

7. **Запуск локального сервера:**

   ```bash
   php artisan serve
   ```

## Документация API

Документация API доступна через Постмен  по адресу:
```bash
https://orange-escape-760682.postman.co/workspace/New-Team-Workspace~b2337858-3303-4631-823a-9162bef0e6a6/collection/14732812-6a77007c-0570-47dc-b154-981812060b3d?action=share&creator=14732812
```

Также можно использовать Postman коллекцию для тестирования всех endpoint'ов.

## Тестирование

Для запуска тестов выполните:

```bash
php artisan test
```

## Контрибуция

Если у вас есть предложения по улучшению проекта или вы хотите внести свой вклад, пожалуйста, создайте issue или отправьте pull request.

## Лицензия

Этот проект лицензирован по [MIT License](LICENSE).
