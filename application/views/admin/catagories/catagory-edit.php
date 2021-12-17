<form class="appsvan-submit" action="welcome/update/<?php echo $catagory[0]['id']; ?>" method="post">
    <input type="hidden" name="catagory_id" value="<?php echo $catagory[0]['id']; ?>">
    <div class="form-group">
        <label class="control-label">Catagory Name</label>
        <input type="text" class="form-control mt-2" name="catagory_name" value="<?php echo $catagory[0]['catagory_name']; ?>">
    </div>
    <div class="form-group mt-4">
        <button type="submit" class="btn btn-success btn-sm " name="submit">Update Catagory</button>
    </div>
</form>
