set-up:
	docker network create yugyosen-dev
	docker-compose -f ./docker-compose.yml build
	docker-compose build --no-cache
	docker compose up -d

set-up-app:
	make up || true
	docker-compose -f ./docker-compose.yml run --rm app composer install
	docker-compose -f ./docker-compose.yml run --rm app npm ci
	docker-compose -f ./docker-compose.yml run --rm app chmod -R 777 bootstrap/
	docker-compose -f ./docker-compose.yml run --rm app chmod -R 777 ./storage/logs/
	docker-compose -f ./docker-compose.yml run --rm app chmod -R 777 ./storage/framework/
	docker-compose -f ./docker-compose.yml run --rm app php artisan key:generate
	docker-compose -f ./docker-compose.yml run --rm app php artisan config:cache
	# docker-compose -f ./docker-compose.yml run --rm app php artisan migrate --seed
	docker-compose -f ./docker-compose.yml run --rm app php artisan storage:link

build:
	docker-compose -f ./docker-compose.yml build

up:
	docker-compose -f ./docker-compose.yml up -d

down:
	docker-compose -f ./docker-compose.yml down

pull:
	docker-compose -f docker-compose.yml pull

exec-app:
	make up || true
	docker-compose -f ./docker-compose.yml exec app bash || true

er-output:
	docker run --rm --net yugyosen-dev -v "`pwd`/schemaspy:/output" -v "`pwd`/drivers:/drivers" schemaspy/schemaspy:snapshot -t mysql -host db:3306 -db yugyosen -u root -p root -s yugyosen

autoload:
	make up || true
	docker-compose -f ./docker-compose.yml run --rm app composer dump-autoload

fix-code-format-laravel-app:
	vendor/bin/php-cs-fixer fix app

laravel-cache-all-clear:
	docker-compose -f ./docker-compose.yml run --rm app php artisan cache:clear
	docker-compose -f ./docker-compose.yml run --rm app php artisan config:clear
	docker-compose -f ./docker-compose.yml run --rm app php artisan config:cache
	docker-compose -f ./docker-compose.yml run --rm app php artisan route:clear
	docker-compose -f ./docker-compose.yml run --rm app php artisan view:clear
	docker-compose -f ./docker-compose.yml run --rm app php artisan clear-compiled
	docker-compose -f ./docker-compose.yml run --rm app php artisan optimize
	docker-compose -f ./docker-compose.yml run --rm app composer dump-autoload
	docker-compose -f ./docker-compose.yml run --rm app rm -f bootstrap/cache/config.php

npm-run-watch:
	make up || true
	docker-compose -f ./docker-compose.yml run --rm app npm run watch

format-php-code:
	./vendor/bin/php-cs-fixer fix -v --diff --diff-format udiff

# SEE: https://scribe.readthedocs.io/en/latest/index.html
api-doc-generate:
	docker-compose -f ./docker-compose.yml run --rm app php artisan scribe:generate

db-migrate:
	make up || true
	docker-compose -f ./docker-compose.yml run --rm app php artisan migrate

db-seed:
	docker-compose -f ./docker-compose.yml run --rm app php artisan db:seed

db-dummy-seed:
	docker-compose -f ./docker-compose.yml run --rm app php artisan db:seed --class=DummyDatabaseSeeder

api-test:
	docker-compose -f ./docker-compose.yml run --rm app php artisan test

run-front-auto-test:
	npx cypress open --config-file cypress.dev.json