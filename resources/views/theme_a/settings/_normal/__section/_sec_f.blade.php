<div class="tab-pane" id="Notifications">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Notifications Settings</h3>
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
                <ul class="list-group">
                    <li class="list-group-item">
                        send message when new Admin
                        <div class="float-right">
                            <label class="custom-control custom-checkbox">
                                <input name="new_admin" type="checkbox" class="custom-control-input" 
                                {{$notifications->new_admin ?'checked':''}}
                                />
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </div>
                    </li>
                    <li class="list-group-item">
                        send message when new Lead
                        <div class="float-right">
                            <label class="custom-control custom-checkbox">
                                <input name="new_lead" type="checkbox" class="custom-control-input"
                                {{$notifications->new_lead ?'checked':''}}
                                 />
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </div>
                    </li>
                    <li class="list-group-item">
                        send message when new Command
                        <div class="float-right">
                            <label class="custom-control custom-checkbox">
                                <input  name="new_command" type="checkbox" class="custom-control-input"
                                {{$notifications->new_command ?'checked':''}} 
                                 />
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </div>
                    </li>
                    <li class="list-group-item">
                        send message when command delivered
                        <div class="float-right">
                            <label class="custom-control custom-checkbox">
                                <input name="command_delivered" type="checkbox" class="custom-control-input"
                                {{$notifications->command_delivered ?'checked':''}}
                                 />
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </div>
                    </li>
                    <li class="list-group-item">
                        send message when new Moderator
                        <div class="float-right">
                            <label class="custom-control custom-checkbox">
                                <input  name="new_moderator" type="checkbox" class="custom-control-input"
                                {{$notifications->new_moderator ?'checked':''}}
                                />
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </div>
                    </li>
                    <li class="list-group-item">
                        send message when new Delivery Guy
                        <div class="float-right">
                            <label class="custom-control custom-checkbox">
                                <input name="new_delivery" type="checkbox" class="custom-control-input" 
                                {{$notifications->new_delivery ?'checked':''}}
                                />
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </div>
                    </li>
        
                </ul>
                <div class="row mt-5">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label>Email to send Notification</label>
                            <input name="email_to_send" class="form-control" value="{{$notifications->email_to_send}}" type="email">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Time after send Notification</label>
                            <select class="form-control" name="time_notify">
                                <option selected="selected" value="{{$notifications->time}}">{{$notifications->time}} Minutes</option>
                                <option value="1">1 Minute</option>
                                <option value="3">3 Minutes</option>
                                <option value="5">5 Minutes</option>
                                <option value="10">10 Minutes</option>
                                <option value="15">30 Minutes</option> 
                            </select>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="notification_setting" value="1">
                <div class="col-sm-12 m-t-20 text-right mt-2">
                    <button type="submit" class="btn btn-primary">SAVE</button>
                </div>
            </form>
        </div>
    </div>
</div>