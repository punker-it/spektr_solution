<?
$arFilter = Array("IBLOCK_ID"=>$arParams["IBLOCK_ID"], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
$arSelect = Array("ID","TAGS",);
$res = CIBlockElement::GetList(Array(), $arFilter, false,false, $arSelect);
$tags_field=[];
while($ob = $res->GetNextElement())
{
 $arFields = $ob->GetFields();
 $tags_field[$arFields["ID"]].=$arFields["TAGS"];
}
foreach($tags_field as $keyTag=>$tag){
  $tag=explode(',',$tag);
  foreach($tag as $key => $val){
    $tags_final[].=trim($val);
  }
}
$tags_final=array_unique($tags_final);
?>
<div class="item_sidebar">
  <div class="title"><?=GetMessage("TAGS")?></div>

  <div class="tags_sidebar">
    <ul>
      <?foreach ($tags_final as $value) {?>
          <li><a <?if($_GET['serarchTag']==$value):?>class="active"<?endif;?> href="<?=$arParams["SEF_FOLDER"]?>?serarchTag=<?=$value;?>"><?=$value;?></a></li>
      <?}?>
    </ul>
    <?if(isset($_GET['serarchTag'])){?>
      <a href="<?=$APPLICATION->GetCurPage();?>" class="btn green_btn"><?=GetMessage("SHOW_ALL")?></a>
    <?}?>
  </div>
</div>
