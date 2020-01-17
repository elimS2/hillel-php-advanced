# Docker PHP-FPM 7.3 & Nginx 1.14 on Ubuntu

![nginx 1.14.0](https://img.shields.io/badge/nginx-1.16-brightgreen.svg)
![php 7.3](https://img.shields.io/badge/php-7.3-brightgreen.svg)
![License MIT](https://img.shields.io/badge/license-MIT-blue.svg)

## Usage

Build the Docker image:

    curl "https://raw.githubusercontent.com/elimS2/hillel-php-advanced/master/lesson-3/Dockerfile" | docker build -t docker-elims-nginx-php -

Start the Docker container:

    docker run -d -p 8880:80 --name elims-container docker-elims-nginx-php

See the PHP info on http://localhost:8880

Enter to terminal with root:

    docker exec -it -u="root" elims-container bash
