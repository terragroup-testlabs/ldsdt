### Deploy
1. Clone project
2. Copy env.example to .env, fill WEATHER_API_KEY and WEATHER_CITY
3. run `docker-compose up`
4. run `composer install` and `php artisan migrate` in project-php container
5. use `php artisan db:seed` to seed database

### Manual launch
1. run a command `php artisan app:fetch-temperature`

### Task
Написати мікросервіс:
1. Який щогодини зберігає температуру по одному місту, наприклад по Києву (вказується в env).
   Як варіант можна використовувати цей API: https://openweathermap.org/api.
2. По API віддає історію температури за день (який задаємо):
- day – GET-параметрі у форматі Y-m-d;
- x-token - рядок 32 символу передається через хедер (це просто константа, на яку треба перевірити запит, щоб відсіяти спам);
- формат повернення для всіх відповідей (у тому числі помилки) у форматі JSON;
- докеризувати проект
3. Проект викласти у публічний доступ на будь-якій git-платформі. 
