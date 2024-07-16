<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://foreslab.com/assets/img/logo2.webp" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Backend Description for the Potato Selection Optimization System

### Descripción General de la Plataforma
El backend de la plataforma para optimizar los procesos de selección de papas aprovecha los datos sobre la distribución internacional de clones para desarrollar un sistema de recomendaciones que reduce los tiempos de selección. Este sistema utiliza datos históricos, incluyendo información sobre envíos de clones de papa a varios países, caracterización morfológica y parámetros de rendimiento de cultivos para completar información faltante y hacer recomendaciones informadas.

### Arquitectura del Backend

#### Framework de Desarrollo y Base de Datos
- **Framework**: El backend está construido usando Laravel 10, un framework de PHP conocido por sus robustas y seguras capacidades de desarrollo de aplicaciones web. Laravel facilita el desarrollo ágil, permitiendo iteraciones y despliegues rápidos.
- **Base de Datos**: Se utiliza MySQL como el sistema de gestión de bases de datos. Se integra perfectamente con Laravel, permitiendo operaciones eficientes de CRUD (Crear, Leer, Actualizar, Eliminar). La base de datos almacena datos esenciales sobre clones de papa, incluyendo el historial de envíos, datos morfológicos, parámetros de rendimiento e información de usuarios.

#### Gestión de Datos y Permisos
- **Roles de Usuario**: El sistema soporta diferentes roles de usuario para gestionar el acceso a los datos y las operaciones:
  - **Administrador**: Tiene control total sobre la plataforma, incluyendo la gestión de usuarios.
  - **Editor**: Puede gestionar y actualizar datos sobre clones de papa.
  - **Espectador**: Puede realizar búsquedas avanzadas y mantener un historial de consultas.

### Integración y Flujo de Trabajo
1. **Recopilación de Datos**: Recopilar datos sobre materiales de reproducción, liberación de variedades en diferentes países, clones avanzados de papa y marcadores moleculares.
2. **Almacenamiento de Datos**: Almacenar todos los datos relevantes en MySQL, asegurando un acceso y gestión eficientes a través de Laravel.
3. **Integración de API**: Integrar el sistema de recomendaciones como una API, asegurando una interacción sin problemas con el backend de Laravel.

### Resultados Esperados

- Un sistema de recomendaciones operativo que reduzca significativamente el tiempo de selección de materiales.
- Catálogos de germoplasma completos y accesibles en línea.
- Implementación e integración exitosas de métodos avanzados de recomendaciones.
- Mayor eficiencia en la mejora genética y reducción de costos operativos.

### Impacto
- **Investigadores y Mejoradores**: Acceso a datos completos y estandarizados, facilitando la toma de decisiones informadas y acelerando el desarrollo de nuevas variedades.
- **Agricultores**: Mejora en la selección de germoplasma, llevando a cultivos más productivos y resistentes adaptados a condiciones climáticas específicas.
- **Project Managers**: Optimización en la búsqueda y selección de clones de papa adecuados, mejorando la logística y los procesos de manejo de materiales.
