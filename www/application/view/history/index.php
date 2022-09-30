<div class="page-content">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">History</h4>
        </div>

    </div>

    <div class="row">
        <div class="col-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="">
                        <table class="table table-hover mb-0">
                            <thead>
                            <tr>
                                <th class="pt-0">#</th>
                                <th class="pt-0">Task name</th>
                                <th class="pt-0">Text preset</th>
                                <th class="pt-0">Graphic preset</th>
                                <th class="pt-0">Params</th>
                                <th class="pt-0">Group</th>
                                <th class="pt-0">Time</th>
                                <th class="pt-0">Status</th>
                                <th class="pt-0">Action</th>
                                <th class="pt-0">Logs</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $scheduler = $this->model->getScheduler(2);
                            $count = 1;
                            foreach ($scheduler as $item) {
                                $status = $this->model->getScheduledTaskStatus($item);
                                $actionBtn = '';
                                $statusBtn = '';
                                if($status == 0) {
                                    $statusBtn = '<span class="badge bg-success">Created</span></td>';
                                }
                                if($status == 1) {
                                    $statusBtn = '<span class="badge bg-info">Running</span></td>';
                                }
                                if($status == 2) {
                                    $statusBtn = '<span class="badge bg-black">Suspended</span></td>';
                                }
                                if($status == 3) {
                                    $statusBtn = '<span class="badge bg-danger">Canceled</span></td>';
                                }
                                if($status == 5) {
                                    $statusBtn = '<span class="badge bg-success">Finished</span></td>';
                                }

                                $actionBtn .= '<a style="margin-left:5px" class="repeat btn btn-success btn-xs" style="color: white"> Repeat </a>';

                                print '
                                        <tr sid="'.(int)$item['id'].'" >
                                            <td>'.$count++.'</td>
                                            <td>'.htmlspecialchars($item['name']).'</td>
                                            <td>'.htmlspecialchars($item['text_preset_name']).'</td>
                                            <td>'.htmlspecialchars($item['graphic_preset_name']).'</td>
                                            <td> - </td>
                                            <td>'.htmlspecialchars($item['group_name']).'</td>
                                            <td>'.date('d-m-Y H:i',strtotime($item['start_time'])).' - '.($item['end_time']!='' ? date('d-m-Y H:i',strtotime($item['end_time'])): '').'</td>
                                            <td>'.$statusBtn.'</td>
                                            <td>'.$actionBtn.'</td>
                                            <td>View logs</td>
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
    <form id="repeatTask" action="/scheduler" method="post">
        <input type="hidden" name="repeat">
    </form>
    <script>


        $('.repeat').on('click', function() {
            var sid = $(this).closest('tr').attr('sid');
            $("#repeatTask input").val(sid);
            $("#repeatTask").submit();
            //location.href='/scheduler';//?repeat='+sid;
            /*
            var data = {sid,status};
            $.post('<?php echo URL;?>scheduler/status',data, (res) => {
                if(res == 'success'){
                    location.reload();
                }
            })*/
        })

    </script>