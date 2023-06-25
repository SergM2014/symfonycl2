it is a dockerized Symfony. nginx,  Postgresql, etc are included
Xdebug is also enabled

https://github.com/rompetomp/inertia-bundle Inertia.js Symfony adapter is used

All steps of instalation are  tested localy, Ubuntu 22.04, successfully

1. $ git clone https://github.com/SergM2014/symfonycl2.git
2. cd symfonycl2
3. $ docker compose up -d
4. $ docker compose exec symfony_app bash
5. $ composer install
6. $ npm install
7. $ npm run dev
8. $ bin/phpunit

to leave the shell tip $ exit 


in some rarecases, when app doesnot work in proper way, it maight be neccessary to tip $sudo chmod -R 775 var


to see fulfilment of task 1 visit -> http://localhost:8080/

to see task 2.1 visit -> http://localhost:8080/task21

to see task 2.2 visit -> http://localhost:8080/task22

for task 1 PhpUnit tests are made



!!!  Also the app is deployed on an alive server -> http://claryfi.serhiim.site