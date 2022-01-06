# todolist

# iniciar banco de dados lamp por docker
inside the directory "docker-compose-lamp" execute:
'docker-compose up -d'

if you have some problem with address execute:
'sudo netstat -p -nlp | grep 3306' then 'sudo kill 'pid'" (i tried to change the port but have problems)

# star backend
inside the directory "backend" execute:
'php artisan serve' 
if some error ocurr execute:
'composer update' then:
'composer dump-autoload' then:
'php artisan serve'

# start app
inside frontend directory execute:
'npm run start'

if any error occur execute:
'yarn' then:
'yarn start'
