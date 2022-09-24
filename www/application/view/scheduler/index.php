<div class="page-content">
    
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Scheduler</h4>
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
        <div class="col-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th class="pt-0">#</th>
                                    <th class="pt-0">Task name</th>
                                    <th class="pt-0">Text preset</th>
                                    <th class="pt-0">Graphic preset</th>
                                    <th class="pt-0">Group</th>
                                    <th class="pt-0">Duration</th>
                                    <th class="pt-0">Status</th>
                                    <th class="pt-0">Action</th>
                                    <th class="pt-0">Logs</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>127.0.0.1</td>
                                    <td>127.0.0.1</td>
                                    <td>127.0.0.1</td>
                                    <td>127.0.0.1</td>
                                    <td>127.0.0.1</td>
                                    <td><span class="badge bg-success">Online</span></td>
                                    <td><span class="badge bg-success">Online</span></td>
                                    <td>View logs</td>                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>
        </div>
    </div> <!-- row -->

    <!-- Modal -->
    <div class="modal fade" id="addServersModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add new scheduler</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form id="graphic_preset_modal">
                        <input type="hidden" name="id" value="0" />
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="name" class="form-label">Task name:</label>
                                <input type="text" class="form-control" id="name" name="name" />
                            </div>
                            <div class="col-6 mb-3">
                                <label for="text_preset" class="form-label">Text preset:</label>
                                <select class="form-select" id="text_preset">
                                    <option selected>Select text preset</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="graphic_preset" class="form-label">Graphic preset:</label>
                                <select class="form-select" id="graphic_preset">
                                    <option selected>Select graphic preset</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>                            
                            <div class="col-6 mb-3">
                                <label for="group" class="form-label">Group:</label>
                                <select class="form-select" id="group">
                                    <option selected>Select channel group</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="duration" class="form-label">Duration:</label>
                                <input type="text" class="form-control" id="duration" name="duration" placeholder="milliseconds" />
                            </div>
                            <div class="col-4 mb-3">
                                <label for="start_time" class="form-label">Start time:</label>
                                <!-- <input type="text" class="form-control" id="start_time" name="start_time" /> -->
                                <div class="form-group">
                                    <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input datetimepicker1" data-target="#datetimepicker1"/>
                                        <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                            <div class="input-group-text" style="height:38px;"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" value="" id="start_time_check">
                                    <label class="form-check-label" for="start_time_check">
                                        Now
                                    </label>
                                </div>
                            </div>
                            <div class="col-4 mb-3">
                                <label for="end_time" class="form-label">End time:</label>
                                <!-- <input type="text" class="form-control" id="end_time" name="end_time" /> -->
                                <div class="form-group">
                                    <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input datetimepicker2" data-target="#datetimepicker2"/>
                                        <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                                            <div class="input-group-text" style="height:38px;"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" value="" id="end_time_check">
                                    <label class="form-check-label" for="end_time_check">
                                        Infinite
                                    </label>
                                </div>
                            </div>
                            <div class="col-4 mb-3">
                                <label for="period" class="form-label">Period:</label>
                                <input type="number" min="5" class="form-control" id="period" name="period" />
                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" value="" id="period_check">
                                    <label class="form-check-label" for="period_check">
                                        Infinite
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="addGraphicPreset">
                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function() {
        'use strict';

            $('#datetimepicker1').datetimepicker({
                locale: 'ru',
                format: 'DD.MM.YYYY HH:mm'
            });
            $('#datetimepicker2').datetimepicker({
                useCurrent: false,
                locale: 'ru',
                format: 'DD.MM.YYYY HH:mm'
            });
            $("#datetimepicker1").on("change.datetimepicker", function (e) {
                $('#datetimepicker2').datetimepicker('minDate', e.date);
            });
            $("#datetimepicker2").on("change.datetimepicker", function (e) {
                $('#datetimepicker1').datetimepicker('maxDate', e.date);
            });

            $('#start_time_check').on('change', function (e) {
                if (e.target.checked)
                {
                    $('.datetimepicker1').val(moment().format('DD.MM.YYYY HH:mm')).attr('disabled', true);                    
                } else {
                    $('.datetimepicker1').val('').attr('disabled', false);
                }
            })

            $('#end_time_check').on('change', function (e) {
                if (e.target.checked)
                {
                    $('.datetimepicker2').val('').attr('disabled', true);
                } else {
                    $('.datetimepicker2').val('').attr('disabled', false);
                }
            })

            $('#period_check').on('change', function (e) {
                if (e.target.checked)
                {
                    $('#period').val('').attr('disabled', true);
                } else {
                    $('#period').val('').attr('disabled', false);
                }
            })

        });
    </script>