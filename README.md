# Stop any running containers

docker-compose down

# Remove any existing volumes to start fresh

docker-compose down -v

# Rebuild and start the containers

docker-compose up -d --build

# Generate application key

docker-compose exec app php artisan key:generate

# Run migrations

docker-compose exec app php artisan migrate

# Run server

docker-compose exec app php artisan serve
docker-compose up
