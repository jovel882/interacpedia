# Prueba de desarrollo de un panel de administración de compañías y empleados.

_Prueba de desarrollo para Interacpedia._


### Pre-requisitos 📋

_Ambiente requerido_

- Php 7.2.0 con phpCli habilitado para la ejecución de comando.
- Mysql 5.7.19.
- Composer 

### Instalación 🔧

1. Clonar el repositorio en el folder del servidor web en uso, **este folder debe tener permisos para que php se pueda ejecutar por CLI y permisos de lectura y escritura para el archivo .env**.

```sh 
git clone https://github.com/jovel882/interacpedia.git 
```

2. Instalar paquetes ejecutando en la raíz del sitio.

```sh 
composer install
```
3. Crear BD con COLLATE 'utf8mb4_general_ci', ejemplo.

```sh 
`CREATE DATABASE interacpedia COLLATE 'utf8mb4_general_ci';`
```

4. Duplique el archivo `.env.example` incluido en uno `.env` y dentro de este ingrese los valores de las variables de entorno necesarias, las básicas serían las referentes a BD y Mail:
- `DB_HOST="value"` Variable de entorno para el host de BD.
- `DB_PORT="value"` Variable de entorno para el puerto de BD.
- `DB_DATABASE="value"` Variable de entorno para el nombre de BD.
- `DB_USERNAME="value"` Variable de entorno para el usuario de BD.
- `DB_PASSWORD="value"` Variable de entorno para la contraseña de BD.
 

- `MAILGUN_DOMAIN="value"` Variable de entorno para la url del dominio de MailGun. Ejemplo `sandboxcf1adb816f9a4e51b604b93f5492de32.mailgun.org`.
- `MAILGUN_SECRET="value"` Variable de entorno para el API key del dominio de MailGun. Ejemplo `f4632a995ca79aff67d6280c782623ec-09001d55-52406e15`.
- `MAIL_FROM_ADDRESS="value"` Variable de entorno para la cuenta de correo que será el remitente.
- `MAIL_FROM_NAME="value"` Variable de entorno para el nombre del remitente que aparecerá en los correos.
- `MAIL_TO_ADDRESS="value"` Variable de entorno para la cuenta de correo a la cual serán enviadas las notificaciones, si está usando una cuenta free de MailGun asegúrese de habilitar esta cuenta previamente para que pueda recibir correos.

5. En la raíz del sitio ejecutar.
- `php artisan key:generate && php artisan config:cache && php artisan config:clear` Genera la llave para el cifrado de proyecto y refresca las configuraciones.
- `php artisan migrate` Crea la estructura de BD. 
- `php artisan db:seed` Carga los datos de ejemplo, en este caso el árbol inicial enviado en la prueba.
- `php artisan storage:link` Genera el link simbólico entre "public/storage" y "storage/app/public".
- `php artisan permission:cache-reset` Limpia la cache de los permisos.
- `php artisan serve` Arranca el servidor web bajo la url [http://127.0.0.1:8000](http://127.0.0.1:8000).

##### Nota: 
Si desea puede ejecutar todos los comandos anteriores juntos si ejecuta 
```sh
php artisan key:generate && php artisan config:cache && php artisan config:clear && php artisan migrate && php artisan db:seed && php artisan storage:link && php artisan serve
```
6. En la raíz del sitio usar este comando si se desea ejecutar las pruebas.
```sh 
vendor/bin/phpunit
```

7. Accede al sitio usando la url [http://127.0.0.1:8000](http://127.0.0.1:8000).

## Descripción general de las URL's ⚙️

Método|URL|Descripción
 ------ | ------ | ------ 
 GET| /                                |Raíz del sitio
 GET| lang/__{lang}__                      |Raíz del sitio con idioma. 
 GET| login                            |Formulario de ingreso.
 POST      | login                            |Ingreso
 POST      | logout                           |Logout
 GET| __{lang}__                           |Home del sitio con idioma.
 GET| __{lang}__/companies                 |Vista con el listado de compañías y acciones disponibles.
 GET| __{lang}__/companies/create          |Formulario de creación para la compañía.
 POST      | __{lang}__/companies                 |Almacena la compañía.
 GET| __{lang}__/companies/__{company}__       |Vista con el detalle de la compañía.
 GET| __{lang}__/companies/__{company}__/edit  |Formulario de actualización para la compañía.
 PUT| __{lang}__/companies/__{company}__       |Actualiza la compañía.
 DELETE    | __{lang}__/companies/__{company}__       |Elimina la compañía.
 GET| __{lang}__/employees                 |Vista con el listado de empleados y acciones disponibles.
 GET| __{lang}__/employees/create          |Formulario de creación para el empleado.
 POST      | __{lang}__/employees                 |Almacena el empleado.
 GET| __{lang}__/employees/__{employee}__      |Vista con el detalle del empleado.
 GET| __{lang}__/employees/__{employee}__/edit |Formulario de actualización para el empleado.
 PUT| __{lang}__/employees/__{employee}__      |Actualiza el empleado.
 DELETE    | __{lang}__/employees/__{employee}__      |Elimina el empleado.

##### Nota: 
- El parámetro __{lang}__ solo permite __es__ o __en__.
- El parámetro __{company}__ debe ser numérico.
- El parámetro __{employee}__ debe ser numérico.

## Usuarios de prueba disponibles. 🔑

Email|Password|Rol|Permisos
 ------ | ------ | ------ | ------ 
admin@admin.com|password|SuperAdministrator|Puede realizar todas las acciones disponibles.
empresas@admin.com|password|Empresas|Solo puede realizar todas las acciones disponibles para las empresas (Crear, Editar, Ver y Eliminar).
empresasconsultas@admin.com|password|EmpresasConsultas|Solo puede ver las empresas.
empresasgestion@admin.com|password|EmpresasGestion|Solo puede crear y editar las empresas.
empleados@admin.com|password|Empleados|Solo puede realizar todas las acciones disponibles para los empleados (Crear, Editar, Ver y Eliminar).
empleadosconsultas@admin.com|password|EmpleadosConsultas|Solo puede ver los empleados.
empleadosgestion@admin.com|password|EmpleadosGestion|Solo puede crear y editar los empleados.

## 💻 Despliegue en Heroku
Se realizó un despliegue en Heroku bajo el siguiente End Point:
[https://interacpedia.herokuapp.com/](https://interacpedia.herokuapp.com/)


##### - Nota:
Al no tener costo este espacio en Heroku los tiempos de respuesta no son tan óptimos y algunas caracteristicas no funcionan correctamente, por favor tomar solo de referencia y realizar el despliegue normal.

## Autor ✒️ 

* **John Fredy Velasco Bareño** [jovel882@gmail.com](mailto:jovel882@gmail.com)


------------------------