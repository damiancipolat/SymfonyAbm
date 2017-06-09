# ABM con PHP Symfony

Este ejemplo fue creado para un examén tecnico, lo subo para compartir con todos el desarrollo realizado.

Para instalar los vendor de symfony:
```sh
$ ./php composer.phar install
```
## BD:
- Configurar base de datos:
  Ir a la carpeta app/config/parameters.yml

  parameters:
    database_driver:   pdo_mysql
    database_host:     localhost
    database_port:     ~
    database_name:     sanjorge -> nombre de la bd
    database_user:     root
    database_password: ~
    mailer_transport:  smtp
    mailer_host:       localhost
    mailer_user:       ~
    mailer_password:   ~
    locale:            en
    secret:            ThisTokenIsNotSoSecretChangeIt

   En la carpeta /bd/ esta el archivo sanjorge.sql con el dump de la base de datos en mysql.

- Acceder por browser:
http://127.0.0.1/test/Examenes/sanjorge/web/app_dev.php/clientes/list/0

test/Examenes/sanjorge-> es el path en mi computadora, uds escriban ahi la ruta que usen.

