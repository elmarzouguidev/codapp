<div class="tab-pane active show" id="Company_Settings">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Company Settings</h3>
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
            {{--@if($errors)
            {{$errors}}
            @endif--}}
        <form action="{{route('admin.settingsPost')}}" method="post">
            @csrf
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Company Name <span class="text-danger">*</span></label>
                            <input 
                                class="form-control"
                                type="text"
                                id="app_name"
                                name="app_name"
                                value="{{$settings->app_name}}"
                            >
                        </div>
                    </div>
                    <input type="hidden" name="general_setting" value="1">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>CEO</label>
                            <input 
                            type="text"
                            class="form-control" 
                            id="ceo"
                            name="ceo"
                            value="{{$settings->ceo}}"
                            >
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Mobile Number <span class="text-danger">*</span></label>
                            <input class="form-control"
              
                              type="text"
                              id="mobile"
                              name="mobile"
                              value="{{$settings->mobile}}"
                              >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Address</label>
                            <input 
                            class="form-control"
                        
                             id="address"
                             name="address"
                             value="{{$settings->address}}"
                              type="text">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Email <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i
                                            class="icon-envelope"></i></span>
                                </div>
                                <input type="email"
                                class="form-control"
                                id="email"
                                name="email"
                                value=" {{$settings->email}}"
                                    >
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Website Url</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-globe"></i></span>
                                </div>
                                <input type="text" 
                                class="form-control" 
                                
                                id="website"
                                name="website"
                                value=" {{$settings->website}}"
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="form-group">
                            <label>Country</label>
                            <select 
                            class="form-control"
                            id="country"
                            name="country"
                            >

                                <option value="Maroc">{{$settings->country}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="form-group">
                            <label>City</label>
                            <input 
                            class="form-control"
                            
                                type="text"
                                id="city"
                                name="city"
                                value="{{$settings->city}}"
                              >
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="form-group">
                            <label>Postal Code</label>
                            <input 
                            class="form-control"
                        
                             id="code_postale"
                             name="code_postale"
                             value="{{$settings->code_postale}}"
                              type="text">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-right m-t-20">
                        <button type="submit" class="btn btn-primary">SAVE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>