<form class="appsvan-submit" action="menu/store" method="post">
    <div class="form-group">
        <label class="control-label mb-2">Title</label>
        <input type="text" name="title" required class="form-control">
    </div>
    <div class="form-group mt-2">
        <label class="control-label mb-2">Catagory Name</label>
        <select class="form-control" name="catagory_id">
            <option value="">Select One</option>
            <?php foreach ($catagories as $catagory): ?>
                <option value="<?php echo $catagory['id']; ?>">
                    <?php echo $catagory['catagory_name'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group mt-2">
        <label class="control-label mb-2">Description</label>
        <textarea name="description" rows="8" cols="80" class="form-control"></textarea>
    </div>
    <div class="form-group mt-4">
        <button type="submit" class="btn btn-success btn-sm " name="submit">Save Menu</button>
    </div>
</form>
