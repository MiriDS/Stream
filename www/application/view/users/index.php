    <div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Users</h4>
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
                                    <th class="pt-0">Username</th>
                                    <th class="pt-0">Email</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $count = 1;
                                    foreach ($users as $user) {                                        
                                        print '<tr>
                                            <td>'.$count++.'</td>
                                            <td>'.$user->username.'</td>
                                            <td>'.$user->emails.'</td>
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