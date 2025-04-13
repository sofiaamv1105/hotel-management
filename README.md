# 🏨 Sistema de Gestión de Hoteles con Laravel 11 + Breeze

Este proyecto es una aplicación web desarrollada con Laravel 11. Permite gestionar la información de hoteles, habitaciones y reservas mediante operaciones CRUD. También incluye autenticación de usuarios utilizando Laravel Breeze para proteger las funcionalidades del sistema.

---

## 📌 Descripción General

El objetivo principal es construir un sistema completo para administrar:

- **Hoteles**: nombre, ubicación, teléfono y correo de contacto.
- **Habitaciones**: vinculadas a hoteles, con número, tipo (ej. simple, doble, suite) y precio por noche.
- **Reservas**: asociadas a habitaciones, con información del cliente; correo de contacto y nombre del cliente, y fechas de reserva.

Los usuarios autenticados podrán realizar operaciones CRUD sobre estas entidades, garantizando integridad en las relaciones entre ellas.

---

## 🗃️ Estructura de Base de Datos

### Hoteles

| Campo            | Tipo     |
|------------------|----------|
| id               | PK       |
| nombre           | string   |
| ubicación        | string   |
| número_telefono  | string   |
| email_contacto   | string   |

### Habitaciones

| Campo            | Tipo     |
|------------------|----------|
| id               | PK       |
| hotel_id         | FK       |
| número           | string   |
| tipo             | string   |
| precio_por_noche | decimal  |

### Reservas

| Campo            | Tipo     |
|------------------|----------|
| id               | PK       |
| habitación_id    | FK       |
| fecha_inicio     | date     |
| fecha_fin        | date     |
| cliente_nombre   | string   |
| cliente_email    | string   |

---

## 🚀 Requisitos del Proyecto

### ✅ Migraciones
- Definidas para cada entidad (`hotels`, `habitacions`, `reservas`).
- Relaciones con claves foráneas correctamente implementadas.

### ✅ Modelos
- Relaciones establecidas:
  - Un hotel tiene muchas habitaciones.
  - Una habitación tiene muchas reservas.
  - Una reserva pertenece a una habitación.

### ✅ Controladores
- Implementación CRUD para las tres entidades:
  - `HotelController`
  - `HabitacionController`
  - `ReservaController`

### ✅ Vistas
- Interfaz construida con Blade.
- Listado, creación, edición, eliminación y detalles de cada entidad.

### ✅ Rutas
- Todas las rutas están protegidas con el middleware `auth`.
- Definidas en `routes/web.php`.

### ✅ Autenticación
- Laravel Breeze implementado.
- Registro, login y logout funcionales.

---

## 🧑‍💻 Instalación y Configuración

1. **Clonar el repositorio**
```bash
git clone https://github.com/sofiaamv1105/hotel-management
cd hotel-management
```

2. **Instalar dependencias**
```bash
composer install
npm install
```


4. **Configurar base de datos en `.env`**  
   Asegúrate de definir:
   ```
   DB_DATABASE=hotel.+-management
   ```

5. **Ejecutar migraciones**
```bash
php artisan migrate
```

6. **Compilar assets**
```bash
npm run dev
```

7. **Levantar el servidor**
```bash
php artisan serve
```

Accede a la app en `http://localhost:8000`.

---

## 🔐 Autenticación

Laravel Breeze está preinstalado, proporcionando:

- Registro de usuarios
- Inicio y cierre de sesión
- Protección de rutas mediante middleware `auth`

---

## 🌳 Git y GitHub

- Rama principal: `main`

---

¡Gracias por revisar este proyecto! ✨