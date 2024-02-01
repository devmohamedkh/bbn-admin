
<?php
    $auth_user= authSession();
?>
{{ Form::open(['route' => ['bbntype.destroy', $bbntype->id], 'method' => 'delete','data--submit'=>'bbntype'.$bbntype->id]) }}
<div class="d-flex justify-content-end align-items-center">
    @if(!$bbntype->trashed())
        @if(auth()->user()->hasRole(['provider','admin']) )
            <a class="mr-3 text-danger" href="{{ route('bbntype.destroy', $bbntype->id) }}" data--submit="bbntype{{$bbntype->id}}" 
                data--confirmation='true' 
                data--ajax="true"
                data-datatable="reload"
                data-title="{{ __('messages.delete_form_title',['form'=>  __('messages.bbntype') ]) }}"
                title="{{ __('messages.delete_form_title',['form'=>  __('messages.bbntype') ]) }}"
                data-message='{{ __("messages.delete_msg") }}'>
                <i class="far fa-trash-alt"></i>
            </a>
        @endif
    @endif
    @if(auth()->user()->hasAnyRole(['provider','admin']) && $bbntype->trashed())
        <a class="mr-2" href="{{ route('bbntype.action',['id' => $bbntype->id, 'type' => 'restore']) }}"
            title="{{ __('messages.restore_form_title',['form' => __('messages.bbntype') ]) }}"
            data--submit="confirm_form"
            data--confirmation='true'
            data--ajax='true'
            data-title="{{ __('messages.restore_form_title',['form'=>  __('messages.bbntype') ]) }}"
            data-message='{{ __("messages.restore_msg") }}'
            data-datatable="reload">
            <i class="fas fa-redo text-secondary"></i>
        </a>
        <a href="{{ route('bbntype.action',['id' => $bbntype->id, 'type' => 'forcedelete']) }}"
            title="{{ __('messages.forcedelete_form_title',['form' => __('messages.bbntype') ]) }}"
            data--submit="confirm_form"
            data--confirmation='true'
            data--ajax='true'
            data-title="{{ __('messages.forcedelete_form_title',['form'=>  __('messages.bbntype') ]) }}"
            data-message='{{ __("messages.forcedelete_msg") }}'
            data-datatable="reload"
            class="mr-2">
            <i class="far fa-trash-alt text-danger"></i>
        </a>
    @endif
</div>
{{ Form::close() }}