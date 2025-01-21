# :computer: Empresa de tecnología. :shopping_cart: Gestión de Inventarios y Pedidos

## 1. :question: Descripción del problema

En una empresa de tecnología que se dedica a la venta de hardware y periféricos, surge la necesidad de gestionar los pedidos y el inventario de productos de manera eficiente. El sistema debe permitir el control de las categorías de productos, mantener actualizados los registros de inventario y procesar los pedidos realizados por los clientes.

El cliente ha solicitado una solución que permita:
•	Registrar y clasificar productos en distintas categorías.
•	Gestionar el stock de cada producto en el inventario.
•	Llevar un registro de los pedidos realizados por los clientes, incluyendo detalles como cantidades y precios.

Este proyecto busca cubrir estas necesidades mediante el desarrollo de una aplicación en **Laravel** que implemente un modelo relacional para gestionar las tablas y relaciones necesarias. Esta solución será útil no solo para la empresa, sino también como base para otros proyectos educativos en gestión de bases de datos y aplicaciones empresariales.

## 2. :dna: Modelo E-R

A continuación, se presenta el diagrama Entidad-Relación que representa las tablas y relaciones implementadas en el proyecto. Este diagrama incluye todas las claves primarias (PK), claves foráneas (FK) y las cardinalidades correspondientes:

![Modelo E-R](/modelo.jpg)

---

## :clipboard: Detalles del Proyecto

Este proyecto se ha desarrollado utilizando **Laravel** como framework backend y **MariaDB** como sistema de gestión de base de datos. A continuación, se describen los componentes principales y cómo contribuyen al funcionamiento del sistema:

### 1. :card_index_dividers: Modelos
Los modelos son una representación de las tablas de la base de datos. Cada modelo utiliza **Eloquent ORM**, lo que simplifica las operaciones CRUD y las relaciones entre las tablas.

**Modelos utilizados en el proyecto:**

- **Cliente**: Representa a los clientes registrados en el sistema. *Relación*: Un cliente puede tener múltiples pedidos.
- **Pedido**: Gestiona los pedidos realizados por los clientes. *Relación*: Cada pedido pertenece a un cliente y puede tener múltiples detalles asociados a los productos.
- **Producto**: Define los productos disponibles para la venta. *Relación*: Cada producto pertenece a una categoría, un registro en el inventario y se asocian a detalles de pedidos.
- **Categoría**: Clasifica los productos en distintas categorías. *Relación*: Cada categoría tiene múltiples productos asociados.
- **Inventario**: Gestiona el stock de cada producto. *Relación*: Cada registro en el inventario está asociado a un producto.
- **DetallePedido**: Representa los detalles de cada pedido (productos incluidos, cantidad y precio). *Relación*: Relaciona cada pedido con los productos incluidos en él.
Las relaciones entre los modelos están implementadas en sus respectivas clases, siguiendo el esquema del modelo E-R.

### 2. :package: Migraciones
Las migraciones se utilizan para definir la estructura de las tablas y sus relaciones en la base de datos. Cada migración incluye las claves **primarias** y **foráneas** necesarias para mantener la integridad referencial.

El orden de ejecución de las migraciones es importante debido a las dependencias entre tablas.

- **Categorias**: No depende de ninguna otra tabla, por lo que puede crearse primero. 
- **Clientes**: No depende de otras tablas. 
- **Productos**: Depende de la tabla categorias debido a la clave foránea que relaciona los productos con las categorías.
- **Pedidos**: Depende de la tabla clientes, ya que cada pedido está asociado a un cliente.
- **Inventario**: Depende de la tabla productos, ya que cada registro en el inventario está vinculado a un producto.
- **Detalles_pedidos**: Depende de las tablas pedidos y productos, ya que cada detalle de pedido está asociado a un pedido y a un producto.

### 3. :package: Seeders 
Para facilitar las pruebas y la gestión del proyecto, se han creado seeders que pueblan las tablas con datos de ejemplo. Esto permite probar las operaciones CRUD y validar el correcto funcionamiento del sistema.

**Seeders creados**:

- **CategoríasSeeder**: Agrega categorías como "Monitores", "Periféricos", etc.
- **ProductosSeeder**: Inserta productos de ejemplo con sus precios y categorías asociadas.
- **ClientesSeeder**: Crea clientes ficticios para realizar pedidos.
- **PedidosSeeder**: Genera pedidos con datos de prueba.
- **DetallesPedidosSeeder**: Registra los productos incluidos en los pedidos.
- **InventarioSeeder**: Define el stock inicial de los productos.

### 4. :globe_with_meridians: Rutas API
El archivo `api.php` contiene las rutas necesarias para interactuar con la **API**. Cada ruta corresponde a una operación CRUD para las entidades principales.

---

## :wrench: Way of working

### 1. Docker
- Herramienta para virtualizar y ejecutar contenedores.
- Es utilizada para desplegar la base de datos MariaDB en un entorno aislado.
- Descárgalo desde [Docker](https://www.docker.com/).

### 2. Composer
- Gestor de dependencias para PHP.
- Necesario para instalar y mantener las dependencias de Laravel.
- Descárgalo desde [Composer](https://getcomposer.org/).

### 3. PHP
- Se requiere **PHP 8.1 o superior** con las extensiones necesarias para ejecutar Laravel.

### 4. Postman
- Utilizado para realizar pruebas de los endpoints de la API.
- Descárgalo desde [Postman](https://www.postman.com/).
- Incluye un archivo de colección, `Practica_UD3.postman_collection.json`, en la raíz del proyecto.


### :hammer_and_wrench: Pasos para Configurar el Entorno

### 1. :arrow_down: Clonar el Proyecto

Clona el repositorio desde GitHub y accede a la carpeta del proyecto:

```bash
git clone https://github.com/brunoruizlafuente/practica_UD3
cd practica_UD3
```

### 2. :whale: Levantar los contenedores mediante Docker Compose

Levanta los contenedores según la configuración en `docker-compose.yml`:

```bash
docker-compose up -d
```

Verifica que los contenedores estén funcionando correctamente.

```bash
docker ps
```
Deberías ver dos contenedores en ejecución.


### 3. Configurar el archivo `.env`

Asegúrate de que el archivo `.env` tenga las siguientes variables para conectar Laravel con la base de datos MariaDB:

```bash
DB_CONNECTION=mysql  
DB_HOST=mariadb  
DB_PORT=3306
DB_DATABASE=practica_ud3
DB_USERNAME=root
DB_PASSWORD=ud3_bruno
```

Si no existe el archivo .env, crea uno basado en el ejemplo incluido en el proyecto:
```bash
cp .env.example .env
```

### 4. :key: Generar la clave de la aplicación

Dentro del contenedor de Laravel, genera la clave de la aplicación. Esto es necesario para que Laravel funcione correctamente.
1. Accede al contenedor de Laravel:

```bash
docker exec -it laravel bash
```
2. Genera la clave:

```bash
php artisan key:generate
```
Esto añadirá la clave en el archivo .env en la variable APP_KEY.

### 5. Instalar dependencias

Instala las dependencias necesarias del proyecto:

```bash
composer install
```

### 6. :package: Migrar y poblar la base de datos

Dentro del contenedor de Laravel, ejecuta las migraciones y los seeders para crear las tablas y configurar la base de datos:

```bash
php artisan migrate
php artisan db:seed
```

### 7. :file_cabinet: Acceso directo a la base de datos MariaDB (opcional)

Si necesitas acceder directamente al contenedor de MariaDB para ejecutar consultas SQL, puedes usar el siguiente comando:

```bash
docker exec -it practica_ud3_mariadb mariadb -u root -p
```

Contraseña:

```bash
ud3_bruno
```
Ejecuta comandos como:

```bash
SHOW DATABASES;
USE practica_ud3;
SHOW TABLES;
```

---

## :test_tube: Pruebas con Postman

Para probar los endpoints de la API:
    **1.** Abre Postman
    **2.** Haz clic en Import y selecciona el archivo `Practica_UD3.postman_collection.json` ubicado en la raíz del proyecto.
    **3.** Utiliza las rutas disponibles en la colección para realizar las pruebas.

### Ejemplos de peticiones

Para obtener todas las categorías disponibles, usa el siguiente endpoint:
- Endpoint: **GET** /api/categorias
- URL Completa: http://127.0.0.1:8000/api/categorias

Para añadir una nueva categoría, usa el siguiente endpoint:
- Endpoint: **POST** /api/categorias
- URL Completa: http://127.0.0.1:8000/api/categorias

Para actualizar un cliente existente, usa el siguiente endpoint:
- Endpoint: **PUT** /api/clientes/1
- URL Completa: http://127.0.0.1:8000/api/clientes/1

Para eliminar un registro del inventario, usa el siguiente endpoint:
- Endpoint: **DELETE** /api/inventario/1
- URL Completa: http://127.0.0.1:8000/api/inventario/1

#### Nota

Recuerda que para enviar datos en formato JSON en solicitudes como POST, PUT o PATCH, es necesario incluir el encabezado:

```bash
Content-Type: application/json
```
---

## :mag: Comandos útiles

Limpiar la caché
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
```

Ver las rutas registradas
```bash
php artisan route:list
```