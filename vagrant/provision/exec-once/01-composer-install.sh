#!/bin/bash

echo "Installing composer dependencies"

cd /data

export APPLICATION_ENV="developpement"

composer self-update
composer install
vendor/bin/phing build-dev
