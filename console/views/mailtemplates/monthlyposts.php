<h1>Posts Monthly Reports</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Posts</th>
            <th>Active posts</th>
            <th>Inactive posts</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($posts as $post) { ?>
            <tr>
                <td><?= $post['mid'] ?></td>
                <td><?= $post['name'] ?></td>
                <td><?= $post['all_posts'] ?></td>
                <td><?= $post['active_posts'] ?></td>
                <td><?= $post['inactive_posts'] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>