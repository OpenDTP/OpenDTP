#!/bin/bash

echo "Installing composer dependencies"

cd /data

export APPLICATION_ENV="developpement"

composer update
vendor/bin/phing build-dev
chown -R www-data: /storage
