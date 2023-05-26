# COMPONENTES DEL ENTORNO
Es necesario tener los siguientes componentes:
  - Xampp 8.2.4
  - Php v8.2.4
  - php_xdebug-3.2.1-8.2-vs16-x86_64.dll (Buscar el debug en https://xdebug.org/wizard)
  - Apache Netbeans o vscode

El archivo "php_xdebug-3.1.6-7.3-vc15-x86_64.dll" debe estar en la siguiente ruta 'C:\xampp\php\ext', este archivo se debe colocarse luego de instalar el xampp.

Se debe colocar la siguiente configuración en el archivo "php.ini", el archivo se encuentra en 'C:\xampp\php'

  zend_extension=php_xdebug.dll
  xdebug.mode = debug
  xdebug.start_with_request = yes


# CLONAR EL REPOSITORIO
Para descargar el código en la máquina, debe crearse una cuenta en GitHub, ser invitado a este repositorio privado y también se debe instalar Git. Se debe abrir la consola y ubicarse en la carpeta destino (En este específico caso se pondrá el repositorio en la carpeta wamp en la ruta "C:\wamp\www"), luego se debe ejecutar los siguientes comandos:
```
git init
git clone https://github.com/dplnares/mhs.git
```
Estos comandos si se ejecutan por primera vez en un equipo, debe primero configurar el usuario, para eso es necesario:
```
git config --global user.name "John Doe"
git config --global user.email johndoe@example.com
```
