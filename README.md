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
### 4. Crear nueva tabla
1. Crear una tabla con el panel administrativo de Voyager:
    + Ir: Tools -> Database -> Clic en Crear tabla
    + Nombre de la tabla: products
    + ¿Generar el modelo?: Sí, por favor
    + Campos:
        ```
        + Nombre: id            /   Tipo: INTEGER
        + Nombre: name          /   Tipo: VARCHAR
        + Nombre: description   /   Tipo: TEXT
        + Nombre: image_url     /   Tipo: VARCHAR
        + Nombre: order         /   Tipo: INTEGER   / Defecto: 1
        + Nombre: user_id       /   Tipo: INTEGER
        ```
    + Para añadir los campos **created_at** y **updated_at** presionar **Añadir Timestamps**.
    + Para añadir el campo **deleted_at** presionar **Añadir Soft Deletes**. (luego eliminar este campo)
    + Clic en **Crear tabla**.

### 5. Implementar nuevo Bread
1. Crear un CRUD con el panel administrativo de Voyager:
    + Ir: Tools -> Database -> al lado de la tabla **products** clic en **Añadir BREAD a esta tabla**.
    + Completar formulario:
        + Nombre para mostrar (Singular): Producto
        + Nombre para mostrar (Plural): Productos
        + Slug (debe ser único): products
        + Ícono (opcional) Use una clase de Voyager Fonts: voyager-ticket
        + Generar permisos: Si
        + Clic a **Enviar**.

### 6. Elegir el tipo de campo del formulario
1. Modificar Formularios para el products con el panel administrativo de Voyager:
    + Ir: Tools -> Database -> clic en el botón **Editar** correspondiente a **products**.
    + En **Editar las filas de la tabla siguiente** realizar las adaptaciones.
    + ![Imagen campos products 1](/00recursos/img/product1.png)
    + ![Imagen campos products 2](/00recursos/img/product2.png)
    + ![Imagen campos products 3](/00recursos/img/product3.png)

### 7. Agregar relaciones
1. Crear relaciones para el products con el panel administrativo de Voyager:
    + Ir: Tools -> Database -> clic en el botón **Editar** correspondiente a **products**.
    + Presionar el botón **Crear una relación**.
    + Establecer relación products-users (n:1)
        + Product: BelongsTo    /   User    /   App\Models\User
        + ¿Qué columna de Product se usará para hacer referencia a User?: user_id
        + Mostrar de User: name
        + Guardar de User: id
    + Clic en **Crear relación**.
    + ![Relación products-users](/00recursos/img/relacion_products.png)

### 8. Tagging
1. Crear tabla **tags** con modelo en Voyager, con los campos:
    ```
    + Nombre: id            /   Tipo: INTEGER
    + Nombre: name          /   Tipo: VARCHAR
    ```
    + Añadir los campos **created_at** y **updated_at** presionar **Añadir Timestamps**.
2. Crear un CRUD para la tabla **tags** con el panel administrativo de Voyager.
    + ![Tags](/00recursos/img/tags.png)
3. Crear dos registros en **tags**:
    + name: Programación
    + name: Diseño
4. Crear tabla intermedia **product_tag** con modelo en Voyager, con los campos:
    ```
    + Nombre: id            /   Tipo: INTEGER
    + Nombre: product_id    /   Tipo: INTEGER
    + Nombre: tag_id        /   Tipo: INTEGER
    ```
    + Añadir los campos **created_at** y **updated_at** presionar **Añadir Timestamps**.
5. Crear relación muchos a muchos (products-tags) con el panel administrativo de Voyager:
    + Ir: Tools -> BREAD -> clic en el botón **Editar** correspondiente a **products**.
    + Presionar el botón **Crear una relación**.
    + Establecer relación products-tags (n:m)
        + Product: BelongsToMany    /   Tag    /   App\Models\Tag
        + Tabla Pivote: Product_tag
        + Mostrar de Tag: name
        + Guardar de Tag:: id
        + Permitir Tagging: Si
    + Clic en **Crear relación**.

### 9. Opciones avanzadas (relaciones)
1. En caso de no seguir las convenciones de Laravel en el nombre de las claves foraneas al crear las relaciones, se deberá dar clic en **Abrir detalle de relación**:
    ```json
    {
        "foreign_pivot_key": "product_id",
        "related_pivot_key": "tag_id",
        "parent_key": "id",
        "sort": {
            "field": "name",
            "direction": "asc"
        }
    }
    ```
    + **Nota 1**: en nuestro caso todo seguirá funcionando igual porque estamos siguiendo las convenciones de Laravel.
    + **Nota 2**: la última instrucción es para indicar que ordene la relación en orden alfabético.

### 10. Validaciones
1. Para establecer validaciones a la tabla **products**:
    + ![Validación de products](/00recursos/img/validation_products.png)
    + Ejemplos de validación:
        + Mensaje:
            ```json
            {
                "validation": {
                    "rule": "required",
                    "messages": {
                        "required": "El nombre es requerido"
                    }
                }
            }
            ```
        + Reglas diferentes al editar y crear:
            ```json
            {
                "validation": {
                    "rule": "required",
                    "add": {
                        "rule": "min:10"
                    },
                    "edit": {
                        "rule": "min:20"
                    }
                }
            }
            ```

### 11. Ordenar Items
1. Modificar orden de **categories** en el panel administrativo de Voyager:
    + Ir: Tools -> BREAD -> clic en el botón **Editar** correspondiente a **categories**.
    + Rellenar formulario:
        + Columna de ordenación: order
        + Columna texto de ordenación: name
        + Sentido de ordenación: ascendente

### 12. Query Scopes
1. Modificar el modelo **Product** (app\Models\Product.php) para programar un **Query Scopes**:
    ```php
    ≡
    class Product extends Model
    {
        public function scopeCurrentUser($query){
            $query->where('user_id', auth()->user()->id);
        }
    }
    ≡
    ```
2. Aplicar filtro (Query Scope anterior) en **products** en el panel administrativo de Voyager:
    + Ir: Tools -> BREAD -> clic en el botón **Editar** correspondiente a **products**.
    + Rellenar formulario:
        + Alcance: currentUser

## Campos de formulario
### 13. Personalizar campos
1. Añadir campo **slug** (VARCHAR) a la tabla **products**, luego ir el **BREAD** de **products** y colocar el nuevo campo debajo de **nombre**, y marcar solamente **Editar** y **Añadir**.
2. En **Detalles opcionales** del campo **slug** de la tabla **products**:
    ```json
    {
        "slugify": {
            "origin": "name",
            "forceUpdate": true
        },
        "display": {
            "width": 6
        }
    }
    ```
3. Agregar varias propiedades al campo **name** de la tabla **products** en el panel administrativo de Voyager:
    ```json
    {
        "validation": {
            "rule": "required"
        },
        "description": "Por favor, su nombre",
        "display": {
            "width": 6
        },
        "default": "Este es un valor por defecto"
    }
    ```

### 14. Checkbox
1. Crear controlador para el modelo **Product**:
    + $ php artisan make:controller Voyager\ProductController
2. Programar el controlador **Product** (app\Http\Controllers\Voyager\ProductController.php):
    ```php
    <?php

    namespace App\Http\Controllers\Voyager;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use TCG\Voyager\Http\Controllers\VoyagerBaseController;

    class ProductController extends VoyagerBaseController
    {
        /* public function store(Request $request){
            return $request->all();
        } */
    }
    ```
    + **NOTA**: lo importante aquí es que se invocó al controlador de Voyager y luego se extendio, y a partir de aquí podremos sobreescribir los métodos que necesitemos.
3. En el panel administrativo de Voyager, en Tools -> BREAD -> Editar products, modificar:
    + Nombre del Controlador: \App\Http\Controllers\Voyager\ProductController
4. Añadir campo **active** (Tipo: TINYINT, Longitud: 1) a la tabla **products**, luego ir el **BREAD** de **products** y colocar el nuevo campo de último, y en tipo de entrada seleccionar **Checkbox**. En **Detalles opcionales**:
    ```json
    {
        "on": "Activo",
        "off": "Inactivo",
        "checked": true
    }
    ```
5. Para hacer pruebas, en el campo anterior, cambiar el tipo de entrada seleccionar **Multiple Checkbox**. En **Detalles opcionales**:
    ```json
    {
        "on": "Activo",
        "off": "Inactivo",
        "checked": true
    }
    ```
    + Luego regresar a los valores anteriores.
6. Para hacer pruebas, en el campo anterior, cambiar el tipo de entrada seleccionar **Radio Button**. En **Detalles opcionales**:
    ```json
    {
        "options": {
            "0": "Activo",
            "1": "Inactivo"
        },
        "default": "1"
    }
    ```
    + Luego regresar a los valores anteriores.

### 15. Fechas
1. Para cambiar el formato de fechas, en **Detalles opcionales**:
    ```json
    {
        "format": "%d-%m-%Y"
    }
    ```

### 16. Select dropdown
1. Para hacer pruebas, en el campo **active** de la table **products**, cambiar el tipo de entrada seleccionar **Select Dropdown**. En **Detalles opcionales**:
    ```json
    {
        "options": {
            "0": "Activo",
            "1": "Inactivo"
        },
        "default": "1"
    }
    ```
    + **Nota**: para seleccionar varios valores, cambiar el tipo de entrada seleccionar **Select Multiple**
    + Luego regresar a los valores anteriores.

### 17. Imagenes
1. Ejemplos de reglas para el campo **image_url** de la tabla **products**:
    ```json
    {
        "resize": {
            "width": "1000",
            "height": null
        },
        "upsize": true,
        "quality": "70%",
        "thumbnails": [
            {
                "name": "medium",
                "scale": "50%"
            },
            {
                "name": "small",
                "scale": "25%"
            },
            {
                "name": "cropped",
                "crop": {
                    "width": "150",
                    "height": "150"
                }
            }
        ],
        "validation": {
            "add": {
                "rule": "required"
            }
        }
    }
    ```

### 18. Number
1. Ejemplos de reglas para el campos numéricos (Tipo de entrada: Number):
    ```json
    {
        "step": 0.01,
        "min": 1,
        "max": 100,
        "default": 1
    }
    ```

## Menús
### 19. Crear y editar menús
1. Para personilzar menú desde el panel de administración de Voyager:
    + Ir a Tools -> Menu Builder -> Clic en el botón **Constructor**.
2. Crear menú **main** desde el panel de administración de Voyager.
3. Crear ruta **Home**, en el menú **main** precionar en **Constructor**:
    + Clic **Nueva opción de menú**:
        + Título de la opción de menú: Home
        + Tipo de enlace: Ruta dinámica
        + Ruta para la opción de menú: welcome
        + Ícono para la opción de menú (Use una Voyager Font Class): voyager-watch
        + Abrir en: Misma pestaña/ventana
4. Crear ruta **Posts**, en el menú **main** precionar en **Constructor**:
    + Clic **Nueva opción de menú**:
        + Título de la opción de menú: Posts
        + Tipo de enlace: Ruta dinámica
        + Ruta para la opción de menú: posts.index
        + Abrir en: Misma pestaña/ventana
5. Crear ruta **Nosotros**, en el menú **main** precionar en **Constructor**:
    + Clic **Nueva opción de menú**:
        + Título de la opción de menú: Nosotros
        + Tipo de enlace: Ruta dinámica
        + Ruta para la opción de menú: about
        + Abrir en: Misma pestaña/ventana
6. Crear ruta **Políticas y privacidad**, en el menú **main** precionar en **Constructor**:
    + Clic **Nueva opción de menú**:
        + Título de la opción de menú: Políticas y privacidad
        + Tipo de enlace: Ruta dinámica
        + Ruta para la opción de menú: policy
        + Abrir en: Misma pestaña/ventana
7. Modificar vista **resources\views\welcome.blade.php**:
    ```php
    <x-app-layout>
        
    </x-app-layout>
    ```
8. Modificar layout **resources\views\layouts\app.blade.php**:
    ```php
    ≡
    <body class="font-sans antialiased">
        ≡
        <div class="min-h-screen bg-gray-100">
            {{-- @livewire('navigation-menu') --}}
            {{ menu('main') }}
            ≡
        </div>
        ≡
    </body>
    ≡
    ```
9.  Modificar rutas en **routes\web.php**:
    ```php
    <?php

    use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */

    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

    Route::get('/posts', function () {
    })->name('posts.index');

    Route::get('/posts/{post}', function () {
    })->name('posts.show');

    Route::get('/about', function () {
    })->name('about');

    Route::get('/policy', function () {
    })->name('policy');

    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified'
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });


    Route::group(['prefix' => 'admin'], function () {
        Voyager::routes();
    });
    ```

### 20. Dar estilos a menus
+ Ejemplos de menú: https://flowbite.com/docs/components/navbar
1. Ejecutar el servidor de **vite**:
    + $ npm run dev
2. Crear vista **resources\views\my-menu.blade.php**:
    ```php
    <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-900" x-data="{ open: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap justify-between items-center">
                <a href="#" class="flex items-center">
                    <img src="https://flowbite.com/docs/images/logo.svg" class="mr-3 h-6 sm:h-10" alt="Flowbite Logo">
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
                </a>
                <button @click="open = !open" type="button"
                    class="inline-flex justify-center items-center ml-3 text-gray-400 rounded-lg md:hidden hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-300 dark:text-gray-400 dark:hover:text-white dark:focus:ring-gray-500"
                    aria-controls="mobile-menu-2" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div :class="{ 'hidden': !open }" class="hidden w-full md:block md:w-auto" id="mobile-menu">
                    <ul
                        class="flex flex-col p-4 mt-4 bg-gray-50 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        @foreach($items as $item)
                            @if ($item->children->count())
                                <li class="relative" x-data="{ open: false }">
                                    <button @click="open = !open"
                                        class="flex justify-between items-center py-2 pr-4 pl-3 w-full font-medium text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-gray-400 dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                                        {{ $item->title }}
                                        <svg class="ml-1 w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg></button>
                                    <!-- Dropdown menu -->
                                    <div
                                        :class="{ 'hidden': !open }"
                                        class="hidden absolute top-8 z-10 w-44 font-normal bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                                            @foreach($item->children as $child)
                                                <li>
                                                    <a href="{{ $child->link() }}"
                                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                        {{ $child->title }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                            @else
                                <li>
                                    <x-nav-link :href="$item->link()" :active="request()->routeIs($item->route)">
                                        {{ $item->title }}
                                    </x-nav-link>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    ```
3. Modificar layout **resources\views\layouts\app.blade.php**:
    ```php
    ≡
    <div class="min-h-screen bg-gray-100">
        {{-- @livewire('navigation-menu') --}}
        {{ menu('main', 'my-menu') }}
        ≡
    </div>
    ≡
    ```
4. Crear componente **resources\views\components\nav-link.blade.php**:
    ```php
    @props(['active' => false])

    @php
        $classes = $active
            ? 'block py-2 pr-4 pl-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-white dark:bg-blue-600 md:dark:bg-transparent'
            : 'block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent';
    @endphp

    <a {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
    ```


## Conceptos básicos
### 21. Enrutamiento
1. Para cambiar el nombre de la ruta **admin** modificar el archivo de rutas **routes\web.php**:
    ```php
    Route::group(['prefix' => 'admin'], function () {
        Voyager::routes();
    });
    ```

### 22. Settings
1. Para personalizar el panel administrativo ir a **Settings**.
2. Modificar vista **resources\views\welcome.blade.php**:
    ```php
    <x-app-layout>
        <h1 class="text-2xl font-semibold text-center">{{ setting('site.title') }}</h1>
    </x-app-layout>
    ```
3. Modificar menú **resources\views\my-menu.blade.php**:
    ```php
    <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-900" x-data="{ open: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap justify-between items-center">
                <a href="/" class="flex items-center">
                    <img src="{{ Voyager::image(setting('site.logo')) }}" class="mr-3 h-6 sm:h-10" alt="Flowbite Logo">
                </a>
                ≡
            </div>
        </div>
    </nav>
    ```

### 23. Compass
### 24. Roles y permisos


## Personalización
### 25. Personalización de plantilla
1. Para personalizar la vista **products** crear **resources\views\vendor\voyager\products\browse.blade.php**:
    + En caso de querer modificar por completo:
    ```php
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <h1>Vista personalizada products</h1>
    </body>
    </html>
    ```
    + En caso de solo querer anexar información:
    ```php
    @extends('voyager::bread.browse')

    @section('content')
        @parent
        <p>Aquí se podrá anexar información</p>
    @endsection
    ```
    + En caso de rediseñar la plantilla:
    ```php
    @extends('voyager::bread.browse')

    @section('content')
        <div class="page-content browse container-fluid">
            @include('voyager::alerts')
            <div class="row">
                ≡
                CÓDIGO EXTRAIDO DE vendor\tcg\voyager\resources\views\bread\browse.blade.php
                ≡
            </div>
        </div>

        {{-- Single delete modal --}}
        <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"
                            aria-label="{{ __('voyager::generic.close') }}"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="voyager-trash"></i> {{ __('voyager::generic.delete_question') }}
                            {{ strtolower($dataType->getTranslatedAttribute('display_name_singular')) }}?</h4>
                    </div>
                    <div class="modal-footer">
                        <form action="#" id="delete_form" method="POST">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-danger pull-right delete-confirm"
                                value="{{ __('voyager::generic.delete_confirm') }}">
                        </form>
                        <button type="button" class="btn btn-default pull-right"
                            data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    @endsection
    ```
    + **Nota**: el nombre de la ruta y del archivo no deben alterarse para que Voyager lo reconozca.
    + **Ubicación de las plantillas de Voyager por defecto**: vendor\tcg\voyager\resources\views\bread

### 26. JS y CSS adicional
1. Crear **public\css\custom.css**:
    ```css
    /* Escribir código css */
    p {
        color: blue;
    }
    ```
2. Crear **public\js\custom.js**:
    ```js
    /* Escribir código js */
    alert('Probando.....')
    ```
3. Para incluir los archivos anteriores en Voyager, modificar **config\voyager.php**:
    ```php
    ≡
    // Here you can specify additional assets you would like to be included in the master.blade
    'additional_css' => [
        'css/custom.css',
    ],

    'additional_js' => [
        'js/custom.js',
    ],
    ≡
    ```

### 27. Mostrar posts
1. Eliminar del menú **Posts** en **Tablero  -> Menus  -> Builder -> main**.
2. Modificar archivo de rutas **routes\web.php**:
    ```php
    ≡
    use App\Http\Controllers\PostController;
    use Illuminate\Support\Facades\Route;
    ≡
    Route::get('/', [PostController::class, 'index'])->name('welcome');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::get('/about', function () {
    })->name('about');

    Route::get('/policy', function () {
    })->name('policy');
    ≡
    ```
3. Crear controlador para **Post**:
    + $ php artisan make:controller PostController
4. Programar controlador **app\Http\Controllers\PostController.php**:
    ```php
    ≡
    use Illuminate\Http\Request;
    use TCG\Voyager\Models\Post;

    class PostController extends Controller
    {
        public function index(){
            $posts = Post::paginate();
            return view('welcome', compact('posts'));
        }

        public function show(Post $post){
            return view('posts.show', compact('post'));
        }
    }
    ```
5. Rediseñar vista **resources\views\welcome.blade.php**:
    ```php
    <x-app-layout>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <h1 class="text-2xl font-semibold text-center mb-8">{{ setting('site.title') }}</h1>
            <ul class="space-y-8">
                @foreach ($posts as $post)
                    <li>
                        <article>
                            <h2 class="text 2xl font-semibold">
                                <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                            </h2>
                            <figure>
                                <img src="{{ Voyager::image($post->image) }}" alt="{{ $post->title }}" class="aspect-[3/1] object-cover">
                            </figure>
                            <p>{{ $post->excerpt }}</p>
                        </article>
                    </li>
                @endforeach
            </ul>
            {{ $posts->links() }}
        </div>
    </x-app-layout>
    ```
6. Crear vista **resources\views\posts\show.blade.php**:
    ```php
    <x-app-layout :title="$post->seo_title">
        @push('meta')
            <meta name="description" content="{{ $post->meta_description }}">
        @endpush
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <h1 class="text-2xl font-semibold mb-4">{{ $post->title }}</h1>
            <p>{{ $post->excerpt }}</p>
            <figure class="mb-4">
                <img src="{{ Voyager::image($post->image) }}" alt="{{ $post->title }}" class="aspect-[3/1] object-cover">
            </figure>
            <div>
                {!! $post->body !!}
            </div>
        </div>
    </x-app-layout>
    ```
7. Modificar layout **resources\views\layouts\app.blade.php**:
    ```php
    @props(['title' => config('app.name', 'Laravel')])
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            ≡
            @stack('meta')
            <title>{{ $title }}</title>
            ≡
        </head>
        <body class="font-sans antialiased">
            ≡
        </body>
    </html>
    ```

### 28. Mostrar páginas
1. Crear página con Voyager:
    + Ir al panel administrativo de Voyager.
    + Ir a **Pages**.
    + Presionar **Crear**:
        + Title: Nosotros
        + Slug: about
        + Status: ACTIVE
        + Meta Keywords: Pruebas
        + Rellenar los otros campos con cualquier valor.
    + Crear otra página con valores de prueba y en **Slug** colocar **policy**.
2. Crear controlador para **Page**:
    + $ php artisan make:controller PageController
3. Modificar archivo de rutas **routes\web.php**:
    ```php
    ≡
    use App\Http\Controllers\PageController;
    use App\Http\Controllers\PostController;
    use Illuminate\Support\Facades\Route;
    ≡
    Route::get('/about', [PageController::class, 'about'])->name('about');
    Route::get('/policy', [PageController::class, 'policy'])->name('policy');
    ≡
    ```
4. Programar controlador **app\Http\Controllers\PageController.php**:
    ```php
    <?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use TCG\Voyager\Models\Page;

    class PageController extends Controller
    {
        public function about(){
            $page = Page::where('slug', 'about')->firstOrFail();
            return view('pages.about', compact('page'));
        }

        public function policy(){
            $page = Page::where('slug', 'policy')->firstOrFail();
            return view('pages.policy', compact('page'));
        }
    }
    ```
5. Crear vista **resources\views\pages\about.blade.php**:
    ```php
    <x-app-layout>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <h1 class="text-4xl font-semibold text-center mb-4">{{ $page->title }}</h1>
            <div class="mb-4">
                {!! $page->body !!}
            </div>
            @if($page->image)
                <figure>
                    <img src="{{ Voyager::image($page->image) }}" alt="{{ $page->title }}" class="aspect-[4/3] object-cover">
                </figure>
            @endif>
        </div>
    </x-app-layout>
    ```
6. Crear vista **resources\views\pages\policy.blade.php**:
    ```php
    <x-app-layout>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <h1 class="text-4xl font-semibold text-center mb-4">{{ $page->title }}</h1>
            <div class="mb-4">
                {!! $page->body !!}
            </div>
            @if($page->image)
                <figure>
                    <img src="{{ Voyager::image($page->image) }}" alt="{{ $page->title }}" class="aspect-[4/3] object-cover">
                </figure>
            @endif
        </div>
    </x-app-layout>
    ```
