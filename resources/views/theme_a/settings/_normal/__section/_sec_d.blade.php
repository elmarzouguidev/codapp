<div class="tab-pane" id="Email_Settings">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">SMTP Email Settings</h3>
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
                <div class="form-group">
                    <label class="fancy-radio custom-color-green"><input name="gender3"
                            value="PHP Mail" type="radio" checked><span><i></i>PHP
                            Mail</span></label>
                    <label class="fancy-radio custom-color-green"><input name="gender3" value="SMTP"
                            type="radio"><span><i></i>SMTP</span></label>
                </div>
                <input type="hidden" name="emails_setting" value="1">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Email From Address</label>
                            <input name="from_address" value="{{$emails->from_address}}" class="form-control" type="email">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Emails From Name</label>
                            <input name="from_name" value="{{$emails->from_name}}" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>SMTP HOST</label>
                            <input name="smtp_host" class="form-control" value="{{$emails->smtp_host}}" type="text">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>SMTP USER</label>
                            <input name="smtp_user" class="form-control" value="{{$emails->smtp_user}}" type="text">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>SMTP PASSWORD</label>
                            <input name="smtp_pass" class="form-control" value="{{$emails->smtp_pass}}" type="text">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>SMTP PORT</label>
                            <input name="smtp_port" class="form-control" value="{{$emails->smtp_port}}" type="text">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>SMTP Security</label>
                            <select class="form-control" name="smtp_security">
                                <option selected>{{$emails->smtp_security}}</option>
                                <option>SSL</option>
                                <option>TLS</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>SMTP Authentication Domain</label>
                            <input name="smtp_auth_domain"  class="form-control" value="{{$emails->smtp_auth_domain}}" type="text">
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