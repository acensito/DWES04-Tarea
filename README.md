#  DWES - Tarea 04

## Enunciado:

Para esta tarea vamos a retomar la base de datos empleada en la tarea 2: banca\_electronica. Esta base de datos consta de 2 tablas, usuarios y movimientos. El usuario con acceso total a dicha base de datos sigue siendo &quot;dwes&quot; con contraseña &quot;abc123&quot;. Los accesos a la base de datos se realizarán a través de la clase  **DB**.

Esta nueva tarea será una combinación de la tarea 2, elementos vistos en la tarea 3 y elementos nuevos de la unidad 4. Para que nos sea más sencillos comprenderlo, vamos a tomar como base la tarea 2 y a esta le añadiremos/modificaremos los siguientes elementos:

- Las contraseñas de los usuarios se almacenarán usando hashing de una sola vía mediante la función crypt, por lo tanto para comprobar si una contraseña es correcta se deberá usar la función password\_verify.
- En el acceso a la banca electrónica (usuarios registrados en la BD), al antiguo mensaje de bienvenida con el nombre de usuario, le añadiremos la hora de inicio de sesión (trabajaremos con sesiones).
- Se añadirá una nueva opción al menú de la banca electrónica, que será &quot;Preferencias&quot; y que tendrá el mismo funcionamiento que en la tarea 4. Permitirá al usuario seleccionar el color de fondo con el que se mostrarán todas las páginas. Estas preferencias serán guardadas en una cookie. En caso de que no se hayan establecido preferencias el color por defecto será el blanco. Esta página también ofrecerá la opción de restablecer las preferencias (debe eliminar la cookie). Cuando un usuario cierre sesión, deberán reestablecerse la preferencias.
- Quitaremos toda la parte de administración de usuarios (para evitar que la aplicación sea demasiado extensa).
- Toda la aplicación debe ser creada utilizando  **POO**. Para ellos deberás crear las clases Usuario y Movimiento. No todos los campos de la BD son necesarios en el desarrollo de las clases, así que intenta optimizar su implementación.
- También debes separar la lógica de presentación y la lógica de negocio utilizando  **plantillas Smarty**

**NOTA:**  Aunque la estructura de directorios necesaria para Smarty es conveniente que esté ubicada en un lugar no accesible por el servidor web, para facilitar la corrección de la tarea debe crearse en la misma carpeta en la que está ubicado el proyecto de esta tarea, en una carpeta llamada smarty donde debes situar la estructura de directorios de Smarty (templates, templates\_c, configs y cache), es decir, la carpeta smarty debe estar  al mismo nivel que el fichero  **index.php** ,  **banca.php** ,...


## Criterios de corrección:

|La obtención de la nota de la tarea se hará según los siguientes criterios mostrados en la siguiente tabla:|
|---|

| **Puntuación Máxima** | **Criterio** |
|---|---|
|  Sin calificación | Tarea no entregada o en borrador. |
| 0  |La tarea entregada no se corresponde con lo que se  pide. La tarea se ha entregado fuera de plazo.La tarea ha sido copiada. **La tarea se ha realizado sin usar POO. No se usan plantillas Smarty.**|
| 4  |La tarea no se puede ejecutar o se ha modificado la estructura de la base de datos.La tarea se realiza usando AJAX, Javascript, etc que se trabajarán en unidades posteriores.|
| 10 |La tarea entregada y que funcione correctamente (que no corresponda a ninguno de los apartados mencionados anteriormente) será corregida según la siguiente valoración:|

Cada uno de los apartados se puntuarán siguiendo la siguiente plantilla:

| Crear correctamente la clase DB. | 0,4 |
| --- | --- |
| Crear correctamente la clase Usuario. | 0,4 |
| Crear correctamente la clase Movimiento. | 0,4 |
| Generar correctamente la lógica de negocio de index.php | 0,4 |
| Generar correctamente la lógica de negocio de banca.php | 0,4 |
| Generar correctamente la lógica de negocio de  ultimosmovimientos.php | 0,4 |
| Generar correctamente la lógica de negocio de ingresardinero.php | 0,4 |
| Generar correctamente la lógica de negocio de pagarrecibo.php | 0,4 |
| Generar correctamente la lógica de negocio de devolverrecibos.php | 0,4 |
| Generar correctamente la lógica de presentación en login.tpl (lógica de presentación de index.php) | 0,4 |
| Generar correctamente la lógica de presentación en  ultimosmovimientos.tpl | 0,4 |
| Generar correctamente la lógica de presentación de ingresardinero.tpl | 0,4 |
| Generar correctamente la lógica de presentación de pagarrecibo.tpl | 0,4 |
| Generar correctamente la lógica de presentación de devolverrecibos.tpl | 0,4 |
| Generar la estructura de directorios de Smarty como se indica en el enunciado | 0,2 |
| Correcta navegación entre páginas. | 0,5 |
| Correcta funcionalidad de la aplicación (Especificación del funcionamiento y formato en tarea 3) | 1,5 |
| Control de errores mediante excepciones. | 0,2 |
| Estética y organización de la aplicación. | 1 |
| Impresión general de la aplicación. | 1 |

  
## Recursos necesarios:

- Ordenador con PHP, servidor web Apache y entorno de desarrollo NetBeans, correctamente instalado y configurado o Notepad++.
- Extensión de depuración Xdebug para PHP instalada y funcionando con NetBeans.
- Tener instalado y correctamente configurado el motor de plantillas Smarty.
- Script de la base de datos:   [Script para la base de datos](http://www.juntadeandalucia.es/educacion/gestionafp/datos/tareas/DAW/DWES_14076/2015-16/DAW_DWES_5_2015-16_Individual__757075/banca_electronica.zip) (zip - 638 B)  (fichero .zip Tamaño 1 KB)
- [Manual de php.](http://es1.php.net/manual/es/index.php)
- Ayuda para el uso de la [ función crypt() ](http://php.net/manual/es/function.crypt.php)para la generación de hash de contraseñas.
- Ayuda para el uso de la  [función password\_verify() ](http://php.net/manual/es/function.password-verify.php)para comprobar el hash de una contraseña.

## Consejos y recomendaciones:

Se recomienda ir desarrollando cada una de las partes solicitadas hasta que se obtenga toda la funcionalidad de la aplicación correctamente, comenzando por la creación de los ficheros de clases (usuario.php y movimiento.php) y el fichero index.php con su correspondiente plantila (login.tpl), y continuando con el resto de funcionalidades.

Se aconseja hacer uso del manual de la página oficial de php y los recursos indicados en el apartado &quot;Recursos necesarios&quot;.

Una vez finalizada la tarea y antes de entregarla es necesario volver a leer el enunciado y los criterios de corrección y puntuación para comprobar que se ha realizado todo tal y como se solicita.

