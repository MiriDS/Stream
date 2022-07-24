    <div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Users</h4>
            </div>
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0" data-bs-toggle="modal" data-bs-target="#addUserModal">
                    <i class="btn-icon-prepend" data-feather="plus"></i>
                    Add new user
                </button>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12 col-xl-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                <tr>
                                    <th class="pt-0">#</th>
                                    <th class="pt-0">Name</th>
                                    <th class="pt-0">Username</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $count = 1;
                                    foreach ($users as $user) {                                        
                                        print '<tr>
                                            <td>'.$count++.'</td>
                                            <td>'.$user->name.'</td>
                                            <td>'.$user->username.'</td>
                                        </tr>';
                                    }
                                ?>                                
                                </tbody>
                            </table>
                        </div>
                    </div> 
                </div>
            </div>
        </div> <!-- row -->

        <!-- Modal -->
        <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Add new user</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="name">
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username:</label>
                                <input type="text" class="form-control" id="username">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="text" class="form-control" id="password">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <div id="error" class="alert-danger f-left" role="alert">

                        </div>
                        <button type="button" class="btn btn-primary" id="addUser">
                            <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                            Add
                        </button>
                    </div>
                </div>
            </div>
        </div>



        <script>


            jQuery(function () {

                $('#addUser').on('click', function() {
                    
                    $('#addUser span').removeClass('d-none');
                    
                    var correct = true,
                        name = $('#name').val(),
                        username = $('#username').val(),
                        password = $('#password').val();

                    if (typeof name === 'undefined' || name === '') {
                        $('#addUser span').addClass('d-none');

                        $('#name').css('border-color', '#ff3366');

                        setTimeout(() => {
                            $('#name').css('border-color', '#e9ecef');
                        }, 1500);

                        return;
                    } else if (typeof username === 'undefined' || username === '') {
                        $('#addUser span').addClass('d-none');

                        $('#username').css('border-color', '#ff3366');

                        setTimeout(() => {
                            $('#username').css('border-color', '#e9ecef');
                        }, 1500);

                        return;
                    } else if (typeof password === 'undefined' || password === '') {
                        $('#addUser span').addClass('d-none');

                        $('#password').css('border-color', '#ff3366');

                        setTimeout(() => {
                            $('#password').css('border-color', '#e9ecef');
                        }, 3000);

                        return;
                    }

                    if (correct) {
                        var data = new FormData();                
                        
                        data.append('username', username);
                        data.append('name', name);
                        data.append('password', password);
                        
                        $.ajax(
                        {
                            url: '<?php echo URL;?>users/add',
                            data: data,
                            cache: false,
                            contentType: false,
                            processData: false,
                            type: 'POST'
                        })
                        .done(function(result)
                        {
                            $('#addUser span').addClass('d-none');

                            if(result === 'success')
                            {
                                location.reload();
                            }
                            else if (result === 'exist')
                            {                                

                                $('#error').html('Username already exists');

                                setTimeout(() => {
                                    $('#error').html('');
                                }, 5000);
                            }
                        });
                    }
                })
            })


        </script>