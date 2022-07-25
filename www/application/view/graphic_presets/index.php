<link rel="stylesheet" href="<?php echo URL; ?>vendors/bootstrap-colorpicker/bootstrap-colorpicker.min.css">

<div class="page-content">
    
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Graphic presets</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0" data-bs-toggle="modal" data-bs-target="#addServersModal">
                <i class="btn-icon-prepend" data-feather="plus"></i>
                Add new preset
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
                                    <th class="pt-0">Preset name</th>
                                    <th class="pt-0">Number of channels</th>
                                    <th class="pt-0" width="100px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Name</td>
                                    <td>
                                        5
                                    </td>                                    
                                    <td>
                                        <button type="button" class="btn btn-info btn-xs">Edit</button>
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
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add new preset</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="name" />
                            </div>
                            <div class="col-6 mb-3">
                                <label for="passes" class="form-label">Passes count:</label>
                                <input type="text" class="form-control" id="passes" />
                            </div>
                            <div class="col-6 mb-3">
                                <label for="pause" class="form-label">Pause between passes (seconds):</label>
                                <input type="text" class="form-control" id="pause" />
                            </div>
                            <div class="col-6 mb-3">
                                <div id="cp1" class="input-group mb-2" title="Using input value">
                                    <label for="pause" class="form-label">Font Color:</label>
									<input type="text" class="form-control" value="#DD0F20"/>
                                    <span class="input-group-text colorpicker-input-addon"><i></i></span>
								</div>
                            </div>
                            <div class="col-6 mb-3">
                                <div id="cp2" class="input-group mb-2" title="Using input value">
                                <label for="pause" class="form-label">Background color:</label>
									<input type="text" class="form-control" value="#DDDDDD"/>
                                    <span class="input-group-text colorpicker-input-addon"><i></i></span>
								</div>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="margin" class="form-label">Bottom margin (px):</label>
                                <input type="text" class="form-control" id="margin" />
                            </div>
                            <div class="col-6 mb-3">
                                <label for="fontSize" class="form-label">Font size:</label>
                                <input type="text" class="form-control" id="fontSize" />
                            </div>
                            <div class="col-6 mb-3">
                                <label for="padding" class="form-label">Text padding (px):</label>
                                <input type="text" class="form-control" id="padding" />
                            </div>
                            <div class="col-6 mb-3">
                                <label for="speed" class="form-label">Text speed (sym/min):</label>
                                <input type="text" class="form-control" id="speed" />
                            </div>
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

    <!-- Plugin js for this page -->
	<script src="<?php echo URL; ?>vendors/inputmask/jquery.inputmask.min.js"></script>
    <script src="<?php echo URL; ?>vendors/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
	<!-- End plugin js for this page -->

    <script>
        (function($) {
        'use strict';

        // initializing inputmask
        $(":input").inputmask();
        $('#cp1').colorpicker();
        $('#cp2').colorpicker();

        })(jQuery);
    </script>