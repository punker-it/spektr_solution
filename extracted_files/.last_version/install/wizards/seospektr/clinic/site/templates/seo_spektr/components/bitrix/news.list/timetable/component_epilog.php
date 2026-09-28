<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div data-fancybox data-src="#timetable_cancel_succes" id="trigger_timetable_cancel_succes"></div>
<div class="modal_form" id="timetable_cancel_succes">
    <div class="title_form" style="text-align:center;">Запись успешно удалена<span class="dynamic_sub_title"></span></div>
</div>

<script>
$(function() {
    $('.timetable_cancel').on('click', function() {
        
        if($(this).attr('data-cancel')=='cancel') {
            
           let data = {
                id : $(this).attr('data-id'),
                cancel : $(this).attr('data-cancel'),
                sessid : '<?=bitrix_sessid()?>',
            }
            $.ajax({
                type: 'POST',
                url: '<?=SITE_DIR?>ajax/timetable_cancel.php',
                data: data,
                success: function(data) {
                    $('#trigger_timetable_cancel_succes').trigger('click');
                }
            });
        } else if($(this).attr('data-cancel')=='call') {
            $('#trigger_timetable_cancel_call').trigger('click');
        }
            
    })
}); 
</script>