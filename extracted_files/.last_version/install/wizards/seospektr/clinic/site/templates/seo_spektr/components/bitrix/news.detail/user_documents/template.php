<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
    
$this->setFrameMode(true);
?>
<div class="user_docs">
    <?if($arResult["DOCS"]){?>
    <div class="user_docs_nav_wrap">
        <div class="timetable_reload">
            <i class="fa fa-repeat"></i>
        </div>
        <div class="user_docs_nav_title"><?=GetMessage("USER_DOCS_NAV_TITLE")?></div>
        <div class="user_docs_nav">
            <?foreach($arResult["DOCS"] as $key => $doc){?>
                <?
                if(!$key) {
                    $prevDate = $doc["FILTER_DATE"];
                    $curDate = $doc["FILTER_DATE"];
                } else {
                    $curDate = $doc["FILTER_DATE"];
                    if($prevDate == $curDate) continue;
                }
                
                ?>
                <div class="user_docs_nav_item"><?=$doc["FILTER_DATE"]?></div>
            <?}?>
        </div>
    </div>
    <div class="user_docs_list">
        <?foreach($arResult["DOCS"] as $document){?>
        <div class="user_docs_item">
            <div class="name"><?=$document["NAME"]?$document["NAME"]:$document["ORIGINAL_NAME"];?></div>
            <div class="date">
                <?=GetMessage("USER_DOCS_DATE")?>
                <?=$document["DATE"]?>
            </div>
            <div class="user_docs_links">
                <div class="decription"><?=GetMessage("USER_DOCS_LINK_DECRIPTION")?></div>
                <a href="<?=$document["SRC"]?>" class="btn btn-default" download>
                    <i class="fa fa-download"></i>
                    <?=GetMessage("USER_DOCS_DOWNLOAD_FILE")?>
                </a>
                <button class="btn">
                    <i class="fa fa-envelope-o"></i>
                    <?=GetMessage("USER_DOCS_SEND_TO_EMAIL")?>
                </button>
            </div>
        </div>    
        <?}?>
    </div>    
    <?} else {?>
    <div class="error"><?=GetMessage("USER_DOCS_ERROR")?></div>
    <?}?>
</div>