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
<?if($arResult["ROOT_SECTIONS"]) {?>
<div id="service_tabs">
    <ul class="nav_tabs">
        <?$count=0;?>
        <?foreach($arResult["ROOT_SECTIONS"] as $key => $tabLink) {?>
        <li>
            <div data-href="<?=$key?>" class="tab_link<?=$count==0?" active":"";?>"><?=$tabLink["NAME"]?$tabLink["NAME"]:GetMessage("DEFAULT_TITLE");?></div>
        </li>
        <?$count++;?>
        <?}?>

    </ul>
    <div class="tab_content">
        <?$count=0;?>
        <?foreach($arResult["ROOT_SECTIONS"] as $key => $rootSection) {?>  

        <div class="list_sections tab_pane <?=$count==0?"active":"";?>" id="<?=$key?>">
        <?if(!empty($rootSection["SECTIONS"])){?>    
            <?foreach($rootSection["SECTIONS"] as $section) { ?>
            <div class="item_section">
                <div class="row">
                    <div class="col-md-6">
                        <div class="image">
                        <img src="<?=$section["PICTURE"]["SRC"]?>" alt="<?=$section["NAME"]?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="one_coloumn">
                            <div class="description">
                                <div class="title">
                                    <a href="<?=$section["SECTION_PAGE_URL"]?>"><?=$section["NAME"]?></a>
                                </div>
                                <div class="description">
                                    <?if(!empty($section["ELEMENTS"])){?>
                                    <ul class="elements_list">
                                        <?foreach($section["ELEMENTS"] as $elem) {?>
                                            <?if($elem["PROPERTY_HIDE_IN_MENU_VALUE"]!="Y"){?>
                                            <li><a href="<?=$elem["DETAIL_PAGE_URL"]?>"><?=$elem["NAME"]?></a></li>
                                            <?}?>
                                        <?}?>
                                    </ul>    
                                    <?}?>
                                    <div class="subsections_list">
                                        <ul>
                                            <?foreach($section["CHILDS"] as $childSection) {?>
                                            <li><a href="<?=$childSection["SECTION_PAGE_URL"]?>"><?=$childSection["NAME"]?></a>
                                                <?if(!empty($childSection["ELEMENTS"])){?>
                                                <ul class="elements_list">
                                                    <?foreach($childSection["ELEMENTS"] as $elem) {?>
                                                        <?if($elem["PROPERTY_HIDE_IN_MENU_VALUE"]!="Y"){?>
                                                        <li><a href="<?=$elem["DETAIL_PAGE_URL"]?>"><?=$elem["NAME"]?></a></li>
                                                        <?}?>
                                                    <?}?>
                                                </ul>    
                                                <?}?>
                                            </li>
                                            <?}?>
                                        </ul>
                                    </div>
                                    <div class="bvi-speech">
                                        <?=htmlspecialchars_decode($section["UF_PREVIEW"])?>
                                    </div>
                                </div>
                                <div class="button">
                                    <a href="<?=$section["SECTION_PAGE_URL"]?>" rel="nofollow" class="border_button">Подробнее</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <?}?> 
        <?}if(!empty($rootSection["ELEMENTS"])){?>
            <?foreach($rootSection["ELEMENTS"] as $elem) { ?>
            <div class="item_section">
                <div class="row">
                    <div class="col-md-6">
                        <div class="image">
                        <?if($elem["PREVIEW_PICTURE"]) $elemImg = CFile::GetPath($elem["PREVIEW_PICTURE"]);?>
                        <img src="<?=$elemImg?>" alt="<?=$elem["NAME"]?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="one_coloumn">
                            <div class="description">
                                <div class="title">
                                    <a href="<?=$elem["DETAIL_PAGE_URL"]?>"><?=$elem["NAME"]?></a>
                                </div>
                                <div class="description">
                                    <div class="bvi-speech">
                                        <?=$elem["PREVIEW_TEXT"]?>
                                    </div>
                                </div>
                                <div class="button">
                                    <a href="<?=$elem["DETAIL_PAGE_URL"]?>" rel="nofollow" class="border_button">Подробнее</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?unset($elemImg);?>
            <?}?> 
        <?}?>    
        </div>    
        <?$count++;?>
        <?}?>     
    </div>    
</div>    
<?}?>    
