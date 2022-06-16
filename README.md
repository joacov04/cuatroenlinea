# cuatroenlinea
Tarea dagos - Administración del ambiente de trabajo

## Requisitos
- DDEV (https://ddev.readthedocs.io/en/stable/)
- Docker (https://docs.docker.com/desktop/linux/install/)
- Composer `sudo apt install composer`

## Preparación
1. Una vez instalados los requerimientos ejecutamos el siguiente comando en la carpeta donde clonaste el repo
`ddev config`
Esto se encarga de configurar el ambiente ddev, detectara automaticamente que estamos utilizando laravel entonces
no debemos preocuparnos por seleccionarlo.

2. Crear archivo de entorno
Para poder ejecutar la aplicacion debemos crear un archivo de entorno, como el contenido necesario ya está incluido 
en `.env.example` simplemente lo copiamos:
`cp .env.example .env`

3. Creación de la clave
Debemos crear una clave para nuestra aplpicación con el siguiente comando:
`php artisan key:generate`

4. Correr la aplicaión
`ddev start`

Ahora podemos acceder a la aplicacion desde el siguiente link: https://cuatroenlinea.ddev.site/jugar/1
En caso de que hayas elegido otro nombre al ejecutar `ddev config`, usa ese nombre en vez de cuatroenlinea en la URL

5. Cerrar la aplicaión
`ddev stop`
