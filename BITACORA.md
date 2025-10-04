```bash
composer create-project symfony/skeleton:"7.3.x" .
git init
nano .gitignore
git config --global user.name
git config --global user.email
git remote add origin git@github.com:carjosdan/demo-amazon.git
git commit -m "Primer commit: skeleton de symfony 7.3. JSON de prueba práctica amazon.json. README inicial."
composer update 
php bin/console make:entity Product
php bin/console make:entity User
php bin/console make:migration
php bin/console doctrine:migrations:migrate
´´´