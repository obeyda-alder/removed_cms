@isset($type)
    <div class="form__actions cms-buttons-bottom">
        <button type="submit" class="btn m-btn--air btn-success mx-1">
            @if($type == 'create')
                {{ __('cms::base.create') }}
            @elseif($type == 'update')
                {{ __('cms::base.update') }}
            @endif
        </button>
        <a href="{{ URL::previous() }}" class="btn btn-outline-danger mx-1">
            {{ __('cms::base.cancel') }}
        </a>
    </div>
@endisset
