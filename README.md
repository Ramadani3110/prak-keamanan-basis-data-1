## How to install
### Before you cloning this repository
- Check your php version, because this app was been builded by laravel version 12 you must use a php version >= 8.2
- Install composer
### Clone this repository
```bash
git clone https://github.com/Ramadani3110/prak-keamanan-basis-data-1.git
```
### Copy .env.example into .env
```bash
cp .env.example .env
```
### Generate new application key
```bash
php artisan key generate
```
### Install all needed depedency using composer
```bash
composer install
```
### Change this variable in .env
```.env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password

GOOGLE_RECAPTHA_KEY=your_recaptha_key
GOOGLE_RECAPTHA_SECRET=your_recaptha_secret

# you can generate the key in this link below 
# https://www.google.com/recaptcha/admin/create
# make sure you are choose rechaptha v2 in reCAPTCHA type
# you must register your domains or local ip in Domains section
```
### Migrate all tables
```bash
php artisan migrate
```
### Using seeders
```bash
php artisan db:seed
```
### Make storage symlinks
```bash
php artisan storage:link
```
### Running on local server
```bash
php artisan serve
```
