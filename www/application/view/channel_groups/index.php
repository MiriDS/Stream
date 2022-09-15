<div class="page-content">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Channel Groups</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <button type="button" onclick="getChannelList()" class="btn btn-primary btn-icon-text mb-2 mb-md-0" data-bs-toggle="modal" data-bs-target="#addChannelGroupModal">
                <i class="btn-icon-prepend" data-feather="plus"></i>
                Add new group
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
                                <th class="pt-0">Channels</th>
                                <th width="100px" class="pt-0">Tools</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $count = 1;
                            foreach ($ch_groups as $ch_group) {
                                print '<tr sid="'.(int)$ch_group['id'].'">
                                            <td>'.$count++.'</td>
                                            <td>'.htmlspecialchars($ch_group["name"]).'</td>
                                            <td>'.htmlspecialchars($ch_group["channel_count"]).'</td>
                                            <td>
                                                <button type="button" class="edit btn btn-info btn-xs">Edit</button>
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
    <div class="modal fade" id="addChannelGroupModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add/Edit Group</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <input type="hidden" name="id" value="0" />
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name" data-inputmask-alias="***.***.***.***" />
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Channels:</label>
                            <ul class="channel-list">
                                <li> <input type="checkbox"> Az tv </li>
                            </ul>
                            <!--<label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name" data-inputmask-alias="***.***.***.***" />-->
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <div id="error" class="alert-danger f-left" role="alert">

                    </div>
                    <button type="button" class="btn btn-primary" id="addChannelGroup">
                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        Add
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function getChannelList(ch_group_id) {
            $.post('<?php echo URL;?>channel_groups/channels',{'ch_group_id':ch_group_id },function (result) {
                try {
                    var res = JSON.parse(result)
                    if(res['status'] == 'success') {
                        $('#addChannelGroupModal .channel-list').empty();
                        var data = res['data'];
                        for(var n in data) {
                            $('#addChannelGroupModal .channel-list').append('<li ch_id="'+data[n]['id']+'"><label> <input type="checkbox" '+(ch_group_id>0 && data[n]['ch_group_id'] == ch_group_id?"checked": "")+'>'+data[n]['alias']+'</label></li>');
                        }
                    }
                }
                catch (e) {
                    alert('some error')
                }
            })
        }
        (function($) {
            'use strict';


            $('.edit').on('click', function() {
                var sid = $(this).closest('tr').attr('sid');
                var name  = $(this).closest('tr').children('td:eq(1)').text();
                $('#addChannelGroupModal [name="id"]').val(sid);
                $("#name").val(name);
                getChannelList(sid);

                $('#addChannelGroupModal').modal('show')

            });

            $('.delete').on('click', function() {
                var sid = $(this).closest('tr').attr('sid');

                if (confirm("Silmek isteyinizde eminsiniz?") == true) {
                    var data = new FormData();
                    data.append('id', sid);
                    $.ajax(
                        {
                            url: '<?php echo URL;?>channel_groups/remove',
                            data: data,
                            cache: false,
                            contentType: false,
                            processData: false,
                            type: 'POST'
                        })
                        .done(function(result)
                        {   if(result === 'success')
                            {
                                location.reload();
                            }
                        });
                }
            });


            $('#addChannelGroup').on('click', function() {

                $('#addChannelGroup span').removeClass('d-none');

                var correct = true,
                    ch_list = [],
                    ch_group_id = $('#addChannelGroupModal [name="id"]').val(),
                    name = $('#name').val();

                $('#addChannelGroupModal .channel-list li').each(function (){
                    var ch_id = $(this).attr('ch_id');
                    if($(this).find(':checkbox').is(':checked')) {
                        ch_list.push(ch_id);
                    }
                })

                if (typeof name === 'undefined' || name === '') {
                    $('#addChannelGroup span').addClass('d-none');

                    $('#name').css('border-color', '#ff3366');

                    setTimeout(() => {
                        $('#name').css('border-color', '#e9ecef');
                    }, 1500);

                    return;
                }

                if (correct) {
                    var data = new FormData();

                    data.append('name', name);
                    data.append('ch_group_id', ch_group_id);
                    data.append('ch_list', ch_list);

                    $.ajax(
                        {
                            url: '<?php echo URL;?>channel_groups/add',
                            data: data,
                            cache: false,
                            contentType: false,
                            processData: false,
                            type: 'POST'
                        })
                        .done(function(result)
                        {
                            $('#addChannelGroup span').addClass('d-none');

                            if(result === 'success')
                            {
                                location.reload();
                            }
                            else if (result === 'exist')
                            {
                                $('#error').html('Channel group already exists');
                                setTimeout(() => {
                                    $('#error').html('');
                                }, 5000);
                            }
                            else {
                                $('#error').html(result);
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
