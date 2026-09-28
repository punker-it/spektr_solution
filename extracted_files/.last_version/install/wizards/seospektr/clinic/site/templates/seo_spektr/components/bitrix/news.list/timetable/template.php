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

$curDate = date('d.m.Y H:i:s');

?>
 
<div class="row timetable">
    <div class="col-md-12 timetable_nav_wrap">
        <div class="timetable_reload">
            <i class="fa fa-repeat"></i>
        </div>
        <div class="timetable_nav">
            <div id="all" class="timetable_nav_item"><?=GetMessage("TIMETABLE_ITEM_NAV_ALL")?></div>
            <div id="planned" class="timetable_nav_item active"><?=GetMessage("TIMETABLE_ITEM_NAV_PLANNED")?></div>
            <div id="past" class="timetable_nav_item"><?=GetMessage("TIMETABLE_ITEM_NAV_PAST")?></div>
            <div id="caneled" class="timetable_nav_item"><?=GetMessage("TIMETABLE_ITEM_NAV_CANCELED")?></div>
        </div>
    </div>
<?foreach($arResult["ITEMS"] as $key => $arItem){?>
    <?
    //print_r($arItem);
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>
    <?if($arItem["DISPLAY_DATE"]) {?>
    <div class="col-md-12 timetable_date<?=$arItem["ITEM_CLASS"]=="planned"?" active":"";?>"><?=$arItem["DISPLAY_DATE"]?></div>
    <?}?>
    <div class="col-md-12 timetable_item <?=$arItem["ITEM_CLASS"]?><?=$arItem["ITEM_CLASS"]=="planned"?" active":"";?>">
        <div class="preview active">
            <div class="date"><?=substr($arItem["ACTIVE_FROM"], 11, -3)?></div>
            <div class="name_wrap">
                <div class="name"><?=$arItem["NAME"]?></div>
                <div class="doctor">
                    <a href="<?=$arItem["DOCTOR"]["DETAIL_PAGE_URL"]?>"><?=$arItem["DOCTOR"]["ABBREVIATED"]?></a>
                </div>
            </div>
            <div class="price_wrap">
                <?if($arItem["PROPERTIES"]["STATUS"]["VALUE_XML_ID"] == "DEFAULT"){?>
                <i class="fa fa-exclamation-circle"></i>
                <?}else{?>
                <i class="fa fa-check-circle-o"></i>
                <?}?>
                <span class="price"><?=$arItem["PROPERTIES"]["PRICE"]["VALUE"]?> <?=GetMessage("TIMETABLE_ITEM_CURRENCY")?></span>
                <i class="fa fa-chevron-circle-right"></i>
            </div>
        </div>
        <div class="main">
            <div class="name"><?=GetMessage("TIMETABLE_ITEM_NAME")?> <?=$arItem["ID"]?><i class="fa fa-chevron-circle-up"></i></div>
            <div class="props_list">
                <div class="props_item">
                    <div class="prop_name"><?=GetMessage("TIMETABLE_PROPS_SERVICE")?></div>
                    <div class="prop_value"><?=$arItem["NAME"]?></div>
                </div>
                <div class="props_item">
                    <div class="prop_name"><?=GetMessage("TIMETABLE_PROPS_DATE")?></div>
                    <div class="prop_value"><?=FormatDate("D d F Y, G:i", MakeTimeStamp($arItem["ACTIVE_FROM"]))?></div>
                </div>
                <div class="props_item">
                    <div class="prop_name"><?=GetMessage("TIMETABLE_PROPS_PRICE")?></div>
                    <div class="prop_value">
                        <span class="price"><?=$arItem["PROPERTIES"]["PRICE"]["VALUE"]?> <?=GetMessage("TIMETABLE_ITEM_CURRENCY")?></span>
                        <div class="status">
                            <?if($arItem["PROPERTIES"]["STATUS"]["VALUE_XML_ID"] == "DEFAULT"){?>
                            <i class="fa fa-exclamation-circle"></i>
                            <?}else{?>
                            <i class="fa fa-check-circle-o"></i>
                            <?}?>
                            <span><?=$arItem["PROPERTIES"]["STATUS"]["VALUE"]?></span>
                        </div> 
                    </div>
                </div>
                <div class="props_item">
                    <div class="prop_name"><?=GetMessage("TIMETABLE_PROPS_STATUS")?></div>
                    <div class="prop_value">
                        <?if($arItem["ACTIVE"]=="N") {
                            echo GetMessage("TIMETABLE_PROPS_STATUS_CANCELED");
                        } elseif($arItem["ITEM_CLASS"]=="planned") {
                            echo GetMessage("TIMETABLE_PROPS_STATUS_OK");
                        } else {
                            echo GetMessage("TIMETABLE_PROPS_STATUS_PAST");
                        }?>
                    </div>
                </div>
            </div>
            <div class="props_list">
                <div class="props_item doctor">
                    <div class="prop_name"><?=GetMessage("TIMETABLE_PROPS_DOCTOR")?></div>
                    <div class="prop_value">
                        <img src="<?=$arItem["DOCTOR"]["PREVIEW_PICTURE_SRC"]?>" alt="<?=$arItem["DOCTOR"]["NAME"]?>">
                        <div class="doctor_name">
                            <a href="<?=$arItem["DOCTOR"]["DETAIL_PAGE_URL"]?>"><?=$arItem["DOCTOR"]["NAME"]?></a>
                            <div class="desc"><?=$arItem["DOCTOR"]["PREVIEW_TEXT"]?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="props_list">
                <div class="props_item">
                    <div class="prop_name"><?=GetMessage("TIMETABLE_PROPS_CLINIC")?></div>
                    <div class="prop_value">
                        <div class="clinic_name">
                            <?$APPLICATION->IncludeFile(SITE_DIR."include/clinic_name.php")?>
                        </div>
                        <div class="work_time">
                            <?$APPLICATION->IncludeFile(SITE_DIR."include/header_work_time.php")?>
                        </div>
                        <div class="adress">
                            <i class="fa fa-map-marker"></i>
                            <?$APPLICATION->IncludeFile(SITE_DIR."include/header_adress.php")?>
                        </div>
                        <div class="">
                            <?$APPLICATION->IncludeFile(SITE_DIR."include/header_phones.php")?>
                        </div>
                    </div>
                </div>
            </div>
            <?if($arItem["ITEM_CLASS"]=="planned"){?>
            <div data-cancel="<?=($arItem["PROPERTIES"]["STATUS"]["VALUE_XML_ID"]=="DEFAULT")?"cancel":"call";?>" data-id="<?=$arItem["ID"]?>" class="timetable_cancel btn"><i class="fa fa-times"></i><?=GetMessage("TIMETABLE_CANCEL")?></div>
            <?}?>
            
        </div>    
        
    </div>
<?}?>
    
</div>
