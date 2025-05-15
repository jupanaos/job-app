## Makefile env vars
DOCKER_COMPOSE?= docker compose
EXEC?= $(DOCKER_COMPOSE) exec
PHP?= $(EXEC) php
COMPOSER?= $(PHP) composer
CONSOLE?= $(PHP) bin/console

build:
	$(DOCKER_COMPOSE) build --no-cache

up:
	$(DOCKER_COMPOSE) up -d

down:
	$(DOCKER_COMPOSE) down

bash:
	$(PHP) bash

generate-keys:
	$(CONSOLE) sec:generate-keys

schema-update:
	$(CONSOLE) doctrine:schema:update --dump-sql --force

install:
	$(COMPOSER) install

env_local: .env ## Create the .env.local file
	echo cp .env .env.local;\
	cp .env .env.local;\
	echo '\033[1;41m/!\ The .env.local file has been created. Please modify your file to your need.\033[0m';\
	exit 0;\