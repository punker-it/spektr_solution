<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

$APPLICATION->AddHeadScript("script.js");
?>

<?if($arParams["SHOW_REVIEWS"] == "Y"){?>
            <div class="item_content_tab" data-tab="tab_reviews">
                <div class="title_tabs show_visually"><?=GetMessage("REVIEWS")?></div>
                <?if($arResult["REVIEWS"]) {?> 
                <div id="main_reviews" class="list_page_reviews">
                    <?foreach($arResult["REVIEWS"] as $review) {?>
                    <div class="item_reviews">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="left_block">
                                    <div class="image">
                                        <img src="<?=SITE_TEMPLATE_PATH?>/image/smiley-icon.png" alt="">
                                    </div>
                                    <div class="title"><?=$review["NAME"]?></div>
                                    <div class="sub_title"><?=GetMessage("PRIVATE_PERSON")?></div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="content_description bvi-speech"><?=$review["DETAIL_TEXT"]?></div>
                            </div>
                        </div>
                    </div>
                    <?}?>
                </div>
                <?}?>
                <div class="contacts_page_form no_margin content">
                    <div class="title"><?=GetMessage("SEND_REVIEW")?></div>
                    <div class="form_success"><?=GetMessage("SEND_REVIEW_SUCCESS")?></div>
                    <form id="contacts_page_form_send" class="contacts_page_form_send" enctype="multipart/form-data">
                        <input type="hidden" name="doctor" value="<?=$arResult["ID"]?>">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="name" placeholder="<?=GetMessage("SEND_REVIEW_FORM_NAME")?>" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="email" placeholder="<?=GetMessage("SEND_REVIEW_FORM_EMAIL")?>">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="phone" placeholder="<?=GetMessage("SEND_REVIEW_FORM_PHONE")?>" required>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="label_input_file">
                                        <i class="fa fa-paperclip"></i>
                                        <span class="title_add_file"><?=GetMessage("ADD_FILE")?></span>
                                        <input type="file" name="file" accept=".jpg,.jpeg,.png,.webp,.bmp">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <textarea name="comment" placeholder="<?=GetMessage("SEND_REVIEW_FORM_MESSAGE")?>" required></textarea>
                            </div>
                            <div class="col-md-12">
                                <p class="privacy-policy"><?=GetMessage("PRIVACY_POLICY")?></p>
                                <input type="submit" class="color_button" value="<?=GetMessage("SEND_REVIEW_FORM_SUBMIT")?>">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?}?>
            <?if($arResult["MORE_PHOTO"]["VALUE"]){?>
            <div class="item_content_tab" data-tab="tab_gallery">
                <div class="wrappaer_gallery">
                    <div class="section_gallery">
                        <div class="title"><?=GetMessage("GALLERY")?></div>
                        <div class="content_gallery">
                            <div class="row">
                                <?foreach($arResult["MORE_PHOTO"]["VALUE"] as $photo){?>
                                    <?
                                        $arr_gallery_item=CFile::GetFileArray($photo);
                                    ?>
                                <div class="col-sm-6 col-md-3">
                                    <span class="item_gallery" data-src="<?=$arr_gallery_item["SRC"]?>" data-fancybox="">
                                        <img src="<?=$arr_gallery_item["SRC"]?>" alt="<?=$arr_gallery_item["DESCRIPTION"]?>">
                                    </span>
                                </div>
                                <?}?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?}?>
        </div>
    </div>


</div>
<script>
$(document).ready(function() {
    
    $('#contacts_page_form_send').on('submit', function(e) {
        
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
            success: function(json) {
                $(':input','#contacts_page_form_send')
                    .not(':button, :submit, :reset, :hidden')
                    .val('')
                    .removeAttr('checked')
                    .removeAttr('selected');
                form.parent().find('.form_success').show();
            },
            error: function(req, text, error){
                console.error('Ошибка: ' + text + ' | ' + error);
            }
            
        });
    })
});
</script>