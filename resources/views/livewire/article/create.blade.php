<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('article.title') ? 'invalid' : '' }}">
        <label class="form-label required" for="title">{{ trans('cruds.article.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" required wire:model.defer="article.title">
        <div class="validation-message">
            {{ $errors->first('article.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.article.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('article.category_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="category">{{ trans('cruds.article.fields.category') }}</label>
        <x-select-list class="form-control" required id="category" name="category" :options="$this->listsForFields['category']" wire:model="article.category_id" />
        <div class="validation-message">
            {{ $errors->first('article.category_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.article.fields.category_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('article.description') ? 'invalid' : '' }}">
        <label class="form-label required" for="description">{{ trans('cruds.article.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" required wire:model.defer="article.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('article.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.article.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.article_article_image') ? 'invalid' : '' }}">
        <label class="form-label required" for="article_image">{{ trans('cruds.article.fields.article_image') }}</label>
        <x-dropzone id="article_image" name="article_image" action="{{ route('admin.articles.storeMedia') }}" collection-name="article_article_image" max-file-size="20" max-width="5000" max-height="5000" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.article_article_image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.article.fields.article_image_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>