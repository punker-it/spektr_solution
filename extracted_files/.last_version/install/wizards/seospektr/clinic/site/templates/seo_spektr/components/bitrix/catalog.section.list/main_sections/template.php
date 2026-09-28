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

$arViewModeList = $arResult['VIEW_MODE_LIST'];

$arViewStyles = array(
	'LIST' => array(
		'CONT' => 'bx_sitemap',
		'TITLE' => 'bx_sitemap_title',
		'LIST' => 'bx_sitemap_ul',
	),
	'LINE' => array(
		'CONT' => 'bx_catalog_line',
		'TITLE' => 'bx_catalog_line_category_title',
		'LIST' => 'bx_catalog_line_ul',
		'EMPTY_IMG' => $this->GetFolder().'/images/line-empty.png'
	),
	'TEXT' => array(
		'CONT' => 'bx_catalog_text',
		'TITLE' => 'bx_catalog_text_category_title',
		'LIST' => 'bx_catalog_text_ul'
	),
	'TILE' => array(
		'CONT' => 'bx_catalog_tile',
		'TITLE' => 'bx_catalog_tile_category_title',
		'LIST' => 'bx_catalog_tile_ul',
		'EMPTY_IMG' => $this->GetFolder().'/images/tile-empty.png'
	)
);
$arCurView = $arViewStyles[$arParams['VIEW_MODE']];

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));

?>
<?if($arParams["SERVICE_TITLE"]){?>
<h2 style="text-align:center"><?=$arParams["SERVICE_TITLE"]?></h2>
<br>
<br>
<?}?>
<div class="container_page">
    <?if($arParams["SUB_TITLE"]){?>
    <div class="sub_title">
        <?=$arParams["SUB_TITLE"]?>
    </div>
    <?}?>
    <div class="row">
    <?$bigImage = true;?>    
    <?$i = 0;?>    
    <?$bigCount = 1;?>    
    <?foreach($arResult["SECTIONS"] as $key => $section){?>
        <?if(is_int($i/3)) $bigImage = true;?>
        <?if($bigImage)  $bigCount++;?>
        <div class="col-md-<?=$bigImage?'12':'6'?>">
            <a href="<?=$section["SECTION_PAGE_URL"]?>" class="<?=$bigImage?'big_section_services':'two_column'?><?=($bigCount % 2 != 0)?' flex_reverse':'';?>" rel="nofollow">
                <?$sectionPicture = CFile::ResizeImageGet($section["PICTURE"]["ID"],array("width" => $bigImage?560:280, "height" => $bigImage?330:330),BX_RESIZE_IMAGE_EXACT ,true,);?>
                
                <div class="<?=$bigImage?'image':'image_mini'?>" style="background: url('<?=$sectionPicture["src"]?$sectionPicture["src"]:SITE_TEMPLATE_PATH."/image/no_image-1024x682.png";?>') center no-repeat;background-size: cover;">
                    
                </div>
                <?if($bigImage){?><div class="one_coloumn"><?}?>
                    <div class="<?=$bigImage?'description':'description_mini'?>">
                        <div class="title">
                            <span><?=$section["NAME"]?></span>
                        </div>
                        <div class="description bvi-speech">
                            <?=$section["PREVIEW"]?>
                        </div>
                        <div class="button">
                            <span class="border_button"><?=GetMessage("SERVICES_MORE")?></span>
                        </div>
                    </div>
                <?if($bigImage){?></div><?}?>
            </a>
        </div>
        <?$bigImage = false;?>   
        <?$i++;?>
    <?}?>
    </div>
</div>