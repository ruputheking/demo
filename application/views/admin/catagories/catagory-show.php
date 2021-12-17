<table class="table table-bordered">
    <tr>
        <td>Name</td>
        <td>
            <?php echo $catagory[0]['catagory_name']; ?>
        </td>
    </tr>
    <tr>
        <td>Created</td>
        <td>
            <?php echo date('d M Y', strtotime($catagory[0]['created_at'])); ?>
        </td>
    </tr>
</table>
