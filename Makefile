init:
	cp ./.env.example ./.env
	docker network create test-network || true
	make up
	make install
install:
	./bin/composer install -o -a
up:
	docker-compose -f docker-compose.yml up -d --build
	./bin/artisan serve --host=0.0.0.0
down:
	docker-compose -f docker-compose.yml down
