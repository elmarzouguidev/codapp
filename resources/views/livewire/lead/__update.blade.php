<div class="tab-pane fade updateLead show active" id="addnew" role="tabpanel">
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form>

                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">{{__('forms.fname')}}</label>
                                        <input type="text" wire:model.defer="fields.nom" name="nom" class="form-control @error('nom') is-invalid @enderror" placeholder="{{__('forms.fname')}}">
                                        @error('nom')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>
                                <input type="hidden" wire:model="leadId" class="haymacproduction">
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">{{__('forms.lname')}}</label>
                                        <input type="text" wire:model.defer="fields.prenom" name="prenom" class="form-control @error('prenom') is-invalid @enderror" placeholder="{{__('forms.lname')}}">
                                        @error('prenom')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">{{__('forms.email')}}</label>
                                        <input type="email" wire:model.defer="fields.email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{__('forms.email')}}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">{{__('forms.city')}}</label>
                                        <input type="text" wire:model.defer="fields.ville" name="ville" class="form-control @error('ville') is-invalid @enderror" placeholder="{{__('forms.city')}}">
                                        @error('ville')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">{{__('forms.address')}}</label>
                                        <input type="text" wire:model.defer="fields.address" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="{{__('forms.address')}}">
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">{{__('forms.tele')}}</label>
                                        <input type="text" wire:model.defer="fields.tele" name="tele" class="form-control @error('tele') is-invalid @enderror" placeholder="{{__('forms.tele')}}">
                                        @error('tele')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">{{__('forms.product')}}</label>
                                        <input type="text" wire:model.defer="fields.produit" name="produit" class="form-control @error('produit') is-invalid @enderror" placeholder="{{__('forms.product')}}">
                                        @error('produit')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">{{__('forms.group')}}</label>
                                        <select wire:model.defer="fields.group_id" name="group" class="custom-select @error('group_id') is-invalid @enderror">
                                            <option wire:key="" value=""></option>
                                            @foreach($groups as $group)
                                                <option wire:key="{{$group->id}}" value="{{$group->id}}">{{$group->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('group')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                @csrf
                                <div class="col-lg-12 mt-3">
                                    <button wire:click.prevent="update()" class="btn btn-primary">{{__('action.update')}}</button>
                                    <button wire:click.prevent="cancel()" class="btn btn-default">{{__('action.cancel')}}</button>
                                </div>
                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
