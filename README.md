## Glamour Touch Nails & Beauty
Welcome to the Glamour Touch Nails & Beauty Appointment Booking Website! This project aims to provide a seamless online platform for clients to schedule appointments for nail and beauty services offered by Glamour Touch Nails & Beauty salon.
## Authors
✨ [Meghana Rathnam Kuppala](https://github.com/RathnamMeghana)
<br>
✨ [Aoife Murphy](https://github.com/AoifeMurphy02)
<br>
✨ [Meghan Keightley](https://github.com/meghank1066)

## <img src="https://emojigraph.org/media/microsoft/woman-technologist_1f469-200d-1f4bb.png" alt="alt text" width="40"> Technologies Used 

<img src="https://www.apachefriends.org/images/xampp-logo-ac950edf.svg" alt="XAMPP" width="30"> <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Visual_Studio_Code_1.35_icon.svg/1200px-Visual_Studio_Code_1.35_icon.svg.png" alt="Visual Studio Code" width="30"> <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png" alt="Laravel" width="30"> <img src="https://cdn4.iconfinder.com/data/icons/social-media-logos-6/512/121-css3-512.png" alt="CSS" width="30"> <img src="https://cdn.iconscout.com/icon/free/png-256/javascript-2752148-2284965.png" alt="JavaScript" width="30"> <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d5/Tailwind_CSS_Logo.svg/320px-Tailwind_CSS_Logo.svg.png" alt="Tailwind" width="30"> <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/61/HTML5_logo_and_wordmark.svg/640px-HTML5_logo_and_wordmark.svg.png" alt="HTML" width="30"> <img src="https://w7.pngwing.com/pngs/163/513/png-transparent-php-logos-and-brands-line-filled-icon.png" alt="PHP" width="30"><img src="https://botman.io/img/botman.png" alt="BotMan" width="30">


## Features
✨ Account Registration/Login: Including admin user and customer user types.
<br>
✨ Home: User friendly home page that keeps the customers engaged.
<br>
✨ About: Customers can view information about the nail salon.
<br>
✨ Staff Page: User can view all staff working at the salon. An admim can create, edit and delete a member of staff.
<br>
✨ Services Page: User can view all services the salon offers. An admim can create, edit and delete a service.
<br>
✨ Create appointment: loged in users can easily create an appointemnt where they can pick what service and staff they would like.
<br>
✨ View appointment: Loged in Users can view all their appoiments, an admin can view all appoments and edit and delete them.
<br>
✨ Delete appointment: Users can easily delete one of their own appointments.
<br>
✨ Image Uploads: Allows admin users to upload images for staff and services.
<br>
✨ ChatBot

## Requirements
✨	PHP 7.3 or higher <br>
✨	Node 12.13.0 or higher <br>
✨	XAMPP


## Usage <br>
✨ Setting up your development environment on your local machine: <br>
```
git clone https://github.com/RathnamMeghana/Beauty_Cosmetics_Laravel.git
cd beauty
composer install
php artisan key:generate
php artisan cache:clear 
php artisan config:clear
php artisan serve
```

## Before starting <br>
✨ Create a database <br>
```
mysql
create database beauty;
exit;
```

✨ Setup your database credentials in the .env file
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=beauty
DB_USERNAME={USERNAME}
DB_PASSWORD={PASSWORD}
```
✨ Migrate database tables
```
php artisan migrate
```
## Using BotMan 
```
composer require botman/botman
composer require botman/driver-web
composer dump-autoload
```
## <img src="https://since1979.dev/wp-content/uploads/2019/05/laravel-mix-logo.jpeg" alt="alt text" width="30"> To compile laravel mix 
```
composer require laravel-frontend-presets/tailwindcss --dev
php artisan ui tailwindcss --auth
npm remove laravel-mix
npm install laravel-mix --save-dev
npm install cross-env --save-dev
npm run watch
```
## Contributing
Do not hesitate to contribute to the project by adapting or adding features Bug reports or pull requests are welcome.
