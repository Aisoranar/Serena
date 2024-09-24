# Automatización de Envío de Mensajes por WhatsApp con Laravel y MySQL

Este proyecto permite enviar mensajes automáticamente por WhatsApp y registrar los envíos en una base de datos MySQL utilizando Laravel. El sistema está diseñado para automatizar el proceso de notificación de pedidos listos para ser recogidos, con un enfoque mobile-first y un diseño elegante.

## Funcionalidades

- Envío de mensajes automáticos a través de WhatsApp con un solo clic.
- Registro de cada envío en una base de datos MySQL.
- Animación visual y mensaje de éxito al enviar el mensaje.
- Basado en los principios de diseño mobile-first, optimizado para dispositivos móviles.

## Tecnologías utilizadas

- **Laravel**: Framework de PHP para la aplicación backend.
- **MySQL**: Sistema de gestión de bases de datos para almacenar los registros de los mensajes enviados.
- **HTML5, CSS3**: Para la estructura y el diseño del formulario.
- **JavaScript**: Para manejar la interacción del usuario y la apertura de WhatsApp.
- **Mobile-first**: Diseño optimizado para dispositivos móviles.

## Instalación

1. Clona el repositorio.
2. Configura tu entorno de desarrollo con Laravel siguiendo la [documentación oficial](https://laravel.com/docs).
3. Configura la base de datos en el archivo `.env` de Laravel.
4. Ejecuta las migraciones para crear las tablas necesarias en MySQL:

    ```bash
    php artisan migrate
    ```

5. Configura el archivo `config/mail.php` y `.env` para permitir la comunicación y envíos.

## Uso

1. Completa los campos del formulario en la aplicación.
2. Presiona "Enviar Mensaje" para generar el mensaje y abrir WhatsApp con el contenido predefinido.
3. Al mismo tiempo, se registrará el envío en la base de datos de MySQL.
