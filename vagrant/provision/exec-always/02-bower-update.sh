#!/bin/bash

echo "Updating bower dependencies"

cd /data
yes 'n' | bower update --allow-root