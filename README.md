# todolist

# iniciar banco de dados lamp por docker
docker-compose up -d

# logar no banco
docker exec -it lamp-database bash

# star backend
php artisan serve

# start frontend
npm run start

composer dump-autoload


# migrates
php artisan migrate:fresh --seed

# limpar cache, rota
php artisan cache:clear
php artisan config:clear
php artisan route:clear
