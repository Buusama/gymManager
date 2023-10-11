chmod -R 777 ./
cp .env.example .env
docker-compose up --build -d
docker-compose exec app composer install --ignore-platform-reqs
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan optimize
docker-compose exec app php artisan migrate:refresh
docker-compose exec app php artisan db:seed --force