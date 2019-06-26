@php
    if (!isset($header))      { $header = __('Confirmation'); }
    if (!isset($body))        { $body = __('Are you sure?'); }

    $formAttribute = (isset($okButtonForm) ? 'form='.$okButtonForm.'' : '');
@endphp

<div id="modal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $header }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>{{ $body }}</p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" {{$formAttribute}}>{{ __('OK') }}</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('Cancel') }}</button>
            </div>
        </div>
    </div>
</div>
