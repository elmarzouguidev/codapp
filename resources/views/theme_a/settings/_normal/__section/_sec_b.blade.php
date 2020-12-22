<div class="tab-pane" id="Localization">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Basic Settings</h3>

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
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Default Country</label>
                            <select class="form-control" name="localisation_country">
                                <option selected="selected">{{$localisations->country}}</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Time Zone</label>
                            <select class="form-control" name="localisation_timezone">
                                <option selected="selected" value="{{$localisations->timezone}}">{{$localisations->timezone}}</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="localisation_setting" value="1">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Default Language</label>
                            <select class="form-control" name="default_lng">
                                <option selected="selected" value="{{$localisations->default_lng}}">{{$localisations->default_lng}}</option>
                                <option value="English">English</option>
                                <option value="Francais">Francais</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Currency Code</label>
                            <select class="form-control" name="currency_code">
                                <option selected="selected" value="{{$localisations->currency_code}}">{{$localisations->currency_code}}</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Currency Symbol</label>
                            <input name="currency_symbole" class="form-control" value="{{$localisations->currency_symbole}}" type="text">
                        </div>
                    </div>
                    <div class="col-sm-12 text-right m-t-20">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>