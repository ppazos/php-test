# Video DEMO en este enlace:  
##  https://www.youtube.com/watch?v=LgiEzr2uSEg

* Instale el componente de PHP Mailer ejecutando la siguiente línea de comando desde el directorio de proyecto: 
composer require phpmailer/phpmailer
cree un correo de Gmail para fines de este test y configure el host stm de Gmail.
* Cree la aplicación según los requerimiento con PHP puro (sin framework), MySql y las librerías de jQuery, Bootstrap.
* En la carpeta del proyecto encontraran la siguiente estructura:
a)	una carpeta App donde encontraran: 
-el archivo controllerList.php quien se encarga de cargar la tabla que se muestra en la aplicación con los datos que se encuentran cargados en la base de datos. 
-el archivo controllerLoad.php se encarga de todo lo referente al proceso de cargar el CSV procesarlo, subir al servidor, eliminar líneas vacías, controlar códigos duplicados, respetar los caracteres especiales que pueden haber dentro de la descripción de cada código y todos los controles requeridos para luego guardar en la base de datos. 
– el archivo Load contiene la vista de la tabla de códigos con su buscador. 
-el archivo login.php se encarga de la verificación y el acceso a la aplicación. 
-el archivo logout.php se encarga de destruir la sesión y redireccionar a login de la aplicación. 
-el archivo controllerMail.php se encarga de enviar un correo (al usuario conectado, es decir al correo de la sesión) con los datos generados luego de procesar el CSV
b)	En la carpeta dataBase encontraran: 
-el archivo conf.php el cual contiene los datos para conectarse a la base de datos. 
-el archivo connec.php donde se hace la conexión a la base de datos con PDO. 
-el archivo SQL.
c)	En la carpeta js encontraran el archivo internal.js el cual contiene todo el código jquery y Ajax utilizado en la aplicación
d)	En la carpeta script_newUser esta el script para crear usuarios desde el terminal.

