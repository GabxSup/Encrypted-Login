<h1>Usuario #<?= $user['id'] ?></h1>

<p>Email: <?= htmlspecialchars($user['email']) ?></p>

<a href="/users">Volver</a>

<a href="/users/<?= $user['id'] ?>/edit">Editar</a>

