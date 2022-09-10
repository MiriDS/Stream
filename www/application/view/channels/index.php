<div class="page-content">
    
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Channels</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">            
            <button type="button" class="btn refresh-list btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
                <i class="btn-icon-prepend" data-feather="refresh-ccw"></i>
                Refresh
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
                                    <th class="pt-0">Name</th>
                                    <th class="pt-0">Server IP Address</th>
                                    <th class="pt-0">Info</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $count = 1;
                                foreach ($channels as $channel) {
                                    print '<tr sid="'.(int)$channel['id'].'">
                                                <td>'.$count++.'</td>
                                                <td>'.htmlspecialchars($channel["alias"]).'</td>
                                                <td>'.htmlspecialchars($channel["server_ip"]).'</td>
                                                <td>'.htmlspecialchars($channel["state"]).'</td>
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

    <script>
        $('.refresh-list').on('click', function() {
            var data = new FormData();
            $.ajax(
                {
                    url: '<?php echo URL;?>channels/refresh',
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: 'POST'
                })
                .done(function(result)
                {
                    location.reload();
                });
        });
    </script>