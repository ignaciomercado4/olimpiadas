<h1>Guía de instalación<h1/>
Requisitos:
- Instalar el xampp con php 8.2 - https://sourceforge.net/projects/xampp/
- Agregar la carpeta de php que descargó xampp como variable de entorno
- Instalar composer (la versión mas reciente) - https://getcomposer.org/download/
- Instalar 7zip - https://www.7-zip.org/

Una vez instalado todo lo anterior, seguir los siguientes pasos:
- En CMD, dirigirse a la carpeta htdocs de xampp
- Clonar el repositorio con el siguiente comando:
  ```git clone https://github.com/ignaciomercado4/olimpiadas.git```
- Una vez clonado, entrar a la carpeta que se acaba de crear (olimpiadas-master), y correr los siguientes comandos en cmd:
```composer i```
```php artisan cache:clear```
```php artisan config:clear```
```php artisan config:cache```

<h1>Correr el proyecto<h1/>
- Para correr el proyecto, ejecutar el siguiente comando en la raíz del mismo:
    
```php artisan serve```
