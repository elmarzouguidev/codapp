<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Row</h3>
            </div>
            <div class="card-body">
                <button id="addToTable" class="btn btn-primary mb-15" type="button">
                    <i class="icon wb-plus" aria-hidden="true"></i> Add row
                </button>
                <div class="table-responsive">
                    <table class="table table-hover table-vcenter table-striped" cellspacing="0" id="addrowExample">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <tr class="gradeA">
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td class="actions">
                                    <button class="btn btn-sm btn-icon on-editing m-r-5 button-save"
                                    data-toggle="tooltip" data-original-title="Save" hidden><i class="icon-drawer" aria-hidden="true"></i></button>
                                    <button class="btn btn-sm btn-icon on-editing button-discard"
                                    data-toggle="tooltip" data-original-title="Discard" hidden><i class="icon-close" aria-hidden="true"></i></button>
                                    <button class="btn btn-sm btn-icon on-default m-r-5 button-edit"
                                    data-toggle="tooltip" data-original-title="Edit"><i class="icon-pencil" aria-hidden="true"></i></button>
                                    <button class="btn btn-sm btn-icon on-default button-remove"
                                    data-toggle="tooltip" data-original-title="Remove"><i class="icon-trash" aria-hidden="true"></i></button>
                                </td>
                            </tr>
                           
                        </tbody>
                    </table>
                </div>
            </div>                        
        </div>
    </div>
</div>