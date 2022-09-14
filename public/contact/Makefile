NAME=easy_mail
DB=easy_mail_db

up:
	docker-compose up -d
down:
	docker-compose down
ps:
	docker ps
build:
	docker-compose build
shell:
	docker exec -it $(NAME) /bin/bash
db:
	docker exec -it $(DB) /bin/bash
restart:
	stop start
info:
	docker system info
df:
	docker system df
destroy:
	docker-compose down --rmi all --volumes
clean:
	docker builder prune
