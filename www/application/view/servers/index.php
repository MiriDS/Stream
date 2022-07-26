<div class="page-content">
    
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Servers</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <a href="/servers" type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
                <i class="btn-icon-prepend" data-feather="refresh-ccw"></i>
                Refresh
            </a>
            <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0" data-bs-toggle="modal" data-bs-target="#addServersModal">
                <i class="btn-icon-prepend" data-feather="plus"></i>
                Add new server
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-8 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th class="pt-0">#</th>
                                    <th class="pt-0">IP Address</th>
                                    <th class="pt-0">Status</th>
                                    <th class="pt-0">Info</th>
                                    <th width="100px" class="pt-0">Tools</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $count = 1;
                            foreach ($servers as $server) {
                                print '<tr sid="'.(int)$server->id.'">
                                            <td>'.$count++.'</td>
                                            <td>'.htmlspecialchars($server->ip_address).'</td>
                                            <td><span class="badge bg-success">Online</span></td>
                                            <td>Server information</td>
                                            <td>
                                                <button type="button" class="delete btn btn-danger btn-xs">Delete</button>
                                            </td>
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
    <div class="modal fade" id="addServersModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add new server</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="ipaddress" class="form-label">IP address:</label>
                            <input type="text" class="form-control" id="ipaddress" data-inputmask-alias="***.***.***.***" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <div id="error" class="alert-danger f-left" role="alert">

                    </div>
                    <button type="button" class="btn btn-primary" id="addServer">
                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        Add
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        (function($) {
        'use strict';

            $('.delete').on('click', function() {
                var sid = $(this).closest('tr').attr('sid');

                if (confirm("Silmek isteyinizde eminsiniz?") == true) {
                    var data = new FormData();
                    data.append('id', sid);
                    $.ajax(
                        {
                            url: '<?php echo URL;?>servers/remove',
                            data: data,
                            cache: false,
                            contentType: false,
                            processData: false,
                            type: 'POST'
                        })
                        .done(function(result)
                        {
                            $('#addServer span').addClass('d-none');

                            if(result === 'success')
                            {
                                location.reload();
                            }
                        });
                }
            });

            $('#addServer').on('click', function() {

                $('#addServer span').removeClass('d-none');

                var correct = true,
                    ipaddress = $('#ipaddress').val();

                if (typeof ipaddress === 'undefined' || ipaddress === '') {
                    $('#addServer span').addClass('d-none');

                    $('#ipaddress').css('border-color', '#ff3366');

                    setTimeout(() => {
                        $('#ipaddress').css('border-color', '#e9ecef');
                    }, 1500);

                    return;
                }

                if (correct) {
                    var data = new FormData();

                    data.append('ip', ipaddress);

                    $.ajax(
                        {
                            url: '<?php echo URL;?>servers/add',
                            data: data,
                            cache: false,
                            contentType: false,
                            processData: false,
                            type: 'POST'
                        })
                        .done(function(result)
                        {
                            $('#addServer span').addClass('d-none');

                            if(result === 'success')
                            {
                                location.reload();
                            }
                            else if (result === 'exist')
                            {

                                $('#error').html('Server already exists');

                                setTimeout(() => {
                                    $('#error').html('');
                                }, 5000);
                            }
                        });
                }
            })

        // initializing inputmask
        //$(":input").inputmask();

        })(jQuery);
    </script>


    <!-- Plugin js for this page -->
	<script src="<?php echo URL; ?>vendors/inputmask/jquery.inputmask.min.js"></script>
	<!-- End plugin js for this page -->