@extends(layouts/frontend/main)

@section(content)
<input type="hidden" name="href" value="welcome/catagories">
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default bg-dark text-white">
                <div class="card-header">
                    <div class="card-title">
                        Catagory List
                        <div class="float-end">
                            <a href="welcome/create" data-title="Create new Catagory" class="btn btn-primary btn-sm ajax-modal">Add New Catagory</a>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <div id="table-data">

                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection
