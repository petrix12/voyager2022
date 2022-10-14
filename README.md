<p align="center">
    <a href="https://github.com/petrix12" target="_blank">
        <img src="https://petrix12.github.io/cvpetrix2022/img/logo-completo-sm.png" width="400" alt="Laravel Logo">
    </a>
</p>

<p align="center">Proyecto desarrollado en Laravel</p>
<p align="center">
    <a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


# Aprende a construir tu propio CMS con Laravel Voyager
+ URL: https://codersfree.com/cursos/aprende-a-construir-tu-propio-cms-con-laravel-voyager
+ Intructor: Víctor Hernán Arana Flores


## Cración de repositorio en GitHub
1. Crear proyecto en la página de [GitHub](https://github.com) con el nombre: **voyager2022**.
    + **Description**: Proyecto para seguir el curso de "Aprende a construir tu propio CMS con Laravel Voyager", creado por Víctor Arana Flores en Coders Free.
    + **Public**.
2. En la ubicación raíz del proyecto en la terminal de la máquina local:
    + $ git init
    + $ git add .
    + $ git commit -m "Antes de iniciar"
    + $ git branch -M main
    + $ git remote add origin https://github.com/petrix12/voyager2022.git
    + $ git push -u origin main


## Introducción
### 1. Instalar Voyager
+ [Página oficial de Voyager](https://voyager.devdojo.com)
1. Crear proyecto:
    + $ laravel new voyager2022 --jet
    + Seleccionar: [0] livewire
    + Will your application use teams? (yes/no) [no]: no
2. Crear base de datos **voyager2022** en MySQL (Juego de carácteres: utf8_general_ci)
3. Instalar dependencias de Voyager:
    + $ composer require tcg/voyager
4. Verificar variables de entorno en **.env**:
    ```env
    ≡
    APP_URL=http://localhost
    DB_HOST=localhost
    DB_DATABASE=homestead
    DB_USERNAME=homestead
    DB_PASSWORD=secret
    ≡
    ```
    + Estos valores deben coincidir con las que corresponden a nuestro proyecto.
5. Instalar Voyager con registros de prueba:
    + $ php artisan voyager:install --with-dummy
    + Esta acción ejecutará las migraciones
    + **Nota**: en caso de no querer instalar Voyager con registros de prueba, ejecutar:
        + $ php artisan voyager:install
6. Configurar en **.env** lugar en donde se guardaran los archivos por defecto:
    ```env
    ≡
    FILESYSTEM_DISK=public
    ≡
    ```

### 2. Estructura de la bbdd creada por Voyager
### 3. Archivo de configuración de Voyager
1. Modificar la configuración de Voyager en **config\voyager.php**:
    ```php
    ≡
    'models' => [
        'namespace' => 'App\\Models\\',
    ],
    ≡
    ```
2. Para ingresar al panel administrativo:
    + Ir: [URL del proyecto]/admin
    + Credenciales por defecto:
        + User: admin@admin.com
        + Password: password
    + Al ingresar por primera vez al panel administrativo es recomendable cambiar la información de las credenciales en **Configuración (Profile)**.
3. Para configurar las tablas que no se desean mostrar en el panel administrativo, indicarlo en **config\voyager.php**:
    ```php
    ≡
    'database' => [
        'tables' => [
            'hidden' => ['migrations', 'data_rows', 'data_types', 'menu_items', 'password_resets', 'permission_role', 'personal_access_tokens', 'settings'],
        ],
        'autoload_migrations' => true,
    ],
    ≡
    ```
4. Para cambiar la configuración del menú emergente del usuario y los widgets en el panel administrativo, modificar en **config\voyager.php**:
    ```php
    ≡
    'database' => [
      'dashboard' => [
        // Add custom list items to navbar's dropdown
        'navbar_items' => [
            'voyager::generic.profile' => [
                'route'      => 'voyager.profile',
                'classes'    => 'class-full-of-rum',
                'icon_class' => 'voyager-person',
            ],
            'voyager::generic.home' => [
                'route'        => '/',
                'icon_class'   => 'voyager-home',
                'target_blank' => true,
            ],
            'voyager::generic.logout' => [
                'route'      => 'voyager.logout',
                'icon_class' => 'voyager-power',
            ],
        ],

        'widgets' => [
            'TCG\\Voyager\\Widgets\\UserDimmer',
            'TCG\\Voyager\\Widgets\\PostDimmer',
            'TCG\\Voyager\\Widgets\\PageDimmer',
        ],

    ],
    ≡
    ```


## Bread
### 4. Crear nueva tabla### 



    ```php
    ≡
    ```




### 5. Implementar nuevo Bread
### 6. Elegir el tipo de campo del formulario
### 7. Agregar relaciones
### 8. Tagging
### 9. Opciones avanzadas (relaciones)
### 10. Validaciones
### 11. Ordenar Items
### 12. Query Scopes



## Campos de formulario
13. Personalizar campos
14. Checkbox
15. Fechas
16. Select dropdown
17. Imagenes
18. Number
Menus
19. Crear y editar menús
20. Dar estilos a menus
Conceptos básicos
21. Enrutamiento
22. Settings
23. Compass
24. Roles y permisos
Personalizacion
25. Personalización de plantilla
26. JS y CSS adicional
27. Mostrar posts
28. Mostrar páginas
