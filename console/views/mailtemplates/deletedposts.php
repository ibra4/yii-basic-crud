<h1>Deleted Posts Report</h1>
<h3>The flowoing posts have been deleted</h3>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>title</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($posts as $post) { ?>
            <tr>
                <td><?= $post->id ?></td>
                <td><?= $post->title ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>