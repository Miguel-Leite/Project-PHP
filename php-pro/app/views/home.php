<h1>PÁGINA HOME</h1>
<h4>Users</h4>

<ul>
    <?php foreach ($users as $user): ?>
    <li> <?=$user->name?> | <a href="/user/<?=$user->id?>">Detalhes</a>  </li>
    <?php endforeach; ?>
</ul>