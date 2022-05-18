#!/bin/bash

# Clear cache
composer clearcache

# Install PHP dependencies
composer install --no-dev -o

# Install Node dependencies
npm install

# Build Javascript assets
npm run build
