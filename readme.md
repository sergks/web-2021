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