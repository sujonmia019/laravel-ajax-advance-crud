<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- toastr css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>CRUD Application</title>
    <style>
        label.required::after{
            content: '*';
            color: red;
        }
        .toast-info {
            background-color: #3276b1;
        }
        .toast-error {
            background-color: #bd362f;
        }
        .toast-success {
            background-color: #51a351;
        }
        .toast-warning {
            background-color: #f89406;
        }
    </style>
  </head>
  <body>

    <section class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0 d-flex align-items-center justify-content-between">User List
                                <button type="button" class="btn btn-sm btn-primary" onclick="showFormModal('Add User','Save')">Add New user</button>
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-response">
                                <table class="table table-sm table-striped table-hover">
                                    <thead>
                                        <th>SL</th>
                                        <th>Avatar</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile No</th>
                                        <th>Status</th>
                                        <th>Created By</th>
                                        <th>Updated By</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('modal')

    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    {{-- toastr js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        function notification(status,message){
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }

            switch (status) {
                case 'success':
                    toastr.success(message)
                    break;
                case 'error':
                    toastr.error(message)
                    break;
                case 'info':
                    toastr.info(message)
                    break;
                case 'warning':
                    toastr.warning(message)
                    break;
            }
        }

        var formModal = new bootstrap.Modal(document.getElementById('store_or_update_modal'),{
            keyboard: false,
            backdrop: 'static'
        });

        // modal open
        function showFormModal(modal_title, btn_title){
            $('#store_or_update_form')[0].reset();
            $('#modal-title').text(modal_title);
            $('#save-btn').text(btn_title);
            formModal.show();
        }

        $(document).on('click','button#save-btn', function(){
            var formId = document.getElementById('store_or_update_form');
            var form = new FormData(formId);

            $.ajax({
                url: "{{ route('user.store_or_update') }}",
                type: "POST",
                data: form,
                dataType: "JSON",
                processData: false,
                contentType: false,
                success: function(response){
                    if (response.status == 'success') {
                        notification(response.status,response.message);
                        formModal.hide();
                    }

                    if (response.status == 'error') {
                        notification(response.status,response.message);
                    }
                }
            });
        });
    </script>
  </body>
</html>
