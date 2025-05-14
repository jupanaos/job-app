build:
	docker compose build --no-cache

up:
	docker compose up -d

down:
	docker compose down

bash:
	docker compose exec php bash

schema-update:
	docker compose exec php php bin/console doctrine:schema:update --dump-sql --force

install:
	docker compose exec php composer install
