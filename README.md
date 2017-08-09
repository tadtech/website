## Introduction

This repository contains the source code, static assets and development scripts for the Tadtech website ([tadtech.co.uk][1]). 

## Requirements

- Docker 17.06.0+
- Docker Compose
- Composer (optional, to run the test suite locally)

## Installation

```bash
cp .docker/php/.env.dist .docker/php/.env
docker-compose up
```

## Running the tests

If you have Composer installed locally, you can run tests using the following command:

```bash
composer install
./vendor/bin/phpunit
```

If the PHP Docker container is up, you can also run tests inside it:

```bash
docker-compose up -d
docker-compose exec php bash -c "cd /app && ./vendor/bin/phpunit"
```

[1]: http://tadtech.co.uk
