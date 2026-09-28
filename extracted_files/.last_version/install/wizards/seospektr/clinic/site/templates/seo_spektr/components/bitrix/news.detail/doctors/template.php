<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

?>
<div id="detail_personal">
    <div class="detail_personal_base_block">
        <div class="row">
            <div class="col-md-5">
                <div class="picture_doctors">
                <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])){?>
                    <img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="<?=$arResult["NAME"]?>"/>
                <?}?>
                </div>
            </div>
            <div class="col-md-7 flex-column">
                <div class="right_content_doctors">
                    <div class="info_line_doctor">
                        <span class="type_prop"><?=GetMessage("SPECIALIZATION")?></span>
                        <span class="value_prop"><a href="<?=$arResult["SECTION"]["URL"]?>"><?=$arResult["SECTION"]["NAME"]?></a></span>
                    </div>
                    <?if($arResult["DISPLAY_PROPERTIES"]["SPECIALIZATION"]["DISPLAY_VALUE"]){?>
                    <div class="info_line_doctor">
                        <span class="type_prop"><?=$arResult["DISPLAY_PROPERTIES"]["SPECIALIZATION"]["NAME"]?>:</span>
                        <?foreach($arResult["DISPLAY_PROPERTIES"]["SPECIALIZATION"]["DISPLAY_VALUE"] as $i => $specLink){?>
                        <span class="value_prop"><?=$specLink?><?=($i<count($arResult["DISPLAY_PROPERTIES"]["SPECIALIZATION"]["DISPLAY_VALUE"])-1)?", ":"";?></span>
                        <?}?>
                    </div>
                    <?}?>
                    <?if($arResult["DISPLAY_PROPERTIES"]["EXPERIENCE"]["VALUE"]){?>
                    <div class="info_line_doctor">
                        <span class="type_prop"><?=$arResult["DISPLAY_PROPERTIES"]["EXPERIENCE"]["NAME"]?>:</span>
                        <span class="value_prop"><?=$arResult["DISPLAY_PROPERTIES"]["EXPERIENCE"]["VALUE"]?></span>
                    </div>
                    <?}?>
                </div>
                <div class="contacts_doctors flex-column">
                    <?if($arResult["DISPLAY_PROPERTIES"]["PHONE"]["DISPLAY_VALUE"]){?>
                    <div class="type_contacts line">
                        <i class="fa fa-phone bvi-hide"></i>
                        <div class="item_contacts">
                            <div class="item_phone">
                                <a href="tel:<?=$arResult["DISPLAY_PROPERTIES"]["PHONE"]["DISPLAY_VALUE"]?>" rel="nofollow" target=""><?=$arResult["DISPLAY_PROPERTIES"]["PHONE"]["DISPLAY_VALUE"]?></a>
                            </div>
                        </div>

                    </div>
                    <?}?>
                    <?if($arResult["DISPLAY_PROPERTIES"]["EMAIL"]["DISPLAY_VALUE"]){?>
                    <div class="type_contacts line">
                        <i class="fa fa-envelope bvi-hide"></i>
                        <div class="item_contacts">
                            <div class="item_phone">
                                <a href="mailto:<?=$arResult["DISPLAY_PROPERTIES"]["EMAIL"]["DISPLAY_VALUE"]?>"><?=$arResult["DISPLAY_PROPERTIES"]["EMAIL"]["DISPLAY_VALUE"]?></a>
                            </div>
                        </div>
                    </div>
                    <?}?>
                    <div class="type_contacts bvi-hide">
                        <div class="item_contacts">
                            <?if($arResult["DISPLAY_PROPERTIES"]["INSTAGRAM"]["VALUE"]){?>
                            <a href="<?=$arResult["DISPLAY_PROPERTIES"]["INSTAGRAM"]["VALUE"]?>" class="social_item_doctor " rel="nofollow" target="_blank"><i class="fa fa-instagram"></i></a>
                            <?}?>
                            <?if($arResult["DISPLAY_PROPERTIES"]["FACEBOOK"]["VALUE"]){?>
                            <a href='<?=$arResult["DISPLAY_PROPERTIES"]["FACEBOOK"]["VALUE"]?>' class="social_item_doctor" rel="nofollow" target="_blank"><i class="fa fa-facebook"></i></a>
                            <?}?>
                            <?if($arResult["DISPLAY_PROPERTIES"]["WHATSAPP"]["VALUE"]){?>
                            <a href="<?=$arResult["DISPLAY_PROPERTIES"]["WHATSAPP"]["VALUE"]?>" class="social_item_doctor" rel="nofollow" target="_blank"><i class="fa fa-whatsapp"></i></a>
                            <?}?>
                            <?if($arResult["DISPLAY_PROPERTIES"]["VK"]["VALUE"]){?>
                            <a href="<?=$arResult["DISPLAY_PROPERTIES"]["VK"]["VALUE"]?>" class="social_item_doctor" rel="nofollow" target="_blank"><i class="fa fa-vk"></i></a>
                            <?}?>
                            <?if($arResult["DISPLAY_PROPERTIES"]["TELEGRAM"]["VALUE"]){?>
                            <a href="<?=$arResult["DISPLAY_PROPERTIES"]["TELEGRAM"]["VALUE"]?>" class="social_item_doctor" rel="nofollow" target="_blank"><i class="fa fa-telegram"></i></a>
                            <?}?>
                        </div>

                    </div>
                    <div class="button_to_order">
                        <a href="/about/online_order/" rel="nofollow" class="btn green_btn show_visually"><?=GetMessage("ONLINE_RECORDING")?></a>
                        <span data-src="#order_doctor" class="green_btn border_button bvi-hide" data-fancybox="" data-title-form-doctor="<?=$arResult["NAME"]?>"><i class="fa fa-pencil"></i><?=GetMessage("ONLINE_RECORDING")?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
			<div class="detail_personal_tabs_block ">
				<div class="tabs bvi-hide">
                    <?if($arResult["DETAIL_TEXT"] <> ''){?>
					<div class="item_tab active" id="tab_education"><?=GetMessage("EDUCATION")?></div>
                    <?}?>
                    <?if($arResult["DISPLAY_PROPERTIES"]["SERTIFICATS"]["VALUE"]){?>
					<div class="item_tab" id="tab_certificates"><?=GetMessage("SERTIFICATS")?></div>
                    <?}?>
                    <?if($arParams["SHOW_REVIEWS"] == "Y"){?>
					<div class="item_tab" id="tab_reviews">
                        Отзывы 
                        <?if(is_countable($arResult["REVIEWS"])){?>
                        (<?=count($arResult["REVIEWS"])?>)
                        <?}?>
                    </div>
                    <?}?>
                    <?if($arResult["DISPLAY_PROPERTIES"]["MORE_PHOTO"]["VALUE"]){?>
					<div class="item_tab" id="tab_gallery"><?=GetMessage("GALLERY")?></div>
                    <?}?>
				</div>
				<div class="tabs_content">
                    <?if($arResult["DETAIL_TEXT"] <> ''){?>
					<div class="item_content_tab active bvi-speech" data-tab="tab_education">
						<div class="title_tabs show_visually"><?=GetMessage("EDUCATION")?></div>
						<?=$arResult["DETAIL_TEXT"]?>
					</div>
                    <?}?>
                    <?if($arResult["DISPLAY_PROPERTIES"]["SERTIFICATS"]["FILE_VALUE"]){?>
					<div class="item_content_tab" data-tab="tab_certificates">
						<div class="title_tabs show_visually"><?=GetMessage("SERTIFICATS")?></div>
						<div id="documents">
							<div class="row">
                                <?foreach($arResult["DISPLAY_PROPERTIES"]["SERTIFICATS"]["VALUE"] as $file){?>
                                    <?
                                        $arFile = CFile::GetFileArray($file);
                                    ?>
								<div class="col-sm-6 col-md-2">
									<div class="item_picture_licenzi">
										 <div class="image">
											<span data-fancybox="" data-src="<?=$arFile["SRC"]?>">
												<img src="<?=$arFile["SRC"]?>" alt="<?=$arFile["DESCRIPTION"]?>">
											</span>
										 </div>
									</div>
								</div>
                                <?}?>
							</div>
						</div>
					</div>
                    <?}?>