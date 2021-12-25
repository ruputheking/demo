<table class="table table-bordered">
    <tr>
        <td>Vacation Name</td>
        <td>
            <?php echo $type[0]['title']; ?>
        </td>
    </tr>
    <tr>
        <td>Vacation Days</td>
        <td>
            <?php echo $type[0]['vacation']; ?>
        </td>
    </tr>
    <tr>
        <td>Per</td>
        <td>
            <?php echo $type[0]['per_type']; ?>
        </td>
    </tr>
    <tr>
        <td>Created</td>
        <td>
            <?php echo date('d M Y', strtotime($type[0]['created_at'])); ?>
        </td>
    </tr>
</table>
