## Install

### Create a folder for your project and move to it

### Clone (or fork, or download)

```sh
git clone https://github.com/Chabloz/webmobui-im51-fullstack.git .
```

### Install dependencies

```sh
composer install
```

```sh
npm ci
```

### Create a .env file

Copy the example file and edit it to your needs

```sh
cp .env.example .env
```

### Generate a key

```sh
php artisan key:generate
```

(Ask the teacher for the EDU-ID secret to put in the .env file)


### Create and seed the database

Create a file named `database.sqlite` in the `database` folder and:

```sh
php artisan migrate --seed
```

### Dev
In two separate terminals:

```sh
php artisan serve
```

```sh
npm run dev
```

### Build

```sh
npm run build
```