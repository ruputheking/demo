<form class="appsvan-submit" action="leaveapplications/update/<?php echo $application['application'][0]['id']; ?>" method="post">
    <div class="row">
        <div class="form-group col-md-12">
            <label class="control-label">Subject <span class="required">*</span></label>
            <input type="text" class="form-control my-2" name="subject" value="<?php echo $application['application'][0]['title'] ?>" required>
        </div>
        <div class="form-group col-md-12">
            <label class="control-label">Leave Type <span class="required">*</span></label>
            <select class="form-control my-2" name="leave_type">
                <option value="">Select One</option>
                <?php foreach ($types['types'] as $key => $type): ?>
                    <option <?php if ($type['id'] == $application['application'][0]['leave_type']): ?>
                        <?php echo 'selected'; ?>
                    <?php endif; ?> value="<?php echo $type['id']; ?>"><?php echo $type['title']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label class="control-label">From <span class="required">*</span></label>
            <input type="date" class="form-control mb-2" value="<?php echo $application['application'][0]['from_date']; ?>" name="from_date">
        </div>
        <div class="form-group col-md-6">
            <label class="control-label">To <span class="required">*</span></label>
            <input type="date" class="form-control mb-2" name="to_date" value="<?php echo $application['application'][0]['to_date']; ?>">
        </div>
        <div class="form-group col-md-12">
            <label class="control-label">Description <span class="required">*</span></label>
            <textarea name="description" rows="8" cols="80" required class="form-control"><?php echo $application['application'][0]['description'] ?></textarea>
        </div>
        <div class="form-group col-md-12 mt-4">
            <button type="submit" class="btn btn-success btn-sm" name="submit">Resend Request</button>
        </div>
    </div>
</form>
