# Guía de Instalación

### Requisitos

1. **Instalar XAMPP con PHP 8.2**  
   - [Descargar XAMPP](https://sourceforge.net/projects/xampp/)
   - Agregar la carpeta de PHP que descargó XAMPP como variable de entorno.

2. **Instalar Composer (Versión más reciente)**  
   - [Descargar Composer](https://getcomposer.org/download/)

3. **Instalar 7zip**  
   - [Descargar 7zip](https://www.7-zip.org/)

### Pasos de Instalación

1. Abrir CMD y dirigirse a la carpeta `htdocs` de XAMPP.
2. Clonar el repositorio con el siguiente comando:
   ```bash
   git clone https://github.com/ignaciomercado4/olimpiadas.git
3. Entrar a la carpeta que se acaba de crear (olimpiadas-master) y ejecutar los siguientes comandos:
    ```composer i```
    ```php artisan cache:clear```
    ```php artisan config:clear```
    ```php artisan config:cache```

# Correr el proyecto
1. Correr los sig. comandos en la raíz del proyecto:
   ```php artisan serve```
   
