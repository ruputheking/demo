<form class="appsvan-submit" action="menu/update" method="post">
    <input type="hidden" name="menu_id" value="<?php echo $menu[0]['id']; ?>">
    <div class="form-group">
        <label class="control-label mb-2">Title</label>
        <input type="text" name="title" required class="form-control" value="<?php echo $menu[0]['title'] ?>">
    </div>
    <div class="form-group mt-2">
        <label class="control-label mb-2">Catagory Name</label>
        <select class="form-control" name="catagory_id">
            <option value="">Select One</option>
            <?php foreach ($catagories as $catagory): ?>
                <option <?php if ($catagory['id'] == $menu[0]['catagory_id']): ?>
<?php echo 'selected' ?>
                <?php endif; ?> value="<?php echo $catagory['id']; ?>">
                    <?php echo $catagory['catagory_name'] ?>
                </option>

            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group mt-2">
        <label class="control-label mb-2">Description</label>
        <textarea name="description" rows="8" cols="80" class="form-control"><?php echo $menu[0]['description'] ;?></textarea>
    </div>
    <div class="form-group mt-4">
        <button type="submit" class="btn btn-success btn-sm " name="submit">Save Menu</button>
    </div>
</form>
