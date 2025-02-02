<h2 class="mx-3 mb-2">Search Results</h2>
<?php if(!empty($clients)): ?>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php foreach ($clients as $client):?>
        <tr>
            <td><?= $client['client_id'] ?></td>
            <td><?= $client['name'] ?></td>
            <td><?= $client['address'] ?></td>
            <td><?= $client['phone'] ?></td>
            <td><?= $client['email'] ?></td>
            <td><a href="index.php?action=edit&id=<?= $client['client_id'] ?>" class="btn btn-warning"><b>Edit</b></a></td>
            <td><a href="index.php?action=delete&id=<?= $client['client_id'] ?>" class="btn btn-danger"><b>Delete</b></a></td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <tr>
        <td colspan="7" class="text-center">
            <b>No results</b>
        </td>
    </tr>
<?php endif; ?>