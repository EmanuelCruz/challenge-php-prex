# Challenge PHP PREX

## Descripción General

El desafío es integrarse a una API existente y desarrollar una API REST propia que exponga un conjunto de servicios. Asimismo se
deberán entregar distintos diagramas que representen la solución.

## Tecnologías

- PHP v8.2.
- Laravel v10.
- MySQL.
- Docker

## Requisitos Previos

- Docker: como mínimo hay que tenerlo instalado
- Api Key Giphy: Es necesario hacerte una cuenta en GIPHY Developers

## Levantar API

1. Clonar repositorio

```bash
git clone https://github.com/EmanuelCruz/challenge-php-prex.git
```

2. Generar archivo .env

```bash
cp env.example .env
```

3. Agregar el api key de Giphy developer en el `.env`

```env
GIPHY_API_KEY=api-key
```

4. Instalar librerías Composer, necesario para levantar ambiente con Laravel Sail

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```
Este contenedor utilizara PHP 8.2 y Composer para instalar la librerías

5. Levantar ambiente con Laravel Sail

```bash
./vendor/bin/sail up
```

En caso de utilizar Windows y que el comando no funcione, utilizar:

```bash
.\vendor\bin\sail up
```

6. Agregar el nombre de host a nuestro sistema

    - Abrir el archivo de hosts
    ```bash
    sudo /etc/hosts
    ```
    - Pegar el nombre del host del proyecto
    ```bash
    127.0.0.1       challenge-php-prex.test
    ```
7. Instalar librerías NPM

```bash
./vendor/bin/sail npm install
```

8. Ejecutar las migraciones

```bash
./vendor/bin/sail artisan migrate
```

9. Configuración de passport (seleccionar los valores por defecto)

```bash
./vendor/bin/sail artisan passport:install
```

## Postman

Para hacer la pruebas en Postman, existe un archivo (.json) en la carpeta `./docs/Postman`. Este archivo contiene la colección, para probar los endpoints de la API.

## Test

Para probar los feature test ejecutar el siguiente comando

```bash
./vendor/bin/sail artisan test --parallel --recreate-databases
```

Y si se requiere puede ver el coverage de testing

```bash
./vendor/bin/sail artisan test --coverage
```

## Diagramas

Los diagramas de Casos de Uso, Secuencia, y DER, se encuentran en `docs/diagrams/diagramas.docx`

## Datos para conectarse a la DB desde un gestor de DBs

```bash
host: localhost
user: sail
password: password
database: challenge_php_prex
port: 3307
```
