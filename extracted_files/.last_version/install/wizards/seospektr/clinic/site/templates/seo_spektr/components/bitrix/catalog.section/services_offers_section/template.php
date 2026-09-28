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
    <?if($arResult["GROUPS"]){?>    
        <?$countGroups = 0;?>
        <?foreach($arResult["GROUPS"] as $name => $arGorup) {?>    
            <div class="col-md-12">
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                            <td colspan="2" <?=($countGroups % 2 != 0)?'class="silver_color"':'';?>><?=$name?></td>
                            </tr>
                        </thead>
                        <tbody>
                        <?foreach($arGorup["ITEMS"] as $item){?>
                            <tr>
                                <td><?=$item['NAME']?></td>
                                <td><?=$item['PRICE']?> <?=GetMessage("CURRENCY");?></td>
                            </tr>
                        <?}?>    
                        </tbody>
                    </table>
                </div>
            </div>
            <?$countGroups++;?>
        <?}?>
    <?}else{?> 
        <h2  id="price"><?=GetMessage("PRICE_TITLE");?></h2>
        <div class="col-md-12">
            <div class="table-responsive">
                <table>
                    <tbody>
                    <?foreach($arResult["ITEMS"] as $item){?>
                        <tr>
                            <td><?=$item['NAME']?></td>
                            <td><?=$item['ITEM_PRICES'][0]['PRICE']?> <?=GetMessage("CURRENCY");?></td>
                        </tr>
                    <?}?>    
                    </tbody>
                </table>
            </div>
        </div>
        <?foreach($arResult["ITEMS"] as $item) {?>
        <?}?> 
    <?}?>    
    </div>
</div>