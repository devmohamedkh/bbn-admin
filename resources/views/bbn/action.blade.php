
<?php
    $auth_user= authSession();
?>
{{ Form::open(['route' => ['bbn.destroy', $bbn->id], 'method' => 'delete','data--submit'=>'bbn'.$bbn->id]) }}
<div class="d-flex justify-content-end align-items-center">
    @if(!$bbn->trashed())
     @if($auth_user->can('bbn changePassword'))
      <a class="mr-2" href="{{ route('bbn.getchangepassword',['id' => $bbn->id]) }}" title="{{ __('messages.change_password',['form' => __('messages.bbn') ]) }}"><i class="fa fa-lock text-success "></i></a>
      @endif
        @if($auth_user->can('bbn delete'))
        <a class="mr-3 text-danger" href="{{ route('bbn.destroy', $bbn->id) }}" data--submit="bbn{{$bbn->id}}" 
            data--confirmation='true' 
            data--ajax="true"
            data-datatable="reload"
            data-title="{{ __('messages.delete_form_title',['form'=>  __('messages.bbn') ]) }}"
            title="{{ __('messages.delete_form_title',['form'=>  __('messages.bbn') ]) }}"
            data-message='{{ __("messages.delete_msg") }}'>
            <i class="far fa-trash-alt"></i>
        </a>
        @endif
    @endif
    @if(auth()->user()->hasAnyRole(['admin']) && $bbn->trashed())
        <a href="{{ route('bbn.action',['id' => $bbn->id, 'type' => 'restore']) }}"
            title="{{ __('messages.restore_form_title',['form' => __('messages.bbn') ]) }}"
            data--submit="confirm_form"
            data--confirmation='true'
            data--ajax='true'
            data-title="{{ __('messages.restore_form_title',['form'=>  __('messages.bbn') ]) }}"
            data-message='{{ __("messages.restore_msg") }}'
            data-datatable="reload"
            class="mr-2">
            <i class="fas fa-redo text-secondary"></i>
        </a>
        <a href="{{ route('bbn.action',['id' => $bbn->id, 'type' => 'forcedelete']) }}"
            title="{{ __('messages.forcedelete_form_title',['form' => __('messages.bbn') ]) }}"
            data--submit="confirm_form"
            data--confirmation='true'
            data--ajax='true'
            data-title="{{ __('messages.forcedelete_form_title',['form'=>  __('messages.bbn') ]) }}"
            data-message='{{ __("messages.forcedelete_msg") }}'
            data-datatable="reload"
            class="mr-2">
            <i class="far fa-trash-alt text-danger"></i>
        </a>
    @endif
</div>
{{ Form::close() }}