# Sistema de Gestión de Clínicas - ABM

Este proyecto universitario trata de recrea un sistema para gestionar clínicas, áreas médicas, especialidades de médicos, pacientes y consultas realizadas por los pacientes. Utiliza PHP como lenguaje principal, con Bootstrap para la interfaz de usuario y XAMPP (Apache y MySQL) como entorno de desarrollo.

## Universidad Nacional de Villa Mercedes

Carrera: Programación Universitaria de Sistemas<br>
Materia: Programación III<br>
Profesor: Pablo Andrés Cavalie<br>
Alumno: Mauro Agustín Lucero<br>
Año: 2024

## Descripción del Proyecto

El sistema desarrollado permite gestionar información clave en entornos clínicos, facilitando la organización y administración de datos como la de los médicos, los pacientes y sus consultas en respectivas clínicas.

**Nota:** El Sistema no está finalizado. Aún sigue en desarrollo.

## Cómo Levantar el Proyecto

1. **Crear Base de Datos:**
   - **Nota:** Nombre recomendado para la base de datos: "clinica"

1. **Crear Tablas de la Base de Datos:**
   - Ejecute el script [create-all-tables.sql](database/create-all-tables.sql) para crear todas las tablas de la base de datos.

2. **Importar Datos Iniciales:**
   - Utilice [inserts-principal.sql](database/inserts-principal.sql) para cargar datos iniciales y ejemplos de tuplas en la base de datos.

3. **Configuración de Conexión:**
   - Asegúrese de configurar correctamente los parámetros de conexión en [connection.php](lib/connection.php) para establecer la conexión con la base de datos.

## Ejecución del Proyecto

El proyecto se ejecuta en un entorno de servidor. Asegúrese de tener XAMPP u otro entorno similar instalado y configurado adecuadamente antes de iniciar el sistema.