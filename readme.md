## Front

### Production
Собираем приложение
```
cd frontend
yarn build
```

Копируем файлы в публичную директорию
```
yarn copyfiles -a -u 1 "build/**/*.*" ../public
```

### Docker
Запустить контейнеры
```
docker-compose up -d
```

Остановить все контейнеры
```
docker stop $(docker ps -q)
```

### Laravel
Очистить кэш
```
docker-compose run app php artisan optimize
docker-compose run app php artisan cache:clear
```

### Миграции
Добавить
```
docker-compose run app php artisan make:migration <migration_name>
```

Применить все миграции
```
docker-compose run app php artisan migrate
```

Откатить миграцию
```
docker-compose run app php artisan migrate:rollback
```