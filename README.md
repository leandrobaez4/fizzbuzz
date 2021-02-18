# fizzbuzz

## Pasos de instalación

1 - Requiere [Composer](https://getcomposer.org/)

```sh
composer install
```


2 - Cambiar los permisos al proyecto:

```sh
chmod -R 777 fizzbuzz  
```

3 -  Dentro de la raiz de protecto correr el commando built-in Web server:

```sh
php -S localhost:4000
```

4 - En el navegador acceder a la url localhost:4000/fizzbuzz/1/15


## PhpUnit

Para correr el test unitario desde la raiz del proyecto

```sh
cd tests
phpunit TestMultiples.php   
```

## Logger

En la carpeta log se guarda el file con los log del loop