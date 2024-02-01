
<?php
    $auth_user= authSession();
?>
{{ Form::open(['route' => ['bbnpayout.destroy', $bbnpayout->id], 'method' => 'delete','data--submit'=>'bbnpayout'.$bbnpayout->id]) }}
<div class="d-flex justify-content-end align-items-center">

    <a class="mr-3" href="{{ route('bbnpayout.destroy', $bbnpayout->id) }}" data--submit="bbnpayout{{$bbnpayout->id}}" 
        data--confirmation='true' 
        data--ajax="true"
        data-datatable="reload"
        data-title="{{ __('messages.delete_form_title',['form'=>  __('messages.bbn_payout') ]) }}"
        title="{{ __('messages.delete_form_title',['form'=>  __('messages.bbn_payout') ]) }}"
        data-message='{{ __("messages.delete_msg") }}'>
        <i class="far fa-trash-alt text-danger"></i>
    </a>
</div>
{{ Form::close() }}