<div class="tab-pane" id="Hooks_settings">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Hooks Settings</h3>
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
            <form action="{{route('admin.settingsPost')}}" method="post">
                @csrf
                <input type="hidden" name="hooks_setting" value="1">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Platfome name</label>
                            <input name="name" value="{{$hooks->name}}" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Header signature(for devlopper)</label>
                            <input name="header" value="{{$hooks->header}}" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Secret Code</label>
                            <input name="secret" class="form-control" value="{{$hooks->secret}}" type="text">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Domain name</label>
                            <input name="domain" class="form-control" value="{{$hooks->domain}}" type="text">
                        </div>
                    </div>
                    {{--<div class="col-sm-6">
                        <div class="form-group">
                            <label>link to Hook</label>
                            <input name="route" class="form-control" value="{{$hooks->route}}" type="text">
                        </div>
                    </div>--}}
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Validated</label>
                            <div class="float-left">
                                <label class="custom-control custom-checkbox">
                                    <input  name="validated" type="checkbox" class="custom-control-input"
                                    {{$hooks->validated ?'checked':''}} 
                                     />
                                    <span class="custom-control-label">&nbsp;</span>
                                </label>
                            </div>
                        </div>
             
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Active</label>
                            <div class="float-left">
                                <label class="custom-control custom-checkbox">
                                    <input  name="active" type="checkbox" class="custom-control-input"
                                    {{$hooks->active ?'checked':''}} 
                                     />
                                    <span class="custom-control-label">&nbsp;</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 m-t-20 text-right">
                        <button type="submit" class="btn btn-primary">SAVE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>