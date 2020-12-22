<div>

    @if($isUpdate)
        @include('livewire.category.__update')
    @else
        @include('livewire.category.__create')
    @endif
    {{--dd($categories)--}}
    <div class="row clearfix">
        {{--$products->onEachSide(2)->links()--}}
        {{--$products->links()--}}
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('tables.list') }}</h3>

                    <div class="card-options">
                        <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i
                                class="fe fe-chevron-up"></i></a>
                        <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i
                                class="fe fe-maximize"></i></a>
                        <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                        <div class="item-action dropdown ml-2">
                            <a href="javascript:void(0)" data-toggle="dropdown"><i class="fe fe-more-vertical"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">

                                {{--<a wire:click="moveTo('group')" href="javascript:void(0)" class="dropdown-item">
                                    <i class="dropdown-icon fa fa-copy"></i>
                                    {{ __('productData.product.export.group') }}
                                </a>

                                <a wire:click="moveTo('moderator')" href="javascript:void(0)" class="dropdown-item">
                                    <i class="dropdown-icon fa fa-user"></i>
                                    {{ __('productData.product.export.moderator') }}
                                </a>--}}
                                <a wire:click="deleteMultiCats()" href="javascript:void(0)" class="dropdown-item">
                                    <i class="dropdown-icon fa fa-trash"></i>
                                    {{ __('productData.product.export.delete') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-vcenter text-nowrap mb-0">
                            <thead>
                            <tr>
                                <th>
                                    <label class="custom-control custom-checkbox mb-0">
                                        <input type="checkbox" class="custom-control-input" name="example-checkbox1"
                                               value="option1">
                                        <span class="custom-control-label">&nbsp;</span>
                                    </label>
                                </th>

                                <th>{{ __('tables.name') }}</th>
                                <th>{{ __('tables.product') }}</th>

                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $cate)
                                <tr>
                                    <td class="width45" id="selectLead">
                                        <label class="custom-control custom-checkbox mb-0">
                                            <input wire:model.defer="selected" type="checkbox"
                                                   class="custom-control-input" name="selected[]"
                                                   value="{{ $cate->id }}">
                                            <span class="custom-control-label">&nbsp;</span>
                                        </label>
                                    </td>
                                    <td style="color:red">{{ $cate->name }}</td>

                                    <td>{{ $cate->products_count }}</td>

                                    <td><a wire:click="editCategory({{ $cate->id }})" href="javascript:void(0);"
                                           class="btn btn-success btn-sm" onclick="topFunction()">
                                            {{__('action.edit')}}
                                        </a>
                                    </td>
                                    <td><button wire:click="deleteCategory({{ $cate->id }})"
                                                class="btn btn-danger btn-sm"><i class="icon-trash"></i></button></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
