
## Install
This tutorial works with docker and docker-compose and it suppose that you have installed yet.
If don´t you can visit official getting started guide from  [Docker page](https://www.docker.com/get-started)

Can install this project using [Laradock](https://laradock.io).

- Clone repository
```
	git clone git@github.com:matt987/api-poll2.git
```

- Get laradock submodule
```
	git submodule init
	git submodule update
```

- Create .env file for laravel
```
	cp env-example .env
```

- Create .env file for laradock
```
	cp env-example-laradock ./laradock/.env
```

- Build some containers
```
  docker-compose build nginx mysql phpmyadmin redis workspace
```

- Start containers
```
  docker-compose up -d nginx mysql phpmyadmin redis workspace
```

- Run migrations
```
	docker-compose exec workspace bash
	root@containerid:/var/www# php artisan migrate
```

- Visit [localhost](http://localhost) in browser
