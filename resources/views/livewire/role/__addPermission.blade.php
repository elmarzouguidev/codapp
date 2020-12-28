<div class="col-lg-3 col-md-12 haymacproduction">
    <div class="form-group haymacproduction">
        <label class="form-label haymacproduction">add Permission to ({{ $roleName }})</label>
        <input type="text" wire:model.defer="permission.name" name="name"
            class="form-control @error('name') is-invalid @enderror"
            placeholder="{{ __('forms.name') }}">
        <input type="hidden" wire:model="roleId" class="haymacproduction">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    {{--<div class="col-lg-5 col-md-12">
        <div class="form-group">

            <label class="form-label">{{ __('for') }}</label>
            <select wire:model.defer="permission.guard_name" name="guard_name"
                class="custom-select @error('guard_name') is-invalid @enderror">
                <option wire:key="" value=""></option>
                <option value="admin">admin</option>
                <option value="moderator">moderator</option>
            </select>
            @error('guard_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>--}}
</div>
<div class="col-lg-12 mt-3">

    <button wire:click.prevent="addPermissionActionSave()"
        class="btn btn-success">{{ __('action.add') }}</button>
    <button wire:click.prevent="cancel()" class="btn btn-default">{{ __('action.cancel') }}</button>

</div>
