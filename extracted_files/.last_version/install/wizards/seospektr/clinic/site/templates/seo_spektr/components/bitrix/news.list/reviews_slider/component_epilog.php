<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use \Bitrix\Main\Localization\Loc; 
Loc::loadLanguageFile(__FILE__); 
$APPLICATION->AddHeadScript("script.js");
?>
<div class="modal_form" id="send_reviews">
    <div class="title_form"><?=GetMessage("LEAVE_A_PREVIEW")?> <span class="dynamic_sub_title"></span></div>
    <div class="form_success"><?=GetMessage("SUCCESS_PREVIEW")?></div>
    <form id="reviews_form" class="contacts_page_form_send">
        <div class="form_group">
            <input type="text" name="name" placeholder="<?=GetMessage("FORM_NAME_PLACEHOLDER")?>" required>
        </div>
        <div class="form_group">
            <input type="text" name="email" placeholder="<?=GetMessage("FORM_EMAIL_PLACEHOLDER")?>">
        </div>
        <div class="form_group">
            <input type="text" name="phone" placeholder="<?=GetMessage("FORM_PHONE_PLACEHOLDER")?>">
        </div>
        <div class="form_group">
            <div class="form-group">
                <label class="label_input_file">
                    <i class="fa fa-paperclip"></i>
                    <span class="title_add_file"><?=GetMessage("FORM_ADD_FILE")?></span>
                    <input type="file">
                </label>
            </div>
        </div>
        <div class="form_group">
            <textarea name="review" placeholder="<?=GetMessage("FORM_MESSAGE_PLACEHOLDER")?>" required></textarea>
        </div>
        <div class="form_group">
            <input type="submit" class="color_button" value="<?=GetMessage("FORM_SUBMIT_TEXT")?>">
        </div>
    </form>
</div>
<script>
$(document).ready(function() {
    $('#reviews_form').on('submit', function(e) {
        e.preventDefault();
        var form = $(this);
         var formData = new FormData(form.get(0));
        formData.append('sessid', '<?=bitrix_sessid()?>'); 
        
        $.ajax({
             url: '<?=SITE_DIR?>ajax/reviews_doctors.php', 
            type: 'POST', 
            dataType: 'json', 
            cache: false,
			contentType: false,
			processData: false,
			data: formData,
			dataType : 'json',
            success: function(data) {
                $(':input','#reviews_form')
                    .not(':button, :submit, :reset, :hidden')
                    .val('')
                    .removeAttr('checked')
                    .removeAttr('selected');
                form.parent().find('.form_success').show();
            }
        });
    })
});
</script>