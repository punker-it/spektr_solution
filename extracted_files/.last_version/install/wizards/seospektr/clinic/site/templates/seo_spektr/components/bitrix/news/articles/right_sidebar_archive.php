<?
$arDates = array();
$months_name = array('01'=>GetMessage("JANUARY"), '02'=>GetMessage("FEBRUARY"), '03'=>GetMessage("MARTH"), '04'=>GetMessage("APTIL"), '05'=>GetMessage("MAY"), '06'=>GetMessage("JUNE"), '07'=>GetMessage("JULY"), '08'=>GetMessage("AUGUST"), '09'=>GetMessage("SEPTEMBER"), '10'=>GetMessage("OCTOBER"), '11'=>GetMessage("NOVEMBER"), '12'=>GetMessage("DECEMBER")); 
$resElements = CIBlockElement::GetList(
    array("ACTIVE_FROM"=>"ASC"),
    array("IBLOCK_ID"=>$arParams["IBLOCK_ID"], "ACTIVE"=>"Y"),
    false,
    false,
    array()
);
while($ob = $resElements->GetNextElement()) { 
    $arFields = $ob->GetFields();  
    $expDate = explode(".", $arFields["ACTIVE_FROM"]);
    if(array_key_exists($expDate[1], $months_name)) {
        $month = $months_name[$expDate[1]];
    }
    $expDateYear = explode(" ", $expDate[2]);
    $year = $expDateYear[0];
    $arDates[$month." ".$year]["ITEMS"][$arFields["ID"]] = $arFields;
    $arDates[$month." ".$year]["month"] = $expDate[1];
    $arDates[$month." ".$year]["year"] = $year;
}         
?>
<div class="item_sidebar">
    <div class="title"><?=GetMessage("ARCHIVES")?></div>
    <div class="archiv_sidebar">
        <ul>
        <?foreach($arDates as $name => $date){?>
            <li class="archiv_item"><span data-date="<?=$date["month"]."/".$date["year"]?>"><?=$name;?></span><span>(<?=count($date["ITEMS"])?>)</span></li>
        <?}?>
        </ul>
        <div class="reset btn green_btn" style="display:none;"><?=GetMessage("SHOW_ALL")?></div>
    </div>
</div>