<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('enrollment.module') ? 'invalid' : '' }}">
        <label class="form-label required" for="module">{{ trans('cruds.enrollment.fields.module') }}</label>
        <input class="form-control" type="text" name="module" id="module" required wire:model.defer="enrollment.module">
        <div class="validation-message">
            {{ $errors->first('enrollment.module') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.enrollment.fields.module_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('enrollment.email') ? 'invalid' : '' }}">
        <label class="form-label required" for="email">{{ trans('cruds.enrollment.fields.email') }}</label>
        <input class="form-control" type="text" name="email" id="email" required wire:model.defer="enrollment.email">
        <div class="validation-message">
            {{ $errors->first('enrollment.email') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.enrollment.fields.email_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('enrollment.phone_number') ? 'invalid' : '' }}">
        <label class="form-label" for="phone_number">{{ trans('cruds.enrollment.fields.phone_number') }}</label>
        <input class="form-control" type="text" name="phone_number" id="phone_number" wire:model.defer="enrollment.phone_number">
        <div class="validation-message">
            {{ $errors->first('enrollment.phone_number') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.enrollment.fields.phone_number_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.enrollments.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>