<form class="appsvan-submit" action="leavetypes/update/<?php echo $type[0]['id']; ?>" method="post">
    <div class="form-group">
        <label class="control-label">Vacation Title</label>
        <input type="text" class="form-control mt-2" name="title" value="<?php echo $type[0]['title']; ?>" required>
    </div>
    <div class="form-group">
        <label class="control-label">Vacation Days</label>
        <input type="number" class="form-control mt-2" name="vacation" value="<?php echo $type[0]['vacation']; ?>" required>
    </div>
    <div class="form-group">
        <label class="control-label">Per</label>
        <select class="form-control" name="per_type" required>
            <option value="">Select One</option>
            <option <?php if ($type[0]['per_type'] == 'Week'): ?>
    <?php echo 'selected' ?>
            <?php endif; ?> value="Week">Week</option>
            <option <?php if ($type[0]['per_type'] == 'Month'): ?>
                <?php echo 'selected' ?>
            <?php endif; ?> value="Month">Month</option>
            <option <?php if ($type[0]['per_type'] == 'Year'): ?>
                <?php echo 'selected' ?>
            <?php endif; ?> value="Year">Year</option>
        </select>
    </div>
    <div class="form-group mt-4">
        <button type="submit" class="btn btn-success btn-sm" name="submit">Update Vacation</button>
    </div>
</form>
