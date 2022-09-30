<div class="page-content">
    
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Scheduler</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0" data-bs-toggle="modal" data-bs-target="#addScheduleTaskModal">
                <i class="btn-icon-prepend" data-feather="plus"></i>
                Add new task
            </button>
        </div>
    </div>
    <?php
        $repeat = isset($_POST['repeat']) && is_numeric($_POST['repeat']) && (int)$_POST['repeat']>0 ? (int)$_POST['repeat'] : 0;
    ?>
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
                            <?php
                                $scheduler = $this->model->getScheduler(1);
                                $count = 1;
                                foreach ($scheduler as $item) {
                                    $status = $this->model->getScheduledTaskStatus($item);
                                    $actionBtn = '';
                                    $statusBtn = '';
                                    if($status == 0) {
                                        $actionBtn = '<a status="1" class="change-status btn btn-success btn-xs"> Run </a>';
                                        $statusBtn = '<span class="badge bg-success">Created</span></td>';
                                    }
                                    if($status == 1) {
                                        $actionBtn .= '<a status="2" class="change-status btn btn-warning btn-xs" style="color: white"> Pause </a>';
                                        $statusBtn = '<span class="badge bg-info">Running</span></td>';
                                    }
                                    if($status == 2) {
                                        $actionBtn .= '<a status="1" class="change-status btn btn-success btn-xs" style="color: white"> Resume </a>';
                                        $statusBtn = '<span class="badge bg-black">Suspended</span></td>';
                                    }
                                    if($status == 4) {
                                        $statusBtn = '<span class="badge bg-warning">Pending</span></td>';
                                    }
                                    if($status == 5) {
                                        $statusBtn = '<span class="badge bg-danger">Finished</span></td>';
                                    }

                                    $actionBtn .= '<a status="3" style="margin-left:5px" class="change-status btn btn-danger btn-xs" style="color: white"> Cancel </a>';

                                    print '
                                        <tr sid="'.(int)$item['id'].'" >
                                            <td>'.$count++.'</td>
                                            <td>'.htmlspecialchars($item['name']).'</td>
                                            <td>'.htmlspecialchars($item['text_preset_name']).'</td>
                                            <td>'.htmlspecialchars($item['graphic_preset_name']).'</td>
                                            <td>'.htmlspecialchars($item['group_name']).'</td>
                                            <td>'.(int)($item['duration']).'</td>
                                            <td>'.$statusBtn.'</td>
                                            <td>'.$actionBtn.'</td>
                                            <td><ddd class="view-logs"> View logs </ddd></td>
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
    <div class="modal fade" id="addScheduleTaskModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add new scheduler</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form id="scheduler_modal_form">
                        <input type="hidden" name="id" value="0" />
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="name" class="form-label">Task name:</label>
                                <input type="text" class="form-control" id="name" name="name" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 mb-3">
                                <label for="text_preset" class="form-label">Text preset:</label>
                                <select class="form-select" id="text_preset" name="text_preset">
                                    <option selected>Select text preset</option>
                                    <?php
                                        foreach ($textPresets as $textPreset) {
                                            print '<option value="'.(int)$textPreset['id'].'">'.htmlspecialchars($textPreset['name']).'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-4 mb-3">
                                <label for="graphic_preset" class="form-label">Graphic preset:</label>
                                <select class="form-select" id="graphic_preset" name="graphic_preset">
                                    <option selected>Select graphic preset</option>
                                    <?php
                                        foreach ($graphicPresets as $graphicPreset) {
                                            print '<option value="'.(int)$graphicPreset['id'].'">'.htmlspecialchars($graphicPreset['name']).'</option>';
                                        }
                                    ?>
                                </select>
                            </div>                            
                            <div class="col-4 mb-3">
                                <label for="group" class="form-label">Group:</label>
                                <select class="form-select" id="group" name="group">
                                    <option selected>Select channel group</option>
                                    <?php
                                        foreach ($chGroups as $chGroup) {
                                            print '<option value="'.(int)$chGroup['id'].'">'.htmlspecialchars($chGroup['name']).'</option>';
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="col-4 mb-3">
                                <label for="start_time" class="form-label">Start time:</label>
                                <div class="form-group">
                                    <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                        <input type="text" name="start_time" class="form-control datetimepicker-input datetimepicker1" data-target="#datetimepicker1"/>
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
                                <div class="form-group">
                                    <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                                        <input type="text" name="end_time" class="form-control datetimepicker-input datetimepicker2" data-target="#datetimepicker2"/>
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
                    <button type="button" class="btn btn-primary" id="addScheduleTask">
                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="scheduleLogsModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Logs</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <table class="table table-hover mb-0" id="logs_table">
                                <thead>
                                <tr>
                                    <th class="pt-0">#</th>
                                    <th class="pt-0">Date</th>
                                    <th class="pt-0">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                    $('.datetimepicker1').val(moment().format('DD.MM.YYYY HH:mm'));//.attr('disabled', true);
                } else {
                    $('.datetimepicker1').val('');
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
        var repeat = <?php print "$repeat";?>

        if(repeat>0) {
            $.post('<?php echo URL;?>scheduler/get',{id: repeat}, (res) => {
                res = JSON.parse(res)
                if(res.status=='ok') {
                    //resetModal();

                    setTimeout(function () {
                        var data = res.data;
                        for(var n in data) {
                            if(n=='id') {
                                continue;
                            }
                            var value = data[n];
                            /*if(typeof diffKeys[n] != 'undefined') {
                                n = diffKeys[n];
                            }*/
                            $('#scheduler_modal_form').find('[name="'+n+'"]').val(value);
                        }
                        $('#addScheduleTaskModal').modal('show')
                    },500)


                }
            })
        }

        $('.change-status').on('click', function() {
            var sid = $(this).closest('tr').attr('sid');
            var status = $(this).attr('status');
            var data = {sid,status};
            $.post('<?php echo URL;?>scheduler/status',data, (res) => {
                if(res == 'success'){
                    location.href='/scheduler';
                }
            })
        })

        $('.view-logs').on('click', function() {
            var sid = $(this).closest('tr').attr('sid');
            var data = {id: sid};
            $.post('<?php echo URL;?>scheduler/get_logs',data, (res) => {
                res = JSON.parse(res);
                var data = res['data'];
                $('#logs_table tbody').empty();
                for (var n in data) {
                    $('#logs_table tbody').append('<tr><td>'+(parseInt(n)+1)+'</td><td>'+data[n]['created_at']+'</td><td>'+data[n]['action_name']+'</td></tr>')
                }
                $('#scheduleLogsModal').modal('show');
                console.log(res);

            })
        })

        $('#addScheduleTask').on('click', function() {
            var data = objectifyForm($('#scheduler_modal_form').serializeArray());
            if(data['name']=='') {
                Swal.fire({
                    text: 'Task name is required',
                    icon: 'warning',
                })
                return;
            }
            if(!(data['text_preset'] > 0)) {
                Swal.fire({
                    text: 'Text preset is required',
                    icon: 'warning',
                })
                return;
            }
            if(!(data['graphic_preset'] > 0)) {
                Swal.fire({
                    text: 'Graphic preset is required',
                    icon: 'warning',
                })
                return;
            }
            if(!(data['group'] > 0)) {
                Swal.fire({
                    text: 'Group is required',
                    icon: 'warning',
                })
                return;
            }

            if(data['start_time'] === '') {
                Swal.fire({
                    text: 'Start time is required',
                    icon: 'warning',
                })
                return;
            }

            if(data['period'] > 0 && data['period'] < 5) {
                Swal.fire({
                    text: 'Minimal value for period is 5',
                    icon: 'warning',
                })
                return;
            }


            $.post('<?php echo URL;?>scheduler/add',data, (res) => {
                if(res == 'success'){
                    location.href='/scheduler';
                }
                if(res == 'exist')
                {
                    Swal.fire({
                        text: 'Scheduler with this configurations is already exist',
                        icon: 'warning',
                    })
                }
            })

        })
    </script>