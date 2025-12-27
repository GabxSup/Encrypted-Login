<div style="text-align: right; margin-bottom: 20px;">
    <span>Usuario ID: <?= $_SESSION['user_id'] ?? '?' ?></span> |
    <a href="/logout" style="color: red;">Cerrar sesión</a>
</div>

<h1>Usuarios</h1>

<a href="/users/create">Crear usuario</a>

<ul>
    <?php foreach ($users as $user): ?>
        <li>
            <a href="/users/<?= $user['id'] ?>">
                <?= htmlspecialchars($user['email']) ?>
            </a>
        </li>
    <?php endforeach ?>
</ul>