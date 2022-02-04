# My web page jorgejimenezcr.com

## deploy
### Push request in master brach
```
git add .
git commit -m "note"
git push --set-upstream
```
```
git add . && git commit -m "note" && git push --set-upstream
```

```
git checkout master
git pull origin local
git add .
git commit -m "note"
git push --set-upstream
```

run in your browser 
```
https://forge.laravel.com/servers/475367/sites/1497684/deploy/http?token=fyeWjuyTDVg5IXEeryeMEeihQCcYx7tKN2IO10b5
```

### commands to run in laravel forge
```
composer install
composer dump-autoload
composer clearcache

php artisan cache:clear
php artisan config:cache
php artisan config:clear
php artisan route:clear
php artisan migrate --force

npm run install
npm run prod
```
### commands to run from clear git branch
```
git branch
git branch -d "name"
git remote prune origin
git fetch --prune
```
