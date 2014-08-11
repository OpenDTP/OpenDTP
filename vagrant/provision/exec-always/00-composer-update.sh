#!/bin/bash

echo "Installing composer dependencies"

cd /data
composer update
vendor/bin/phing build-dev
chown -R www-data: /storage