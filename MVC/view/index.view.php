

    <h1>Hello, world!</h1>
    
    <table class = "table">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Adresse</th>
        </tr>
        <?php foreach ($users as $user) : ?>
        <tr>
            <td><?= $user->getId(); ?></td>
            <td><?= $user->getLastname(); ?></td>
            <td><?= $user->getFirstname(); ?></td>
            <td><?= $user->getEmail(); ?></td>
            <td><?= $user->getAdress(); ?></td>
        </tr>
        <?php endforeach ?>
    </table>

    

