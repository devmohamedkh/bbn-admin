
<?php
    $auth_user= authSession();
?>
{{ Form::open(['route' => ['bbn-rating.destroy', $bbnrating->id], 'method' => 'delete','data--submit'=>'bbnrating'.$bbnrating->id]) }}
@if(auth()->user()->hasAnyRole(['admin']))
<div class="d-flex justify-content-end align-items-center">
        <a class="mr-2" href="{{ route('bbn-rating.destroy', $bbnrating->id) }}" data--submit="bbnrating{{$bbnrating->id}}" 
            data--confirmation='true' 
            data--ajax="true"
            data-datatable="reload"
            data-title="{{ __('messages.delete_form_title',['form'=>  __('messages.rating') ]) }}"
            title="{{ __('messages.delete_form_title',['form'=>  __('messages.rating') ]) }}"
            data-message='{{ __("messages.delete_msg") }}'>
            <i class="far fa-trash-alt text-danger"></i>
        </a>
    </div>
@endif
{{ Form::close() }}