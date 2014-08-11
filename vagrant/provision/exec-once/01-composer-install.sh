#!/bin/bash

echo "Installing composer dependencies"

cd /data
composer self-update
composer install
vendor/bin/phing build-dev
chown -R www-data: /storage
