# Job app

This Symfony 6.4 project runs in Docker with MariaDB.

## 🚀 Requirements
- [Docker](https://www.docker.com/)
- [Docker Compose](https://docs.docker.com/compose/)
- `make` (optional but simplifies usage)

## ⚙️ Setup

1. **Installation**

```sh
make build
make up
make install
```

2. **Secrets configuration**

Set your own credentials for the [France-Travail API](france-travail.io) using Symfony secrets.
> **NOTE** : You need to create an account first

```sh
make generate-keys
```
## ✅ Useful commands

Build Docker image:
```shell
make build
```

Start containers:
```shell
make up
```

Stop and remove containers:
```shell
make down
```
Run composer install:
```shell
make install
```
Enter app shell:
```shell
make bash
```
Force DB schema update:
```shell
make schema-update
```

Create env file:
```shell
make env_local
```

Generate secrets keys
```sh
make generate-keys
```