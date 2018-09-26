## Getting started

### Environment configuration file
copy the ```.env.example``` file into our own ```.env``` file

### Via Docker
```
docker-compose up -d
```

Once the container is up, run this:
```
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan migrate --seed
```

Once you’ve executed the two command mentioned above, go to:
```
http://0.0.0.0:8888/
```

### Via composer

Server Requirements:
```
PHP >= 7.1.3
OpenSSL PHP Extension
PDO PHP Extension
Mbstring PHP Extension
Tokenizer PHP Extension
XML PHP Extension
Ctype PHP Extension
JSON PHP Extension
MySQL
```

DB Connections:
```Update DB connections details in the .env``` 
file and make sure the database exists.

Once the database connection is successful, run commands below:
```
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

Go to:
```
http://127.0.0.1:8000/
```

# Hooray