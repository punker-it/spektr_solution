<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div data-fancybox data-src="#user_doc_succes" id="trigger_user_doc_succes"></div>

<div class="modal_form" id="user_doc_succes">
    <div class="title_form" style="text-align:center;"><?=GetMessage("USER_DOC_SUCCES_SEND")?></div>
</div>
<script>
$(function() {
    $('.send_user_doc').on('click', function() {
        
        if($(this).attr('data-doc-id')) {
            
           let data = {
                fileid : $(this).attr('data-doc-id'),
            }
            $.ajax({
                type: 'POST',
                url: '<?=SITE_DIR?>ajax/send_user_doc.php',
                data: data,
                success: function(data) {
                    if(data == 'ok') {
                        $('#trigger_user_doc_succes').trigger('click');
                    }
                }
            });
        } 
    })
}); 
</script>

