$(function() {
    function dataTableDemo() {
        $(".data-table").DataTable({
            responsive: true,
            "bAutoWidth":false,
            "ordering": false,
            "language": {
               "decimal":        "",
               "emptyTable":     "No Data Found",
               "info":           "Showing _START_ To _END_ Of _TOTAL_ Entries",
               "infoEmpty":      "Showing 0 To 0 Of 0 Entries",
               "infoFiltered":   "(filtered from _MAX_ total entries)",
               "infoPostFix":    "",
               "thousands":      ",",
               "lengthMenu":     "Show _MENU_ Entries",
               "loadingRecords": "Loading...",
               "processing":     "Processing...",
               "search":         "Search",
               "zeroRecords":    "No Matching Records Found",
               "paginate": {
                  "first":      "First",
                  "last":       "Last",
                  "next":       "Next",
                  "previous":   "Previous"
              },
              dom: 'Blfrtip',
              "aria": {
                  "sortAscending":  ": activate to sort column ascending",
                  "sortDescending": ": activate to sort column descending"
              }
          },
        });
    }
    function loadData() {
        var link = $('input[name="href"]').val();
        $.ajax({
            url: link,
            type: 'GET',
            success: function(data) {
                $("#table-data").html(data);
                dataTableDemo();
            }
        });
    }

    $(document).on('load', '.class',function() {
        loadData();
    });
    loadData();

    $(document).on("click", ".ajax-modal", function() {

        var link = $(this).attr("href");
        var title = $(this).data("title");
        $.ajax({
            url: link,
            success: function(data) {
                $('#main_modal .modal-title').html(title);
                $('#main_modal .modal-body').html(data);
                $('#main_modal').modal('show');
            }
        });
        return false;
    });

    $(document).on("click", ".ajax-delete", function() {
        event.preventDefault();
        var link = $(this).attr("href");
        $.ajax({
            url: link,
            success: function(data) {
                if (data == 1) {
                    toastr.success("Successfully deleted");
                    loadData();
                }
            }
        });
    });

    $(document).on("submit",".appsvan-submit",function(){
        event.preventDefault();
        var elem = $(this);
        var link = $(this).attr("action");
        var catagory_name = $("input[name='catagory_name']").val();
        if (catagory_name == '') {
            toastr.error("Catagory Field is required");
        }else {
            $.ajax({
                method: "POST",
                url: link,
                data:  new FormData(this),
                mimeType:"multipart/form-data",
                contentType: false,
                cache: false,
                processData:false,
                success: function(data){
                    if (data == 1) {
                        $('form').trigger("reset");
                        toastr.success("Successfully Added");
                        loadData();
                    }
                    if (data == 0) {
                        toastr.success("Successfully Updated");
                        loadData();
                    }
                }
            });
        }
    });
});
