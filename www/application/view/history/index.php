<div class="page-content">
    
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">History</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
                <i class="btn-icon-prepend" data-feather="refresh-ccw"></i>
                Refresh
            </button>
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
                                <tr>
                                    <td>1</td>
                                    <td>127.0.0.1</td>
                                    <td><span class="badge bg-success">Online</span></td>
                                    <td>Server information</td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-xs">Delete</button>
                                    </td>
                                </tr>
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
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        (function($) {
        'use strict';

        // initializing inputmask
        $(":input").inputmask();

        })(jQuery);
    </script>


    <!-- Plugin js for this page -->
	<script src="<?php echo URL; ?>vendors/inputmask/jquery.inputmask.min.js"></script>
	<!-- End plugin js for this page -->