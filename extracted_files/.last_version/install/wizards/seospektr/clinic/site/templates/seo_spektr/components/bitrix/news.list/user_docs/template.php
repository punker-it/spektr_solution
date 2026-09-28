<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
    
$this->setFrameMode(true);
?>

<div class="row user_docs">
    <?if($arResult["DOCS"]){?>
    <div class="col-md-12 user_docs_nav_wrap">
        <div class="timetable_reload">
            <i class="fa fa-repeat"></i>
        </div>
        <div class="user_docs_nav">
            <div class="user_docs_nav_item"><?=GetMessage("USER_DOCS_NAV_TITLE")?></div>
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
        <div class="user_docs_item" date="<?=$document["FILTER_DATE"]?>">
            <div class="user_docs_item-top">
                <div class="name"><?=$document["NAME"]?$document["NAME"]:$document["ORIGINAL_NAME"];?></div>
                <i class="fa fa-chevron-circle-down"></i>
            </div>
            <div class="user_docs_item-middle">
                <div class="date">
                    <span class="date_text"><?=GetMessage("USER_DOCS_DATE")?></span>
                    <span class="date_numb"><?=$document["DATE"]?></span>
                </div>
                <div class="user_docs_links">
                    <div class="decription"><?=GetMessage("USER_DOCS_LINK_DECRIPTION")?></div>
                    <div class="user_docs_item-buttom">
                        <a href="<?=$document["SRC"]?>" class="btn btn-default" download>
                            <i class="fa fa-download"></i>
                            <?=GetMessage("USER_DOCS_DOWNLOAD_FILE")?>
                        </a>
                        <button class="btn send_user_doc" data-doc-id="<?=$document["ID"]?>">
                            <i class="fa fa-envelope-o"></i>
                            <?=GetMessage("USER_DOCS_SEND_TO_EMAIL")?>
                        </button>
                    </div>
                </div>
            </div>
        </div>    
        <?}?>
    </div>    
    <?} else {?>
    <div class="error"><?=GetMessage("USER_DOCS_ERROR")?></div>
    <?}?>
</div>