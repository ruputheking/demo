<form class="appsvan-submit" action="leaveapplications/store" method="post">
    <div class="row">
        <div class="form-group col-md-12">
            <label class="control-label">Subject <span class="required">*</span></label>
            <input type="text" class="form-control my-2" name="subject" required>
        </div>
        <div class="form-group col-md-6">
            <label class="control-label">From <span class="required">*</span></label>
            <input type="date" class="form-control mb-2" name="from_date">
        </div>
        <div class="form-group col-md-6">
            <label class="control-label">To <span class="required">*</span></label>
            <input type="date" class="form-control mb-2" name="to_date">
        </div>
        <div class="form-group col-md-12">
            <label class="control-label">Description <span class="required">*</span></label>
            <textarea name="description" rows="8" cols="80" required class="form-control"></textarea>
        </div>
        <div class="form-group col-md-12 mt-4">
            <button type="submit" class="btn btn-success btn-sm" name="submit">Take a Leave</button>
        </div>
    </div>
</form>
