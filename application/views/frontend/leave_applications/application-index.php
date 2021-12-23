@extends(layouts/frontend/main)

@section(content)
<input type="hidden" name="href" value="leaveapplications/list">
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default bg-dark text-white">
                <div class="card-header">
                    <div class="card-title mb-0">
                        Leave Application List
                        <a href="leaveapplications/create" class="btn btn-primary btn-sm float-end ajax-modal" data-title="Take a Leave">Take a Leave</a>
                    </div>
                </div>
                <div class="card-body">
                    <div id="table-data"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
