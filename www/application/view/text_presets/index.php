<link rel="stylesheet" href="<?php echo URL; ?>vendors/bootstrap-colorpicker/bootstrap-colorpicker.min.css">

<div class="page-content">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Text presets</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <button onclick="resetModal()" type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0" data-bs-toggle="modal" data-bs-target="#addTextPresetModal">
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
                                <th class="pt-0">Text</th>
                                <th class="pt-0" width="100px"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $count = 1;

                            foreach ($textPresets as $textPreset) {
                                print '<tr sid="'.(int)$textPreset['id'].'">
                                                <td>'.$count++.'</td>
                                                <td>'.htmlspecialchars($textPreset['name']).'</td>
                                                <td>'.htmlspecialchars($textPreset['text']).'</td>
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
    <div class="modal fade" id="addTextPresetModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add new preset</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form id="text_preset_modal">
                        <input type="hidden" name="id" value="0" />
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" />
                            </div>
                            <div class="col-12 mb-3">
                                <label for="passes" class="form-label">Text:</label>
                                <textarea class="form-control" id="text" name="text"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="addTextPreset">
                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->

    <script>
        function resetModal() {
            document.getElementById("text_preset_modal").reset();
        }
        (function($) {
            'use strict';

            $('.edit').on('click', function() {
                var sid = $(this).closest('tr').attr('sid');
                $.post('<?php echo URL;?>text_presets/get',{id: sid}, (res) =>
                {
                    res = JSON.parse(res)
                    if(res.status === 'ok')
                    {
                        resetModal();
                        var data = res.data;
                        for(var n in data) {
                            var value = data[n];
                            $('#text_preset_modal').find('[name="'+n+'"]').val(value);
                        }
                        $('#addTextPresetModal').modal('show')
                    }
                })
            });

            $('.delete').on('click', function() {
                var sid = $(this).closest('tr').attr('sid');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#6571ff',
                    cancelButtonColor: '#ff3366',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var data = new FormData();
                        data.append('id', sid);
                        $.ajax(
                        {
                            url: '<?php echo URL;?>text_presets/remove',
                            data: data,
                            cache: false,
                            contentType: false,
                            processData: false,
                            type: 'POST'
                        })
                        .done(function(result)
                        {
                            if(result === 'success')
                            {
                                Swal.fire({
                                    title: 'Deleted!',
                                    text: 'Text preset has been deleted.',
                                    icon: 'success'
                                }).then(() => {
                                    location.reload();
                                })
                            }
                        });                        
                    }
                })
            });

            $('#addTextPreset').on('click', function() {
                var data = objectifyForm($('#text_preset_modal').serializeArray());
                if(data['name'] === '')
                {
                    Swal.fire({
                        text: 'Name is required',
                        icon: 'warning',
                    })
                    return;
                }

                if(data['text'] === '')
                {
                    Swal.fire({
                        text: 'Text is required',
                        icon: 'warning',
                    })
                    return;
                } else if(data['text'].length < 10)
                {
                    Swal.fire({
                        text: 'Min text length must be at least 10 characters',
                        icon: 'warning',
                    })
                    return;
                }

                $.post('<?php echo URL;?>text_presets/add',data, (res) => {
                    if(res === 'success'){
                        location.reload();
                    }
                    if(res === 'exist')
                    {
                        Swal.fire({
                            text: 'Preset with name '+data['name']+' is already exist',
                            icon: 'warning',
                        })
                    }
                })

            })


        })(jQuery);
    </script>