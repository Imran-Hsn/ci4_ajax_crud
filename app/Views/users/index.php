<div class="container mt-4">
    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="name" placeholder="Name">
                            <label for="name">Name</label> <span id="error_name" class="text-danger"></span>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" placeholder="name@example.com">
                            <label for="email">Email address</label> <span id="error_email" class="text-danger"></span>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="phone" placeholder="Phone">
                            <label for="phone">Phone</label> <span id="error_phone" class="text-danger"></span>
                        </div>

                        <div class="form-floating">
                            <input type="password" class="form-control" id="password" placeholder="Password">
                            <label for="password">Password</label> <span id="error_password" class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="userData btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <div class="card">
    <div class="card-header">
        <div class="row">
            <h5>Featured
                <a href="" class="btn btn-info float-end px-4" data-bs-toggle="modal" data-bs-target="#addModal">Add</a>
            </h5>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Phone</th>
                </thead>
            </tr>
        <tbody class="user_data">
            
        </tbody>
        </table>
        
    </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $(document).on("click", ".userData", function(){
            //name validation
            var name = $('#name').val();
            if($.trim(name).length == 0) {
                error_name = 'Please Enter Name';
                $('#error_name').text(error_name);
            }
            else {
                error_name = '';
                $('#error_name').text(error_name);
            }

            //email validation
            if($.trim($(email).val()).length == 0) {
                error_email = 'Please Enter E-mail';
                $('#error_email').text(error_email);
            }
            else {
                error_email = '';
                $('#error_email').text(error_email);
            }

            //phone validation
            var phone = $('#phone').val();
            phoneNO = $.trim(phone).length;
            if(phoneNO == 0 || phoneNO < 11) {
                var error_phone = 'Please Enter Valid Phone Number';
                $('#error_phone').text(error_phone);
            }
            else {
                error_phone = '';
                $('#error_phone').text(error_phone);
            }

            //password validation
            if($.trim($(password).val()).length == 0) {
                error_password = 'Please Enter Password';
                $('#error_password').text(error_password);
            }
            else {
                error_password = '';
                $('#error_password').text(error_password);
            }

            if(error_name != '' || error_email != '' || error_phone != '' || error_password != '') {
                return false;
            }
            else {
                var data = {
                    'name' : $('#name').val(),
                    'email' : $('#email').val(),
                    'phone' : $('#phone').val(),
                    'password' : $('#password').val()
                };

                var base_url = 'http://localhost/ci4_ajax_crud/public/';
                $.ajax({
                    type: "POST",
                    url: base_url + "/user/store",
                    data: data,
                    // dataType: "dataType",
                    success: function (response) {
                        $('#addModal').modal('hide');
                        $('#addModal').find('input').val();

                        alert(response.status);
                    }
                });
            }
        });

        // Call fetchUserData function
        fetchUserData();
        // Fetch data from database
        function fetchUserData() {
            $.ajax({
                type: "GET",
                url: "<?php echo base_url('user/get-data') ?>",
                success: function (response) {
                    // console.log(response.user);
                    $.each(response.user, function(index, value) {
                        $('.user_data').append(
                            '<tr>\
                                <td>'+ value['id'] + '</td>\
                                <td>'+ value['name'] + '</td>\
                                <td>'+ value['email'] + '</td>\
                                <td>'+ value['phone'] + '</td>\
                                <td>\
                                    <a href="" class="badge btn-info"> View</a> \
                                    <a href="" class="badge btn-primary"> Edit</a> \
                                    <a href="" class="badge btn-danger"> Delete</a> \
                                <td>\
                                </tr>'
                        );
                    });
                }
            });
        }
        
    }); 
    
</script>