<div class="tab-pane fade addProduct show active" id="addnew" role="tabpanel">
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <form>

                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <label
                                        class="form-label">{{ __('forms.name') }}</label>
                                    <input type="text" wire:model.defer="fields.name" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="{{ __('forms.name') }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <label
                                        class="form-label">{{ __('forms.photo') }}</label>
                                    <input type="text" wire:model.defer="fields.photo" name="photo"
                                        class="form-control @error('photo') is-invalid @enderror"
                                        placeholder="{{ __('forms.photo') }}">
                                    @error('photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <label
                                        class="form-label">{{ __('forms.description') }}</label>
                                    <input type="text" wire:model.defer="fields.description" name="description"
                                        class="form-control @error('description') is-invalid @enderror"
                                        placeholder="{{ __('forms.description') }}">
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12">
                                <div class="form-group">
                                    <label
                                        class="form-label">{{ __('forms.quantity') }}</label>
                                    <input type="text" wire:model.defer="fields.quantity" name="quantity"
                                        class="form-control @error('quantity') is-invalid @enderror"
                                        placeholder="{{ __('forms.quantity') }}">
                                    @error('quantity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-12">
                                <div class="form-group">
                                    <label
                                        class="form-label">{{ __('forms.price') }}</label>
                                    <input type="text" wire:model.defer="fields.price" name="price"
                                        class="form-control @error('price') is-invalid @enderror"
                                        placeholder="{{ __('forms.price') }}">
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-5 col-md-12">
                                <div class="form-group">
                                    <label
                                        class="form-label">{{ __('forms.category') }}</label>
                                    <select wire:model.defer="fields.category_id" name="category_id"
                                        class="custom-select @error('category_id') is-invalid @enderror">
                                        <option wire:key="" value=""></option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            @csrf
                            {{--<div class="col-lg-12">
                                    <input type="file" class="dropify">
                                </div>--}}
                            <div class="col-lg-12 mt-3">
                                <button wire:click.prevent="submit()"
                                    class="btn btn-primary">{{ __('action.add') }}</button>
                                {{-- <button  class="btn btn-default">Cancel</button> --}}
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
