# Contributing

1. Fork this repository into your own GitHub account

2. Clone the repository to your `wp-content/themes/` directory

3. Navigate into the theme directory

```
cd jump
```

4. Install dependencies

```
composer install
``` 
```
npm install
````

5. Build assets

```
nvm use
```
```
npm run build
```

6. Lint PHP files

```
composer run lint-fix
```

```
composer run lint
```

7. Statically test PHP files

```
composer run test:static
```