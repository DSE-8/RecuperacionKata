.PHONY : main build-image build-container start test shell stop clean
main: build-image build-container

build-image:
	docker build -t recuperacionkata .

build-container:
	docker run -dt --name recuperacionkata -v .:/540/recuperacionkata recuperacionkata
	docker exec recuperacionkata composer install

start:
	docker start recuperacionkata

test: start
	docker exec recuperacionkata ./vendor/bin/phpunit tests/$(target)

shell: start
	docker exec -it recuperacionkata /bin/bash

stop:
	docker stop recuperacionkata

clean: stop
	docker rm recuperacionkata
	rm -rf vendor
