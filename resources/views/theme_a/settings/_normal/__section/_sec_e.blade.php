<div class="tab-pane" id="Invoice_Settings">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Invoice Settings</h3>
            <div class="card-options">
                <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i
                        class="fe fe-chevron-up"></i></a>
                <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i
                        class="fe fe-maximize"></i></a>
                <a href="#" class="card-options-remove" data-toggle="card-remove"><i
                        class="fe fe-x"></i></a>
            </div>
        </div>

        <div class="card-body">
            <form action="{{route('admin.settingsPost')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Invoice prefix</label>
                            <input name="prefix" value="{{$invoice->prefix}}" class="form-control" type="text">
                        </div>
                        <input name="logo" type="file" class="dropify">
                        <small class="text-danger">Recommended image size is 200px x 40px</small>
                    </div>
                    <div class="col-sm-6">
                        <div class="card p-3">
                         
                            <div class="d-flex align-items-center px-2">
                                <img src="{{getImagePath().$invoice->logo}}" alt="Photo by Nathan Guerrero" class="rounded">
        
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="invoice_setting" value="1">
                    <div class="col-sm-12 m-t-20 text-right">
                        <button type="submit" class="btn btn-primary">SAVE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>