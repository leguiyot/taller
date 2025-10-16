# Agente de Desarrollo para Aplicación de Taller Mecánico en Laravel

Este documento define la estructura, módulos y pautas para el desarrollo de una aplicación web de gestión integral para un taller mecánico utilizando el framework Laravel.

## 1. Visión General del Proyecto

El objetivo es crear un sistema robusto y fácil de usar que permita administrar las operaciones diarias de un taller mecánico. La aplicación cubrirá la gestión de clientes, vehículos, presupuestos, órdenes de trabajo, inventario de repuestos, facturación y empleados.

**Tecnologías Principales:**
* **Backend:** PHP 8.1+ / Laravel 10+
* **Frontend:** Blade con Alpine.js o Vue.js (opcional).
* **Framework CSS:** Tailwind CSS o Bootstrap 5.
* **Base de Datos:** MySQL o PostgreSQL.

---

## 2. Definición de Módulos

A continuación se detalla cada módulo solicitado y sus especificaciones técnicas.

### Módulo 1: Gestión de Clientes
* **Descripción:** Permitirá realizar operaciones CRUD (Crear, Leer, Actualizar, Eliminar) para los clientes del taller.
* **Modelo:** `Client` (`name`, `last_name`, `dni`, `email`, `phone`, `address`).
* **Controlador:** `ClientController` con métodos para `index`, `create`, `store`, `edit`, `update`, `destroy`.
* **Vistas:** Listado de clientes con buscador, formulario de alta/edición y vista de detalle.
* **Funcionalidad Clave:** El listado debe ser paginado y permitir búsquedas por nombre, apellido o DNI.

### Módulo 2: Gestión de Vehículos
* **Descripción:** Administración de los vehículos, siempre asociados a un cliente.
* **Modelo:** `Vehicle` (`client_id`, `brand`, `model`, `year`, `license_plate`, `vin_number`).
* **Relación:** Un `Client` puede tener muchos `Vehicle` (Relación 1 a N).
* **Controlador:** `VehicleController`, probablemente anidado bajo las rutas de clientes (`/clients/{client}/vehicles`).
* **Funcionalidad Clave:** Formulario para agregar múltiples vehículos a un mismo cliente. Vista de detalle del cliente debe mostrar sus vehículos asociados.

### Módulo 3: Presupuestos y Órdenes de Trabajo (OT)
* **Descripción:** Creación de presupuestos que pueden ser aprobados y convertidos en Órdenes de Trabajo.
* **Modelos:**
    * `Quote` (`client_id`, `vehicle_id`, `description`, `total_amount`, `status`).
    * `WorkOrder` (`client_id`, `vehicle_id`, `quote_id`, `description`, `status`, `assigned_to`).
* **Estados:**
    * `Quote`: `Pendiente`, `Aprobado`, `Rechazado`.
    * `WorkOrder`: `En espera`, `En proceso`, `Finalizada`, `Facturada`.
* **Funcionalidad Clave:** Un botón en el presupuesto aprobado para "Convertir en OT" que genere automáticamente la orden de trabajo con los datos precargados.

### Módulo 4: Gestión de Repuestos
* **Descripción:** Control de inventario de los repuestos utilizados en las reparaciones.
* **Modelo:** `Part` (`name`, `sku`, `description`, `stock`, `price`).
* **Relación:** Una `WorkOrder` puede tener muchos `Part` (Relación N a M con tabla pivote `part_work_order` que incluya `quantity` y `price_at_time`).
* **Funcionalidad Clave:** Un buscador de repuestos en la vista de la OT para agregarlos fácilmente. El stock debe disminuir automáticamente cuando se usa un repuesto en una OT finalizada.

### Módulo 5: Facturación
* **Descripción:** Generación de facturas a partir de Órdenes de Trabajo completadas.
* **Modelo:** `Invoice` (`work_order_id`, `client_id`, `total`, `tax_amount`, `issue_date`).
* **Librería Recomendada:** `barryvdh/laravel-dompdf` para generar los archivos PDF.
* **Funcionalidad Clave:**
    * Generar factura con el detalle de mano de obra y repuestos desde la OT.
    * Opción para descargar o enviar la factura en PDF por correo electrónico al cliente.
    * Cálculo automático de subtotales, impuestos y total.

### Módulo 6: Gestión de Empleados
* **Descripción:** Administración de los usuarios del sistema (mecánicos, administrativos).
* **Modelo:** Se utilizará el modelo `User` de Laravel por defecto, extendiéndolo si es necesario.
* **Relación:** Una `WorkOrder` puede ser asignada a uno o varios `User` (mecánicos). (Relación N a M con tabla pivote `user_work_order`).
* **Funcionalidad Clave:** Asignar mecánicos responsables a cada Orden de Trabajo.

### Módulo 7: Panel de Administración (Dashboard)
* **Descripción:** Una vista principal con métricas y accesos directos clave para el administrador.
* **Controlador:** `DashboardController`.
* **Componentes:**
    * Tarjetas con totales: Clientes registrados, OTs en proceso, Ingresos del mes.
    * Gráfico simple (ej. con Chart.js) de ingresos de los últimos 6 meses.
    * Listado de las últimas 5 OTs creadas.
    * Accesos directos a las funciones más utilizadas (Crear Cliente, Nueva OT, etc.).

### Módulo 8: Autenticación y Roles
* **Descripción:** Sistema de login seguro con diferentes niveles de acceso.
* **Scaffolding:** Se recomienda usar **Laravel Breeze** o **Jetstream** para una implementación rápida y segura.
* **Paquete Recomendado:** `spatie/laravel-permission` para gestionar roles y permisos.
* **Roles Sugeridos:**
    * **Administrador:** Acceso total a todos los módulos.
    * **Operario/Mecánico:** Acceso para ver y actualizar el estado de las OTs que tiene asignadas.
    * **Recepcionista:** Acceso a la gestión de clientes, vehículos, presupuestos y OTs.

### Módulo 9: Diseño Responsive
* **Descripción:** La interfaz debe ser completamente funcional y visualmente agradable en dispositivos de escritorio, tablets y móviles.
* **Implementación:** Utilizar las clases de utilidad del framework CSS elegido (Tailwind/Bootstrap) para crear un layout fluido y adaptable (mobile-first).

---

## 3. Hoja de Ruta de Desarrollo (Sugerida)

1.  **Fase 1: Core y Autenticación**
    * Configuración del proyecto Laravel.
    * Instalación de Laravel Breeze/Jetstream.
    * Implementación del sistema de Roles y Permisos.
    * Creación de los modelos y migraciones para todos los módulos.

2.  **Fase 2: Módulos Principales**
    * Desarrollo del CRUD de Clientes.
    * Desarrollo del CRUD de Vehículos, asociándolos a los clientes.
    * Desarrollo del CRUD de Repuestos.

3.  **Fase 3: Lógica de Negocio**
    * Creación y gestión de Presupuestos.
    * Implementación de la conversión de Presupuesto a Orden de Trabajo.
    * Gestión de estados de las OTs y asignación de repuestos y empleados.

4.  **Fase 4: Finalización y Reportes**
    * Desarrollo del módulo de Facturación y generación de PDF.
    * Creación del Dashboard con las estadísticas principales.
    * Ajustes finales de diseño responsive y experiencia de usuario (UX).
