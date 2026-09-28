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

<div class="table_coloumn_departament">
    <div class="row">
    <?if($arResult["SECTIONS"]){?> 
        <div class="col-md-12">
            <div class="table-responsive">
                <table>
                    <tbody>
                    <?foreach($arResult["SECTIONS"] as $section){?>
                        <tr>
                            <td colspan="2" class="<?=($section["DEPTH_LEVEL"]==1)?"green_color":"silver_color";?> <?=($section["PRICE"])?"detail_style":"";?>">
                                <a href="<?=$section["SECTION_PAGE_URL"]?>"><?=$section["NAME"]?></a>
                            </td>
                            <td class="<?=($section["DEPTH_LEVEL"]==1)?"green_color":"silver_color";?> <?=($section["PRICE"])?"detail_style":"";?>">
                                <?=$section["PRICE"]?$section["PRICE"]." ".GetMessage("CURRENCY"):"";?>
                            </td>
                        </tr>
                        <?foreach($section["ITEMS"] as $item){?>
                        <tr>
                            <td colspan="2" class="detail">
                                <a href="<?=$item["DETAIL_PAGE_URL"]?>"><?=$item["NAME"]?></a>
                            </td>
                            <td><?=$item["ITEM_PRICES"][0]["PRICE"]?> <?=GetMessage("CURRENCY")?></td>
                        </tr>
                        <?}?> 
                    <?}?>    
                    </tbody>
                </table>
            </div>
        </div>
    <?}?>    
    </div>
</div>