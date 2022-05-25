# php-test

Este repositorio define una tarea para evaluar las habilidades de comprensión y ejecución de aspirantes a trabajar con nosotros en proyectos basados en PHP.

# Pasos generales para la ejecución y entrega de la tarea:

1. Cree un fork de este repositorio en su usuario de GitHub
2. Cumpla con todos los requerimientos de la letra
3. Envíe un Pull Request a este repositorio desde su fork

# Requerimientos técnicos:

1. Definir un componente de Composer (https://getcomposer.org/) para php-test, lo más completo que pueda.
2. Crear una pequeña aplicación con: PHP, jQuery, Twitter Bootstrap y MySQL, que cumpla con los siguientes flujos:
   
   1. Un usuario accede a la aplicación desde localhost
   2. La aplicación muestra un formulario de login con email y password
   3. El usuario ingresa email y password erróneos
   4. La aplicación muestra el login y un mensaje error
   5. El usuario ingresa email y password correctos

   6. La aplicación muestra una pantalla de listado de códigos de diagnósticos vacía
   7. El usuario hace clic en el botón "upload"
   8. La aplicación muestra una ventana modal con un formulario que tiene un file picker y un botón "upload"
   9. El usuario hace clic en el file picker
   10. La aplicación abre el selector de archivos del sistema operativo
   11. El usuario selecciona un archivo CSV ("codigos.csv" presente en este repositorio) y hace clic en OK
   12. El archivo queda seleccionado en el file picker
   13. El usuario hace clic en el botón "upload" de la ventana modal

   14. La aplicación recibe el archivo, lo procesa y carga los datos en la base de datos, antes de guardar en la base de datos debe verificar que no hay items repetidos, comparando los códigos dentro del CSV
   15. La aplicación devuelve la cantidad de items cargados en la base de datos y la cantidad de items en el CSV original y se las muestra al usuario, dentro de la misma modal
   
   16. El usuario cierra la modal
   17. La aplicación recarga el listado de códigos, mostrando ahora los códigos que se cargado desde el CSV

   18. El listado de códigos debe ser paginado, se muestran 10 items por página, y un paginados en la parte inferior de la pantalla
   19. Por defecto se muestra la primera página (primeros 10 códigos)
   20. El usuario hace clic en el paginador, en la página 2, y se muestran los segundos 10 códigos
   21. El usuario puede hacer clic en cualquiera de las páginas y la aplicación muestra los códigos correspondientes a dicha página
   
   22. En la parte superior del listado de códigos hay un search box
   23. El usuario ingresa un código parcial o completo
   24. La aplicación muestra los items que contengan el código parcial o completo dentro de su código
   25. El resultado de la búsqueda se muestra también paginado (si hay más de 10 elementos en el resultado, se muestran tantans páginas como sea necesarias en el paginador)

   26. El usuario hace clic en el botón logout
   27. La aplicación elimina la sesión y muestra el formulario de login

   28. Si el usuario ingresa de nuevo, la aplicación debería listar los items que se cargaron en los flujos anteriores, y el paginador y búsqueda funcionar correctamente
  
   29. Notar que al paginar, habiendo una búsqueda presente, es debe mantener la búsqueda
  
   3. La carga y respuesta en 2.13, 2.14 y 2.15 debe hacerse por AJAX
   4. La búsqueda en el search box en 2.23, 2.24, 2.25 debe hacerse por AJAX
   5. El procesamiento del CSV en 2.11 - 2.15 debe filtrar los códigos duplicados, sin fallar, y cargando solo los códigos que aparecen una sola vez en el CSV
   
   6. El esquema de la base de datos debe ser el siguiente:
  
   1. user(id integer PK, email varchar(255) not null, password varchar(255) not null)
   2. cpt(id indeger PK, code varchar(255) not null, description text not null)
   3. Los identificadores son autoincrementales.

## Notas generales:

1. Utilizar PHP directo, sin frameworks
2. Utilizar los componentes de Twitter Bootstrap para la interfaz de usuario
3. Utilizar jQuery para manejar las interacciones con AJAX
4. Los datos deben estar almacenados en MySQL
5. Debe incluir un script que se pueda ejecutar directamente desde la terminal, que cargue un par de usuarios en la base de datos
6. El archivo `codigos.csv` contiene valores con comillas dobles dentro del texto de la segunda columna (ej. el texto del código `A4719` debe cargarse en la base de datos exactamente como `"y set" Tubing for Peritoneal Dialysis`), también hay textos con paréntesis, puntos y comas, barras `/` y otros símbolos: `<`, `>`, `&`, `%` o con comas `,`. La carga debe mantener los textos tal cual están en el archivo.
7. Notar también que algunos textos en el archivo con bastante largos, debe tener en cuenta esto al crear el esquema de la base de datos, dado que el texno NO DEBE TRUNCARSE.
8. Y notar que se agregaron códigos repetidos para que verifique duplicados en la subida: no se deberían cargar items con códigos duplicados. LOS DUPLICADOS NO TIENEN POR QUÉ SER ITEMS CONSECUTIVOS dentro del archivo.
9. El archivo puede contener líneas en blanco, se deben filtrar.

# Entrega:

1. Debe entregar el código PHP, un archivo SQL con el esquema de la base de datos, el script para cargar usuarios, el "composer.json" (definición del componente de Composer), y un documento en Markdown the GitHub "DOC.md" que explique lo que hizo.
2. La forma de entrega es mediante la creación de un Pull Request desde su fork hacia este repositorio.
3. Se valorará que además comparta un video con una pequeña demo del trabajo realizado, explicando los flujos de usuario que son soportados (no es necesario que explique el código). Puede subir el video a YouTuve y agregar el link en la documentación que entregue.

## La fecha límite para la entrega es el domingo 29 de Mayo a las 23:59.

# Dudas?

pablo.pazos@cabolabs.com
