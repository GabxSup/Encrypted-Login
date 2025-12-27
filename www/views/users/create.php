<h1>Nuevo usuario</h1>


<?php if (isset($_SESSION['error'])): ?>
    <div style="color: red; border: 1px solid red; padding: 10px; margin-bottom: 10px;">
        <?= $_SESSION['error'] ?>
        <?php unset($_SESSION['error']); ?>
    </div>
<?php endif; ?>

<form method="POST" action="/users" style="max-width: 400px; display: flex; flex-direction: column; gap: 15px;">

    <div>
        <label for="name" style="display: block; margin-bottom: 5px; font-weight: bold;">Nombre Completo:</label>
        <input type="text" id="name" name="name" placeholder="Ej: Juan Pérez" required
            style="width: 100%; padding: 8px;">
    </div>

    <div>
        <label for="email" style="display: block; margin-bottom: 5px; font-weight: bold;">Correo Electrónico:</label>
        <input type="email" id="email" name="email" placeholder="usuario@ejemplo.com" required
            style="width: 100%; padding: 8px;">
    </div>

    <div>
        <label for="password" style="display: block; margin-bottom: 5px; font-weight: bold;">Contraseña:</label>
        <input type="password" id="password" name="password" placeholder="Mínimo 8 caracteres" required
            style="width: 100%; padding: 8px;">
    </div>

    <button type="submit"
        style="padding: 10px; background-color: #28a745; color: white; border: none; cursor: pointer; font-size: 16px;">Crear
        Usuario</button>
</form>

<div style="margin-top: 20px;">
    <a href="/users" style="text-decoration: none; color: #007bff;">&larr; Volver a la lista</a>
</div>