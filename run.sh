#!/bin/bash

composer install

printf 'Waiting for localstack to start'
until $(curl --output /dev/null --silent --head http://localstack:4566); do
    printf '.'
    sleep 2
done

php test.php