Symfony 5: Blog
=====================
Application deployment instructions
-----------------------------------
### 1. Clone the repository
git clone https://github.com/MaksimLit/SymfonyBlog
### 2. Install dependencies
composer install
npm install
### 3. Run webpack
./node_modules/.bin/encore dev
### 4. Run ORM migrations
php bin/console doctrine:migrations:migrate