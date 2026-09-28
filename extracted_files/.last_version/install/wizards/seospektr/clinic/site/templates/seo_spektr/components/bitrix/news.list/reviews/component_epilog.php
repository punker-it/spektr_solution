<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use \Bitrix\Main\Localization\Loc; 
Loc::loadLanguageFile(__FILE__); 
$APPLICATION->AddHeadScript("script.js");
?>

<div class="contacts_page_form no_margin content">
    <div class="title"><?=GetMessage("LEAVE_A_PREVIEW")?></div>
    <div class="form_success"><?=GetMessage("SUCCESS_PREVIEW")?></div>
    <form id="reviews_form" class="contacts_page_form_send" enctype=”multipart/form-data”>
        <div class="row">
            <div class="col-md-6">
                <input type="text" name="name" placeholder="<?=GetMessage("FORM_NAME_PLACEHOLDER")?>" required>
            </div>
            <div class="col-md-6">
                <input type="text" name="email" placeholder="<?=GetMessage("FORM_EMAIL_PLACEHOLDER")?>">
            </div>
            <div class="col-md-6">
                <input type="text" name="phone" placeholder="<?=GetMessage("FORM_PHONE_PLACEHOLDER")?>">
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label class="label_input_file">
                    <i class="fa fa-paperclip"></i>
                    <span class="title_add_file"><?=GetMessage("FORM_ADD_FILE")?></span>
                    <input type="file" name="file" accept=".jpg,.jpeg,.png,.webp,.bmp">
                </label>
                </div>
            </div>
            <div class="col-md-12">
                <textarea name="review" placeholder="<?=GetMessage("FORM_MESSAGE_PLACEHOLDER")?>" required></textarea>
            </div>
            <div class="col-md-12">
                <p class="privacy-policy"><?=GetMessage("PRIVACY_POLICY")?></p>
                <input type="submit" class="color_button" value="<?=GetMessage("FORM_SUBMIT_TEXT")?>">
                
            </div>
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
            type: 'POST',
            url: '<?=SITE_DIR?>ajax/reviews.php', 
            cache: false,
			contentType: false,
			processData: false,
			data: formData,
			dataType : 'json',
            success: function(json) {
                $(':input','#reviews_form')
                    .not(':button, :submit, :reset, :hidden')
                    .val('')
                    .removeAttr('checked')
                    .removeAttr('selected');
                form.parent().find('.form_success').show();
            },error: function(req, text, error){
            console.error('Ошибка: ' + text + ' | ' + error);
            }
            
        });
    })
});
</script>