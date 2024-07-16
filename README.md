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
- **Framework**: The backend is built using Laravel 10, a PHP framework known for its robust and secure web application development capabilities. Laravel facilitates agile development, allowing for rapid iteration and deployment.
- **Base de Datos**: MySQL is used as the database management system. It integrates seamlessly with Laravel, enabling efficient CRUD (Create, Read, Update, Delete) operations. The database stores essential data on potato clones, including shipment history, morphological data, performance parameters, and user information.

#### Gestión de Datos y Permisos
- **Roles de Usuario**: The system supports different user roles to manage data access and operations:
  - **Administrador**: Has full control over the platform, including user management.
  - **Editor**: Can manage and update data on potato clones.
  - **Espectador**: Can perform advanced searches and maintain a history of queries.

### Integración y Flujo de Trabajo
1. **Recopilación de Datos**: Gather data on breeding materials, variety releases in different countries, advanced potato clones, and molecular markers.
2. **Almacenamiento de Datos**: Store all relevant data in MySQL, ensuring efficient access and management through Laravel.
3. **Integración de API**: Integrate the recommendation system as an API, ensuring seamless interaction with the Laravel backend.

### Resultados Esperados

- An operational recommendation system that significantly reduces material selection time.
- Comprehensive and accessible online germplasm catalogs.
- Successful implementation and integration of advanced recommendation methods.
- Enhanced genetic improvement efficiency and reduced operational costs.

### Impact
- **Researchers and Breeders**: Access to complete and standardized data, facilitating informed decision-making and accelerating the development of new varieties.
- **Farmers**: Improved germplasm selection, leading to more productive and resilient crops adapted to specific climatic conditions.
- **Project Managers**: Streamlined search and selection of suitable potato clones, optimizing logistics and material handling processes.
