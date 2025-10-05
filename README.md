# Productos en Amazon - Symfony

Una aplicación web completa desarrollada con Symfony 7.3 que muestra productos de Amazon con sistema de autenticación robusto y arquitectura empresarial.

### **Arquitectura Symfony Completa**
- **Framework**: Symfony 7.3 (última versión estable)
- **ORM**: Doctrine para gestión de base de datos
- **Templating**: Twig para las vistas 
- **Security**: Componente Security de Symfony para autenticación
- **Console**: Comandos personalizados para gestión de datos (CreateUser, ImportProducts)

## **Arquitectura del Proyecto**
```
symfony-amazon/
├── config/                 # Configuraciones Symfony
│   ├── packages/          # Configuración de bundles
│   └── services.yaml      # Inyección de dependencias  
├── src/
│   ├── Command/           # Comandos de consola
│   │   ├── CreateUserCommand.php
│   │   └── ImportProductsCommand.php
│   ├── Controller/        # Controladores MVC
│   │   ├── ProductController.php
│   │   └── SecurityController.php
│   ├── Entity/           # Entidades Doctrine
│   │   ├── Product.php
│   │   └── User.php
│   ├── Repository/       # Repositorios de datos
│   └── Security/         # Autenticadores personalizados
├── templates/            # Plantillas Twig
│   ├── base.html.twig
│   ├── product/
│   └── security/
├── migrations/          # Migraciones de base de datos
└── var/               # Datos, Cache y logs
```
## **Flujo de Datos**
### Importación de Productos
```
JSON File → ImportProductsCommand → Doctrine Entity → Database
```
### Autenticación de Usuario
```  
Login Form → SecurityController → UserProvider → Database → Session
```
### Visualización de Productos
```
Database → ProductRepository → ProductController → Twig Template → HTML
```
## **Endpoints Disponibles**
### Web Routes
- `GET /` - Página principal de productos (requiere autenticación)
- `GET /login` - Formulario de login
- `POST /login` - Procesar login
- `GET /logout` - Cerrar sesión
### API Routes  
- `GET /api/products` - Lista de productos en formato JSON (requiere autenticación)

### **Sistema de Autenticación**
- **Usuario de prueba**: `cliente@example.com` / `amazon123`
- Autenticación basada en entidades Doctrine
- Hash de contraseñas con componente PasswordHasher
- Protección CSRF integrada
- Redirecciones automáticas después de login/logout
- Acceso controlado por roles (ROLE_USER)

### **Gestión de Productos**
- **Entidad Product**: Mapeo completo ORM con Doctrine
- **Repositorios**: Consultas optimizadas para productos
- **Comandos Console**: Importación automatizada desde JSON
- **API REST**: Endpoints JSON para integración futura
- **Ratings Dinámicos**: Sistema de puntuaciones aleatorias persistentes

### **Frontend**
- **Twig Templates**: Vistas modulares y reutilizables
- **CSS Responsive**: Diseño adaptativo mobile-first
- **JavaScript Vanilla**: Funcionalidad de acordeón sin dependencias
- **Asset Mapper**: Gestión optimizada de recursos estáticos

## **Instalación**

### Prerrequisitos
```bash
# PHP 8.2+ con extensiones
php --version  # >= 8.2
composer --version

# Extensiones PHP requeridas
php -m | grep -E "(pdo_sqlite|intl|ctype|iconv)"
```

### Descarga
```bash
# Clonar repositorio
git clone https://github.com/carjosdan/demo-amazon.git
cd demo-amazon
```
## **Comandos Disponibles**

### Gestión de Usuarios
```bash
# Crear usuarios de prueba
php bin/console app:create-user
```
### Gestión de Productos
```bash
# Importar productos desde JSON
php bin/console app:import-products [archivo.json]
```
# Resumen de puesta en marcha de desarrollo
```bash
git clone https://github.com/carjosdan/demo-amazon.git
composer install
php bin/console doctrine:database:create
php bin/console make:migration
php bin/console doctrine:migrations:migrate
php bin/console app:create-user
php bin/console app:import-products [archivo_de_articulos.json]
```
## INICIAR SERVIDOR 
```bash
php -S localhost:[numero_puerto] -t public/
```
--------------------------------------------------------------------
--------------------------------------------------------------------
**Desarrollado con**: Symfony 7.3, PHP 8.3, Doctrine ORM, Twig 3.21     
**Desarrollado por**: Daniel Pérez    
**Fecha**: Octubre 2025  
**Versión**: 1.0.0 (Symfony Edition)    
--------------------------------------------------------------------
--------------------------------------------------------------------