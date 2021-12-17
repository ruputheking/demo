<table class="table table-bordered">
    <tr>
        <td>Menu Name</td>
        <td><?php echo $menu[0]['title']; ?></td>
    </tr>
    <tr>
        <td>Catagory Name</td>
        <td>
            <?php echo $menu[0]['catagory_name']; ?>
        </td>
    </tr>
    <tr>
        <td>Created</td>
        <td>
            <?php echo date('d M Y', strtotime($menu[0]['created_at'])); ?>
        </td>
    </tr>
    <tr>
        <td>Description</td>
        <td>
            <?php echo $menu[0]['description']; ?>
        </td>
    </tr>
</table>
