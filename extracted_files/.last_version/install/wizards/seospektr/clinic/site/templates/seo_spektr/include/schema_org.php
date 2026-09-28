<?
$arFilter = Array(
	"IBLOCK_ID"=>"#CONTACTS_IBLOCK_ID#",
	"ACTIVE"=>"Y"
);
$arSelect = Array(
	"ID", 
	"IBLOCK_ID", 
	"NAME", 
);

$res = CIBlockElement::GetList(Array(), $arFilter, false,false, $arSelect);
	while($ob = $res->GetNextElement()){
		 $arFields = $ob->GetFields();
		 $arProps = $ob->GetProperties();
	}

$scheme = isset($_SERVER['HTTP_SCHEME']) ? $_SERVER['HTTP_SCHEME'] : (((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ||443 == $_SERVER['SERVER_PORT']) ? 'https://' : 'http://');
?>

<script type="application/ld+json">
    {
    "@context": "https://schema.org",
    "@type": "LocalBusiness",
    "additionalType":"AutoRental",
    "name": "<?=$arFields["NAME"]?>",
    "email": "<?=$arProps["EMAIL"]["VALUE"]?>",
    "openingHours": "<?=$arProps["OPENING_HOURS"]["VALUE"]?>",
    "telephone": "<?=$arProps["TELEPHONE"]["VALUE"];?>",
    "image": "<?=$arProps["IMAGE"]["VALUE"]?>",
    "url": "<?=$scheme;?><?=$_SERVER["SERVER_NAME"];?><?=$APPLICATION->GetCurPage();?>",
    "address": 
        {
        "@type": "PostalAddress",
        "addressCountry": "<?=$arProps["ADDR_COUNTRY"]["VALUE"]?>",
        "addressRegion": "<?=$arProps["ADDR_REGION"]["VALUE"]?>",
        "addressLocality": "<?=$arProps["ADDR_LOCALITY"]["VALUE"]?>",        
        "postalCode":"<?=$arProps["POSTAL_CODE"]["VALUE"]?>",
        "streetAddress": "<?=$arProps["STREET_ADDRESS"]["VALUE"]?>"
        },
    "geo": 
        {
        "@type": "GeoCoordinates",
        "latitude": "<?=$arProps["LATITUDE"]["VALUE"]?>",
        "longitude": "<?=$arProps["LONGITUDE"]["VALUE"]?>"
        }
    }
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "WPHeader",
    "headline": "<?=$APPLICATION->GetPageProperty('title');?>",
    "description": "<?=$APPLICATION->GetPageProperty('description');?>"

}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "WPFooter",
    "copyrightYear": "<?=date('Y');?>"
}
</script>
