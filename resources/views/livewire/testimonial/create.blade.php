<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('testimonial.name') ? 'invalid' : '' }}">
        <label class="form-label" for="name">{{ trans('cruds.testimonial.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" wire:model.defer="testimonial.name">
        <div class="validation-message">
            {{ $errors->first('testimonial.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.testimonial.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('testimonial.testimony_description') ? 'invalid' : '' }}">
        <label class="form-label required" for="testimony_description">{{ trans('cruds.testimonial.fields.testimony_description') }}</label>
        <textarea class="form-control" name="testimony_description" id="testimony_description" required wire:model.defer="testimonial.testimony_description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('testimonial.testimony_description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.testimonial.fields.testimony_description_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>