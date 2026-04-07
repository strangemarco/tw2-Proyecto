# App EF - Sistema de Gestión de Categorías y Usuarios

Una aplicación web desarrollada con CakePHP 5.x para la gestión de categorías y usuarios con sistema de autenticación.

## 🚀 Características Principales

### Gestión de Usuarios
- **Registro de usuarios**: Formulario de registro con validación
- **Sistema de login**: Autenticación segura con redirección
- **Gestión de sesiones**: Control de acceso a áreas privadas
- **Perfiles de usuario**: Visualización y edición de datos personales

### Gestión de Categorías
- **CRUD completo**: Crear, leer, actualizar y eliminar categorías
- **Paginación**: Listados paginados para mejor rendimiento
- **Validación de datos**: Validación en servidor y cliente
- **Estados activos/inactivos**: Control de visibilidad de categorías
- **Búsqueda y filtrado**: Herramientas de búsqueda integradas

### Características Técnicas
- **Framework**: CakePHP 5.3.0
- **PHP**: Versión 8.2 o superior
- **Base de datos**: MySQL
- **Autenticación**: CakePHP Authentication Plugin
- **Autorización**: CakePHP Authorization Plugin
- **Migraciones**: CakePHP Migrations Plugin
- **CSS Framework**: Milligram (minimalista)
- **Detección móvil**: Mobile Detect Library

## 📋 Requisitos del Sistema

- PHP >= 8.2
- MySQL/MariaDB
- Composer (gestor de dependencias)
- Servidor web (Apache/Nginx)

## 🛠️ Instalación

### 1. Clonar el proyecto
```bash
git clone <repository-url>
cd app_ef
```

### 2. Instalar dependencias
```bash
composer install
```

### 3. Configurar base de datos
1. Crear la base de datos:
```sql
CREATE DATABASE app_ef;
```

2. Configurar las credenciales en `config/app_local.php`:
```php
'Datasources' => [
    'default' => [
        'host' => 'localhost',
        'username' => 'root',
        'password' => '123456',
        'database' => 'app_ef',
        'driver' => 'mysql',
    ],
],
```

### 4. Ejecutar migraciones
```bash
bin/cake migrations migrate
```

### 5. Insertar datos de ejemplo (opcional)
```bash
php insert_categorias.php
```

### 6. Iniciar el servidor de desarrollo
```bash
bin/cake server -p 8765
```

Visita `http://localhost:8765` para ver la aplicación.

## 📁 Estructura del Proyecto

```
app_ef/
├── bin/                    # Scripts y CLI
├── config/                 # Archivos de configuración
│   ├── app.php            # Configuración principal
│   ├── app_local.php      # Configuración local (no versionar)
│   └── ...
├── src/                   # Código fuente de la aplicación
│   ├── Controller/        # Controladores
│   │   ├── AppController.php
│   │   ├── UsersController.php
│   │   ├── CategoriasController.php
│   │   └── ...
│   ├── Model/             # Modelos y entidades
│   │   ├── Entity/
│   │   └── Table/
│   ├── Middleware/        # Middleware
│   └── View/              # Clases de vista
├── templates/             # Plantillas Twig
│   ├── layout/           # Layouts principales
│   ├── Users/            # Vistas de usuarios
│   ├── Categorias/       # Vistas de categorías
│   └── ...
├── webroot/              # Archivos públicos
│   ├── css/             # Hojas de estilo
│   ├── js/              # Archivos JavaScript
│   └── img/             # Imágenes
├── tests/               # Pruebas unitarias
├── tmp/                 # Archivos temporales
└── vendor/              # Dependencias de Composer
```

## 🔧 Configuración

### Variables de Entorno
Crea un archivo `.env` en la raíz del proyecto:
```env
DEBUG=true
DATABASE_URL=mysql://root:123456@localhost/app_ef
```

### Configuración de Correo (opcional)
Para funcionalidad de recuperación de contraseña, configura en `app_local.php`:
```php
'EmailTransport' => [
    'default' => [
        'host' => 'smtp.gmail.com',
        'port' => 587,
        'username' => 'tu-email@gmail.com',
        'password' => 'tu-app-password',
        'className' => 'Smtp',
        'tls' => true,
    ],
],
```

## 📚 Uso de la Aplicación

### Registro de Usuarios
1. Accede a `/users/add`
2. Completa el formulario de registro
3. Recibirás confirmación de registro exitoso

### Inicio de Sesión
1. Visita `/users/login`
2. Ingresa tus credenciales
3. Serás redirigido al panel principal

### Gestión de Categorías
- **Ver todas**: `/categorias` (requiere autenticación)
- **Agregar nueva**: `/categorias/add`
- **Editar**: `/categorias/edit/{id}`
- **Ver detalles**: `/categorias/view/{id}`
- **Eliminar**: `/categorias/delete/{id}`

## 🧪 Pruebas

### Ejecutar todas las pruebas
```bash
composer test
```

### Ejecutar pruebas específicas
```bash
bin/cake test tests/TestCase/Controller/UsersControllerTest.php
```

### Análisis de código
```bash
# Verificar estándares de codificación
composer cs-check

# Corregir automáticamente
composer cs-fix

# Análisis estático con PHPStan
vendor/bin/phpstan analyse src/
```

## 🚀 Despliegue

### Producción
1. Configura `DEBUG=false` en tu entorno
2. Asegura que `tmp/` y `logs/` sean escribibles por el servidor web
3. Configura correctamente las credenciales de base de datos
4. Ejecuta migraciones en producción
5. Configura tu servidor web para apuntar a `webroot/`

### Apache Configuration
```apache
<VirtualHost *:80>
    ServerName tu-dominio.com
    DocumentRoot /ruta/a/app_ef/webroot
    
    <Directory /ruta/a/app_ef/webroot>
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

### Nginx Configuration
```nginx
server {
    listen 80;
    server_name tu-dominio.com;
    root /ruta/a/app_ef/webroot;
    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$args;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
```

## 🤝 Contribución

1. Fork del proyecto
2. Crear una rama para tu feature (`git checkout -b feature/nueva-funcionalidad`)
3. Commit de tus cambios (`git commit -am 'Añadir nueva funcionalidad'`)
4. Push a la rama (`git push origin feature/nueva-funcionalidad`)
5. Crear un Pull Request

## 📝 Scripts Útiles

### Insertar Categorías de Ejemplo
El archivo `insert_categorias.php` permite poblar la base de datos con categorías predefinidas:
```bash
php insert_categorias.php
```

### Limpiar Cache
```bash
bin/cake cache clear_all
```

### Generar Bake (CRUD)
```bash
bin/cake bake all NombreModelo
```

## 🔐 Seguridad

- Las contraseñas se hashean automáticamente
- Protección CSRF activa
- Validación de datos en servidor
- Escapes de HTML para prevenir XSS
- Consultas preparadas contra SQL Injection

## 📄 Licencia

Este proyecto está licenciado bajo la Licencia MIT.

## 🆘 Soporte

Si encuentras algún problema o tienes sugerencias:
1. Revisa la [documentación de CakePHP](https://book.cakephp.org/5/en/)
2. Busca issues existentes en el repositorio
3. Crea un nuevo issue con detalles del problema

## 🔄 Actualización

Para actualizar CakePHP y sus dependencias:
```bash
composer update
```

⚠️ **Nota**: Siempre revisa el CHANGELOG antes de actualizar para posibles cambios rupturantes.
