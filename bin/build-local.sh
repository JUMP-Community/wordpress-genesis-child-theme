#!/bin/bash

# Clear cache
composer clearcache

# Install PHP dependencies
composer install

# Install Node dependencies
npm install

# Build Javascript assets
npm run build
