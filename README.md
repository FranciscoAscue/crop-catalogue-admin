<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://foreslab.com/assets/img/logo2.webp" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Descripción del Backend para el Sistema de Optimización de Selección de Papas

### Descripción General de la Plataforma
El backend de la plataforma para optimizar los procesos de selección de papas utiliza datos sobre la distribución internacional de clones para desarrollar un sistema de recomendación destinado a reducir los tiempos de selección. Este sistema utiliza datos históricos, incluida información sobre envíos de clones de papas a varios países, caracterización morfológica y parámetros de rendimiento del cultivo, para completar información faltante y hacer recomendaciones informadas.

### Arquitectura del Backend

#### Framework de Desarrollo y Base de Datos
- **Framework**: El backend se construye utilizando Laravel 10, un framework PHP conocido por sus capacidades robustas y seguras para el desarrollo de aplicaciones web. Laravel facilita el desarrollo ágil, permitiendo una rápida iteración y despliegue.
- **Base de Datos**: Se utiliza MySQL como sistema de gestión de bases de datos. Se integra perfectamente con Laravel, permitiendo operaciones CRUD (Crear, Leer, Actualizar, Eliminar) eficientes. La base de datos almacena datos esenciales sobre clones de papas, incluyendo historial de envíos, datos morfológicos, parámetros de rendimiento e información del usuario.

#### Gestión de Datos y Permisos
- **Roles de Usuario**: El sistema admite diferentes roles de usuario para gestionar el acceso y las operaciones de datos:
  - **Administrador**: Tiene control total sobre la plataforma, incluida la gestión de usuarios.
  - **Editor**: Puede gestionar y actualizar datos sobre los clones de papas.
  - **Consultor**: Puede realizar búsquedas avanzadas y mantener un historial de consultas.

### Integración y Flujo de Trabajo
1. **Recolección de Datos**: Recopilar datos sobre materiales de reproducción, liberaciones de variedades en diferentes países, clones avanzados de papas y marcadores moleculares.
2. **Almacenamiento de Datos**: Almacenar todos los datos relevantes en MySQL, asegurando un acceso y gestión eficientes a través de Laravel.
3. **Integración de API**: Integrar el sistema de recomendación como una API, asegurando una interacción fluida con el backend de Laravel.

### Resultados Esperados
- Un sistema de recomendación operativo que reduce significativamente el tiempo de selección de materiales.
- Catálogos de germoplasma completos y accesibles en línea.
- Implementación e integración exitosa de métodos avanzados de recomendación.
- Mayor eficiencia en la mejora genética y reducción de costos operativos.

### Impacto
- **Investigadores y Mejoradores**: Acceso a datos completos y estandarizados, facilitando la toma de decisiones informadas y acelerando el desarrollo de nuevas variedades.
- **Agricultores**: Mejora en la selección de germoplasma, lo que lleva a cultivos más productivos y resistentes, adaptados a condiciones climáticas específicas.
- **Gestores de Proyectos**: Optimización de la búsqueda y selección de clones de papas adecuados, mejorando la logística y el manejo del material.
