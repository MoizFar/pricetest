
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
@if(Session::has('message'))
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/extensions/toastr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/extensions/ext-component-toastr.css')}}">
    <script src="{{asset('/app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
    <script src="{{asset('/app-assets/js/scripts/extensions/ext-component-toastr.js')}}"></script>
@endif
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
   
    
    $('select[data-option-id]').each(function() {
        $(this).val($(this).data('option-id'));
    });
    
    function tags() {
        tags = $('.tags'),
                tags.wrap('<div class="position-relative"></div>').select2({
                    dropdownAutoWidth: true,
                    width: '100%',
                    maximumSelectionLength: 3,
                    dropdownParent: tags.parent(),
                    placeholder: 'Select maximum 3 items'
                });
    }
   
       
    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
    $('select[data-option-id]').each(function() {
        $(this).val($(this).data('option-id'));
    });
    $('.logout').click(function () {
        $('#frm-logout').submit();
    });
    <?php  if(Session::has('message')):  ?>
<?php $message = Session::get('message');
           $msg= $message['text'];
            ?>
    <?php  if($message['title'] == 'Success'): ?>
toastr['success']('👋 {{$msg}}', 'Success!', {
closeButton: true,
tapToDismiss: true,
progressBar: true,

    });
<?php else: ?>
        toastr['error']('👋 {{$msg}}', 'Success!', {
    closeButton: true,
    tapToDismiss: true,
    progressBar: true,
});
<?php
endif;
Session::forget('message');
endif;
?>

</script>
<script src="{{asset('/app-assets/js/scripts/forms/modalConfirmDelete.js')}}"></script>
