Desarrollo del Catálogo Web - Colombian Coffee ☕

Colombia es reconocida mundialmente por producir uno de los cafés más finos y suaves del planeta. La historia del café colombiano se remonta al siglo XVIII, cuando fue introducido por misioneros jesuitas. Desde entonces, ha evolucionado hasta convertirse en uno de los principales productos de exportación del país, con un ecosistema robusto de pequeños productores que cultivan en su mayoría variedades arábicas de alta calidad.

La Federación Nacional de Cafeteros de Colombia, fundada en 1927, ha sido clave en la promoción de prácticas sostenibles, investigación agronómica, y el desarrollo de variedades adaptadas a los retos climáticos y enfermedades como la roya. Entre las más conocidas están Típica, Borbón, Maragogipe, Tabi, Caturra y la Variedad Colombia, todas con características específicas en sabor, altitud, resistencia y productividad.



Contexto y Especificaciones:


El sistema mostrará información detallada de cada variedad y permitirá la filtración por diferentes atributos agronómicos y resistencias a enfermedades. Además, contará con un mapa interactivo, una sección de sugerencias personalizadas, un panel administrativo completo, y un generador de catálogo en formato PDF. El backend estará desarrollado en PHP utilizando Slim Framework para la API, cumpliendo con principios SOLID y patrones de diseño. El frontend será desarrollado en HTML, CSS, JS, con soporte opcional de frameworks modernos como Vue.js o Bootstrap.



Resultado esperado

Propósito del proyecto


El objetivo principal es desarrollar un catálogo web interactivo y funcional, accesible y visualmente atractivo, que clasifique y muestre en fichas técnicas las principales variedades de café cultivadas en Colombia, permitiendo búsquedas, filtros y reportes personalizados.



El sistema Colombian Coffee debe permitir:

Visualizar un catálogo completo de variedades de café con fichas técnicas detalladas.
Filtrar por porte, tamaño de grano, altitud, potencial de rendimiento, y resistencia a enfermedades.
Ver cada variedad con su nombre, imagen, descripción, datos agronómicos, historia, y grupo genético.
Mostrar un mapa interactivo de Colombia con los departamentos y sus respectivas variedades sembradas.
Generar un catálogo PDF descargable con las variedades seleccionadas por el usuario.
Contar con un panel administrativo para gestión CRUD del contenido.

Requisitos funcionales
✅ Módulo de exploración de variedades

Visualización tipo tarjeta o ficha técnica con:
Nombre común y científico
Imagen de referencia (grano o arbusto)
Descripción general
Porte (alto o bajo)
Tamaño del grano (pequeño, medio, grande)
Altitud óptima de siembra
Potencial de rendimiento (de muy bajo a excepcional)
Calidad del grano según altitud (en 5 niveles)
Resistencias a: roya, antracnosis y nematodos (susceptible, tolerante, resistente)
Información agronómica complementaria: tiempo de cosecha, maduración, nutrición, densidad de siembra
Historia y linaje genético (obtentor, familia, grupo)
🔎 Filtros dinámicos

Filtrar por cualquiera de los atributos anteriores
Combinaciones de filtros para sugerencias inteligentes basadas en criterios agronómicos
🗺️ Mapa interactivo

Muestra por departamento las variedades más cultivadas
Tecnología recomendada: Leaflet.js para una solución ligera y de código abierto
🛠️ Panel administrativo

CRUD completo de variedades
Galería de imágenes asociadas a cada variedad
Gestión del contenido visual, histórico y técnico
Autenticación segura con sesiones PHP
🧾 Generador de Catálogo PDF

Exportación de resultados filtrados a un catálogo PDF personalizado
Generación directa desde el navegador mediante Dompdf


Funcionalidades del frontend:


Diseño responsive compatible con dispositivos móviles y de escritorio
Formularios de login y CRUD con validaciones del lado del cliente y del servidor
Interfaz moderna y accesible usando Bootstrap, Tailwind o Vue.js
Navegación clara e intuitiva entre secciones
Buscador avanzado con filtros combinables
Alertas visuales para errores, confirmaciones y sugerencias de uso
Representación gráfica de los atributos mediante iconos, colores o escalas visuales
Vista previa de la exportación a PDF antes de su descarga


Importancia del frontend:



El frontend en este proyecto es más que una capa estética: es la puerta de entrada al conocimiento técnico y visual del café colombiano. Su correcto diseño asegura que:

Los usuarios entiendan y valoren la información compleja de forma accesible.
Los agricultores, exportadores y técnicos puedan tomar decisiones a partir de datos claros y filtros precisos.
La experiencia de navegación sea cómoda y permita futuras extensiones como dashboards analíticos, comparativas, e incluso simuladores.


Diagramas
Diagrama Entidad-Relación (MER) de variedades y atributos
Opcional: flujos de navegación del usuario (wireframes o mockups)


Requisitos no funcionales
Uso de sentencias preparadas con PDO para prevenir inyecciones SQL
Código estructurado con principios SOLID
Autoloading con Composer
Patrones de diseño implementados (por ejemplo: Repository, Factory, Singleton)
Validación de datos en frontend y backend
Interfaz adaptable (responsive) y accesible




Herramientas y tecnologías:
Backend: PHP 8.x, Slim Framework 4, PDO, Composer
Frontend: HTML5, CSS3, JavaScript, Bootstrap/Tailwind o Vue/React
Base de datos: MySQL
PDF: Dompdf (Opcional)
Mapas: Leaflet.js (Opcional)
Testing y API: Postman
Control de versiones: Git y GitHub


Sugerencias:
Empieza por diseñar la base de datos relacional con atributos categóricos bien normalizados.
Usa Leaflet.js para una solución ligera y libre del mapa.
Dompdf es ideal para generar PDF desde HTML y es fácilmente integrable con Slim.
Usa Factory Pattern para crear instancias de clases DAO o controladores.
Aplica el patrón Singleton para la conexión a la base de datos con PDO.
Documenta bien tus endpoints en la API y prueba cada uno con Postman.


Recursos:
Documentación oficial de Slim
Guía de Composer y autoloading
Referencia de PDO
Documentación sobre SOLID en PHP.
Leaflet.js para mapas
Dompdf para generación de PDFs
LA CARTILLA CAFETERA
Variedades de Café del Mundo