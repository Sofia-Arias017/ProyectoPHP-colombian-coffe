Sofia Arias
sofiaariasrojas_73269
Jugando a Visual Studio Code
Adrián Ruiz ⚡ — 10/07/2025 7:17
{
    "name": "PHP & MySQL",
    "dockerComposeFile": "docker-compose.yml",
    "service": "app",
    "workspaceFolder": "/workspaces/${localWorkspaceFolderBasename}",
    "customizations": {
        "vscode": {
            "settings": {
                "terminal.integrated.shell.linux": "/bin/bash",
                "php.validate.executablePath": "/usr/local/bin/php",
                "php.suggest.basic": false,
                "editor.formatOnSave": true
            },
            "extensions": [
                "felixfbecker.php-debug",
                "bmewburn.vscode-intelephense-client",
                "esbenp.prettier-vscode",
                "vivaxy.vscode-conventional-commits",
                "cweijan.vscode-mysql-client2"
            ]
        }
    },
    "forwardPorts": [
        8080,
        3306
    ],
    "features": {
        "ghcr.io/devcontainers/features/github-cli:1": {},
        "ghcr.io/devcontainers-extra/features/composer:1": {}
    }
}
services: 
  app:
    build:
      context: .
      dockerfile: Dockerfile
    volumes:
      
../..:/workspaces:cached
  command: sleep infinity
  network_mode: service:db
db:
  image: mysql:8.4.3
  restart: unless-stopped
  volumes:
mysql-pdo-data:/var/lib/mysql
environment:
  MYSQL_ROOT_PASSWORD: admin
  MYSQL_DATABASE: php_pdo
volumes:
  mysql-pdo-data:
FROM mcr.microsoft.com/devcontainers/php:1-8.2-bullseye

RUN docker-php-ext-install mysqli pdo pdo_mysql
Adrián Ruiz ⚡ — 10/07/2025 7:39
# Php & MySQL

## Instalación y alistamiento del Entorno con Dev Container

### 1. Alistamiento de VS Code
Expandir
Dev Container - Php & MySQL.md
5 KB
Adrián Ruiz ⚡ — 10/07/2025 9:00
php -m | grep pdo
Adrián Ruiz ⚡ — 10/07/2025 9:13
https://github.com/addsdev-campuslands/Php-Dev-Container
GitHub
GitHub - addsdev-campuslands/Php-Dev-Container
Contribute to addsdev-campuslands/Php-Dev-Container development by creating an account on GitHub.
GitHub - addsdev-campuslands/Php-Dev-Container
Adrián Ruiz ⚡ — 11/07/2025 6:25
https://open.spotify.com/playlist/0BQlwXBfiMsJlhRoeKeqkq?si=4ecff878e1de4378

https://open.spotify.com/playlist/60TmTTwnMdMAJilzpgl9uk?si=630b5dac6c5c48ea

https://open.spotify.com/playlist/3zrac3cnyLCyJz481NDOVT?si=808cfa00e23f4bf7

Adrián Ruiz ⚡ — 11/07/2025 8:48
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^ index.php [QSA,L]
### 📝  Taller Para A1– PHP y MySQL

Crear una API REST sencilla que permita gestionar productos, categorías y promociones usando PHP sin frameworks, conectada a una base de datos MySQL. Debe funcionar correctamente (En equipos de Campus o Contenedores) y permitir pruebas con con Postman.

**Lo que tienes que realizar:**
Expandir
Taller Para A1– PHP y MySQL - Camper 🧑🏼‍🚀.md
3 KB
Adrián Ruiz ⚡ — 11/07/2025 14:23
Muchachos le deseamos un feliz fin de semana que les rinda con ese taller y Julian les desea una buena nota.

Pdta: les adjunto una foto de Julian conqueteando a otra altura 
Imagen
Adrián Ruiz ⚡ — 14/07/2025 6:42
Mucho texto
....
Jose David Pabón Pallares
[333]
 — 14/07/2025 6:43
mucho texto
Adrián Ruiz ⚡ — 14/07/2025 6:43
Omitir intro...
Jose David Pabón Pallares
[333]
 — 14/07/2025 6:43
skip
Adrián Ruiz ⚡ — 14/07/2025 6:44
Imagen
Adrián Ruiz ⚡ — 15/07/2025 6:22
Imagen
Julian Camilo Villamizar Montañe
[MIKU]
 — 15/07/2025 6:30
zipzipzipzipzipcomanzipzipzippekis
Imagen
Lorena Contreras Medina — 15/07/2025 6:33
Imagen
Nicolás Díaz Higuera — 15/07/2025 6:33
cuando se tomo esa foto julian 🤔
Ron
[NERU]
 — 15/07/2025 6:33
Imagen
Julian Camilo Villamizar Montañe
[MIKU]
 — 15/07/2025 6:34
zipzipzipzipzipcomanzipzipzippekiszipzipzipzipzipcomanzipzipzippekiszipzipzipzipzipcomanzipzipzippekiszipzipzipzipzipcomanzipzipzippekiszipzipzipzipzipcomanzipzipzippekiszipzipzipzipzipcomanzipzipzippekiszipzipzipzipzipcomanzipzipzippekiszipzipzipzipzipcomanzipzipzippekiszipzipzipzipzipcomanzipzipzippekiszipzipzipzipzipcomanzipzipzippekiszipzipzipzipzipcomanzipzipzippekiszipzipzipzipzipcomanzipzipzippekiszipzipzipzipzipcomanzipzipzippekis
Ron
[NERU]
 — 16/07/2025 8:41
Imagen
Adrián Ruiz ⚡ — 16/07/2025 9:03
https://github.com/addsdev-campuslands/Php-Dev-Container
GitHub
GitHub - addsdev-campuslands/Php-Dev-Container
Contribute to addsdev-campuslands/Php-Dev-Container development by creating an account on GitHub.
Contribute to addsdev-campuslands/Php-Dev-Container development by creating an account on GitHub.
Adrián Ruiz ⚡ — 17/07/2025 7:49
CREATE TABLE campers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    edad INT NOT NULL,
    documento VARCHAR(30) UNIQUE NOT NULL,
    tipo_documento VARCHAR(20) NOT NULL,
    nivel_ingles TINYINT DEFAULT 0,
    nivel_programacion TINYINT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO campers (nombre, edad, documento, tipo_documento, nivel_ingles, nivel_programacion)
VALUES 
('Ana María Ríos', 19, '1001234567', 'Cédula', 4, 3),
('Luis Alberto Peña', 22, '1002234568', 'Cédula', 3, 4),
('Camila Torres', 20, '1003234569', 'Cédula', 5, 5),
('Carlos Méndez', 18, '1004234570', 'TI', 2, 1),
('Laura Galvis', 21, '1005234571', 'Cédula', 3, 3),
('Diego Suárez', 24, '1006234572', 'Cédula', 1, 2),
('Valentina López', 20, '1007234573', 'Cédula', 4, 4),
('Andrés Gómez', 23, '1008234574', 'Pasaporte', 2, 3),
('María Fernanda Ruiz', 25, '1009234575', 'Cédula', 5, 5),
('Jhonatan Páez', 19, '1010234576', 'Cédula', 3, 2);
Adrián Ruiz ⚡ — 17/07/2025 20:42
Vean que mis dichos son famosos: 

https://www.instagram.com/p/DLCfHB1Ox6r/?igsh=b2tzMGx2eHdtZnp3

millonesderisa
😧👍
Likes
602035

Instagram
Jose David Pabón Pallares
[333]
 — 19/07/2025 7:40
Imagen
Kevin Stiven Angarita Caamaño — 21/07/2025 6:16
https://www.iqtests.org/tests
www.iqtests.org
All tests
These tests are designed to evaluate different intelligence skills, including memory, deductive and inductive reasoning, spatial intelligence, logical thinking, mathematical and verbal skills, and concentration.
Imagen
Kevin Stiven Angarita Caamaño — 21/07/2025 7:59
<?php

namespace App\core;

use PDO;
use PDOException;

class DatabasePDO
{
    private static ?PDO $connection = null;

    public static function getConnection(): PDO
    {
        if (self::$connection === null) {
            require_once "src/config.php";
            try {
                self::$connection = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die(json_encode(["error" => $e->getMessage(),  'code' => 500, 'errorUrl' => 'https://http.cat/500']));
            }
        }
        return self::$connection;
    }
}
Adrián Ruiz ⚡ — 21/07/2025 8:05
# `Migración` a PSR-4 con Composer Autoload

## Introducción

Tradicionalmente, se usan `require_once` o `include_once` para cargar archivos en PHP. Sin embargo, esto genera una alta dependencia del orden de carga, problemas de rendimiento y mantenibilidad.
Expandir
Composer Autoload con PSR-4.md
6 KB
Adrián Ruiz ⚡ — 21/07/2025 8:30
  // GET
  [{
        "ID": 1,
        "nombre": "Ana María Ríos",
        "edad": 19,
        "documento": "1001234567",
        "tipoDocumento": "Cédula",
        "nivelIngles": " <2 BAJO, <4 MEDIO, >4 ALTO",
        "nivelProgramacion": "<2 JR, <=3 JR M, >3 JR A"
    },
    .....
  ]

  //POST
    {
        "nombre": "Ana María Ríos",
        "edad": 19,
        "documento": "1001234567",
        "tipoDocumento": "Cédula",
        "nivelIngles": 0 a 6,
        "nivelProgramacion": 0 a 5
    }


  //PUT > documento = ?
    {
        "nombre": "Ana María Ríos",
        "edad": 19,
        "documento": "1001234567",
        "tipoDocumento": "Cédula",
        "nivelIngles": 0 a 6,
        "nivelProgramacion": 0 a 5
    }
//DELETE > documento = ?

{
        "ID": 1,
        "nombre": "Ana María Ríos",
        "edad": 19,
        "documento": "1001234567",
        "tipoDocumento": "Cédula",
        "nivelIngles": " <2 BAJO, <4 MEDIO, >4 ALTO",
        "nivelProgramacion": "<2 JR, <=3 JR M, >3 JR A"
    },
  
Adrián Ruiz ⚡ — 22/07/2025 7:06
{
    "name": "adds/api-basic-slim",
    "description": "Una API basica de Slim",
    "type": "project",
    "license": "MIT",
    "autoload": {
        "psr-4": {
            "Adds\\ApiBasicSlim\\": "src/"
        }
    },
    "authors": [
        {
            "name": "Adrian Ruiz",
            "email": "addsdeveloper@gmail.com"
        }
    ],
    "require": {}
}
Kevin Stiven Angarita Caamaño — 22/07/2025 7:13
^
Adrián Ruiz ⚡ — 22/07/2025 9:23
<?php

namespace App\Middleware;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface as Handler;

class JsonBodyParserMiddleware implements MiddlewareInterface
{
    public function process(Request $request, Handler $handler): Response
    {
        $contentType = $request->getHeaderLine('Content-Type');
        if (strtr($contentType, ["application/json"])) {
            $data = json_decode(file_get_contents('php://input'), true);
            $request = $request->withParsedBody($data);
        }

        return $handler->handle($request);
    }
}
https://github.com/addsdev-campuslands/api-basic-slim
GitHub
GitHub - addsdev-campuslands/api-basic-slim
Contribute to addsdev-campuslands/api-basic-slim development by creating an account on GitHub.
Adrián Ruiz ⚡ — 23/07/2025 8:34
# Composer
vendor/
composer.lock

# Entorno
.env
.env.local
.env.*.local

# Archivos temporales y cachés
*.log
*.cache
*.tmp
*.temp
*.bak

# IDEs y editores
.idea/
*.sublime-project
*.sublime-workspace
.vscode/
*.swp
*.swo

# Sistemas de archivos (macOS / Linux / Windows)
.DS_Store
Thumbs.db
desktop.ini

# PHPUnit / Testing
phpunit.xml
phpunit.result.cache
coverage/

# Logs
logs/
*.log

# Base de datos (si usas SQLite local)
*.sqlite
*.sqlite3
*.db

# Eloquent migration backups (si los generas manualmente)
*_backup.sql

# Slim built-in server router (si lo usas)
router.php
Adrián Ruiz ⚡ — 24/07/2025 7:36
CREATE TABLE campers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    edad INT NOT NULL,
    documento VARCHAR(30) UNIQUE NOT NULL,
    tipo_documento VARCHAR(20) NOT NULL,
    nivel_ingles TINYINT DEFAULT 0,
    nivel_programacion TINYINT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO campers (nombre, edad, documento, tipo_documento, nivel_ingles, nivel_programacion)
VALUES 
('Ana María Ríos', 19, '1001234567', 'Cédula', 4, 3),
('Luis Alberto Peña', 22, '1002234568', 'Cédula', 3, 4),
('Camila Torres', 20, '1003234569', 'Cédula', 5, 5),
('Carlos Méndez', 18, '1004234570', 'TI', 2, 1),
('Laura Galvis', 21, '1005234571', 'Cédula', 3, 3),
('Diego Suárez', 24, '1006234572', 'Cédula', 1, 2),
('Valentina López', 20, '1007234573', 'Cédula', 4, 4),
('Andrés Gómez', 23, '1008234574', 'Pasaporte', 2, 3),
('María Fernanda Ruiz', 25, '1009234575', 'Cédula', 5, 5),
('Jhonatan Páez', 19, '1010234576', 'Cédula', 3, 2);
Adrián Ruiz ⚡ — 24/07/2025 8:27
# Php I



## 1. Introducción a php
... (Tiempo restante: 92 KB)
Expandir
Php I.md
142 KB
https://laravel.com/docs/11.x/eloquent
Eloquent: Getting Started - Laravel 11.x - The PHP Framework For We...
Laravel is a PHP web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.
Eloquent: Getting Started - Laravel 11.x - The PHP Framework For We...
Adrián Ruiz ⚡ — 25/07/2025 7:02
CREATE TABLE `usuarios`
(
    `id`     int          NOT NULL AUTO_INCREMENT,
    `nombre` varchar(100) NOT NULL,
    `email`  varchar(100) NOT NULL,
    `password`  varchar(255) NOT NULL,
    `rol`  enum('admin', 'user') NOT NULL DEFAULT 'user',
    PRIMARY KEY (`id`),
    UNIQUE KEY `email` (`email`)
);
Kevin Stiven Angarita Caamaño — 25/07/2025 11:51
Imagen
Adrián Ruiz ⚡ — 28/07/2025 6:23
# Desarrollo del Catálogo Web - Colombian Coffee ☕

Colombia es reconocida mundialmente por producir uno de los cafés más finos y suaves del planeta. La historia del café colombiano se remonta al siglo XVIII, cuando fue introducido por misioneros jesuitas. Desde entonces, ha evolucionado hasta convertirse en uno de los principales productos de exportación del país, con un ecosistema robusto de pequeños productores que cultivan en su mayoría variedades arábicas de alta calidad.

La Federación Nacional de Cafeteros de Colombia, fundada en 1927, ha sido clave en la promoción de prácticas sostenibles, investigación agronómica, y el desarrollo de variedades adaptadas a los retos climáticos y enfermedades como la roya. Entre las más conocidas están **Típica**, **Borbón**, **Maragogipe**, **Tabi**, **Caturra** y la **Variedad Colombia**, todas con características específicas en sabor, altitud, resistencia y productividad.
Expandir
Desarrollo del Catálogo Web - Colombian Coffee ☕.md
8 KB
Tipo de archivo adjunto: acrobat
Coffee | bourbon.pdf
10.15 MB
Tipo de archivo adjunto: acrobat
Coffee | caturra.pdf
8.62 MB
Adrián Ruiz ⚡ — 28/07/2025 7:02
https://respect-validation.readthedocs.io/en/2.4/rules/Email/
Darwin Samuel machuca González — 28/07/2025 7:11
Profe el microfono 🥹 😅
Adrián Ruiz ⚡ — 28/07/2025 7:15
 v::stringType()->length(min: 8, max: 100)
                ->regex('/[!@#$%^&*()\-_=+{};:,<.>]/')->regex('/[0-9]/')
                ->setName('password');
Kevin Stiven Angarita Caamaño — 29/07/2025 13:36
Imagen
Adrián Ruiz ⚡ — 31/07/2025 8:12
https://laravel.com/docs/12.x/eloquent
Eloquent: Getting Started - Laravel 12.x - The PHP Framework For We...
Laravel is a PHP web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.
Eloquent: Getting Started - Laravel 12.x - The PHP Framework For We...
Adrián Ruiz ⚡ — 10:53
# Cositas para Estudiar para el Examen

1. Instalación con Composer para Slim.
2. Definición de rutas (`GET`, `POST`, `PUT`, y etc.).
3. Uso de middlewares.
   - Parseo de datos de entrada `file_get_contents('php://input')`.
Expandir
Cositas para Estudiar para el Examen.md
1 KB
﻿
# Desarrollo del Catálogo Web - Colombian Coffee ☕

Colombia es reconocida mundialmente por producir uno de los cafés más finos y suaves del planeta. La historia del café colombiano se remonta al siglo XVIII, cuando fue introducido por misioneros jesuitas. Desde entonces, ha evolucionado hasta convertirse en uno de los principales productos de exportación del país, con un ecosistema robusto de pequeños productores que cultivan en su mayoría variedades arábicas de alta calidad.

La Federación Nacional de Cafeteros de Colombia, fundada en 1927, ha sido clave en la promoción de prácticas sostenibles, investigación agronómica, y el desarrollo de variedades adaptadas a los retos climáticos y enfermedades como la roya. Entre las más conocidas están **Típica**, **Borbón**, **Maragogipe**, **Tabi**, **Caturra** y la **Variedad Colombia**, todas con características específicas en sabor, altitud, resistencia y productividad.

### **Contexto y Especificaciones:**

El sistema mostrará información detallada de cada variedad y permitirá la filtración por diferentes atributos agronómicos y resistencias a enfermedades. Además, contará con un **mapa interactivo**, una sección de **sugerencias personalizadas**, un **panel administrativo completo**, y un generador de **catálogo en formato PDF**. El backend estará desarrollado en **PHP** utilizando **Slim Framework** para la API, cumpliendo con principios SOLID y patrones de diseño. El frontend será desarrollado en **HTML, CSS, JS**, con soporte opcional de frameworks modernos como **Vue.js** o **Bootstrap**.

### **Propósito del proyecto**

El objetivo principal es desarrollar un **catálogo web interactivo y funcional**, accesible y visualmente atractivo, que clasifique y muestre en fichas técnicas las principales variedades de café cultivadas en Colombia, permitiendo búsquedas, filtros y reportes personalizados.

El sistema **Colombian Coffee** debe permitir:

- Visualizar un **catálogo completo de variedades** de café con fichas técnicas detalladas.
- Filtrar por **porte**, **tamaño de grano**, **altitud**, **potencial de rendimiento**, y **resistencia a enfermedades**.
- Ver cada variedad con su **nombre**, **imagen**, **descripción**, **datos agronómicos**, **historia**, y **grupo genético**.
- Mostrar un **mapa interactivo** de Colombia con los departamentos y sus respectivas variedades sembradas.
- Generar un **catálogo PDF** descargable con las variedades seleccionadas por el usuario.
- Contar con un **panel administrativo** para gestión CRUD del contenido.

### **Requisitos funcionales**

**Módulo de exploración de variedades**

- Visualización tipo tarjeta o ficha técnica con:
- Nombre común y científico.
- Imagen de referencia (grano o arbusto).
- Descripción general.
- Porte (alto o bajo).
- Tamaño del grano (pequeño, medio, grande).
- Altitud óptima de siembra.
- Potencial de rendimiento (de muy bajo a excepcional).
- Calidad del grano según altitud (en 5 niveles).
- Resistencias a: roya, antracnosis y nematodos (susceptible, tolerante, resistente).
- Información agronómica complementaria: tiempo de cosecha, maduración, nutrición, densidad de siembra.
- Historia y linaje genético (obtentor, familia, grupo).

**Filtros dinámicos**

- Filtrar por cualquiera de los atributos anteriores.
- Combinaciones de filtros para sugerencias inteligentes basadas en criterios agronómicos.

**Mapa interactivo**

- Muestra por departamento las variedades más cultivadas
- Tecnología recomendada: **Leaflet.js** para una solución ligera y de código abierto

**Panel administrativo **

- CRUD completo de variedades
- Galería de imágenes asociadas a cada variedad
- Gestión del contenido visual, histórico y técnico
- Autenticación segura con sesiones PHP

**Generador de Catálogo PDF**

- Exportación de resultados filtrados a un catálogo PDF personalizado.
- Generación directa desde el navegador mediante **Dompdf**.

### **Funcionalidades del frontend:**

- **Diseño responsive** compatible con dispositivos móviles y de escritorio.
- Formularios de login y CRUD con validaciones del lado del cliente y del servidor.
- Interfaz moderna y accesible usando Bootstrap, Tailwind o Vue.js.
- Navegación clara e intuitiva entre secciones.
- Buscador avanzado con filtros combinables.
- Alertas visuales para errores, confirmaciones y sugerencias de uso.
- Representación gráfica de los atributos mediante iconos, colores o escalas visuales.
- Vista previa de la exportación a PDF antes de su descarga.

**Importancia del frontend:**

El frontend en este proyecto es más que una capa estética: es la **puerta de entrada** al conocimiento técnico y visual del café colombiano. Su correcto diseño asegura que:

- Los usuarios entiendan y valoren la información compleja de forma accesible.
- Los agricultores, exportadores y técnicos puedan tomar decisiones a partir de datos claros y filtros precisos.
- La experiencia de navegación sea cómoda y permita futuras extensiones como dashboards analíticos, comparativas, e incluso simuladores.

### **Diagramas**

- Diagrama Entidad-Relación (MER) de variedades y atributos.
- Opcional: flujos de navegación del usuario (wireframes o mockups).

### **Requisitos no funcionales**

- Uso de sentencias preparadas con PDO para prevenir inyecciones SQL.
- Código estructurado con principios SOLID.
- Autoloading con Composer.
- Patrones de diseño implementados (por ejemplo: Repository, Factory, Singleton).
- Validación de datos en frontend y backend.
- Interfaz adaptable (responsive) y accesible.

### **Herramientas y tecnologías:**

- **Backend**: PHP 8.x, Slim Framework 4, PDO, Composer.
- **Frontend**: HTML5, CSS3, JavaScript, Bootstrap/Tailwind o Vue/React.
- **Base de datos**: MySQL.
- **PDF**: Dompdf (*Opcional*).
- **Mapas**: [Leaflet.js](http://leaflet.js/) (*Opcional*).
- **Testing y API**: Postman.
- **Control de versiones**: Git y GitHub.

### **Sugerencias:**

- Empieza por diseñar la base de datos relacional con atributos categóricos bien normalizados.
- Usa Leaflet.js para una solución ligera y libre del mapa.
- Dompdf es ideal para generar PDF desde HTML y es fácilmente integrable con Slim.
- Usa Factory Pattern para crear instancias de clases DAO o controladores.
- Aplica el patrón Singleton para la conexión a la base de datos con PDO.
- Documenta bien tus endpoints en la API y prueba cada uno con Postman.

### **Recursos:**

- [Documentación oficial de Slim](https://www.slimframework.com/docs/v4/)
- [Guía de Composer y autoloading](https://getcomposer.org/doc/04-schema.md#autoload)
- [Referencia de PDO](https://www.php.net/manual/es/book.pdo.php)
- [Documentación sobre SOLID en PHP](https://phptherightway.com/pages/Design-Patterns.html).
- [Leaflet.js para mapas](https://leafletjs.com/)
- [Dompdf para generación de PDFs](https://github.com/dompdf/dompdf)
- [LA CARTILLA CAFETERA](https://www.cenicafe.org/es/publications/C1.pdf)
- [Variedades de Café del Mundo](https://cdn2.assets-servd.host/worldcoffee-research/production/pdf/catalogEnglish/Combined/robusta-1738925628.pdf)
Desarrollo del Catálogo Web - Colombian Coffee ☕.md
8 KB
