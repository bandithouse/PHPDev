start:
	docker-compose up -d

stop:
	docker-compose down

bash:
	docker exec -it bandit-phpdev_symfony_1 /bin/bash