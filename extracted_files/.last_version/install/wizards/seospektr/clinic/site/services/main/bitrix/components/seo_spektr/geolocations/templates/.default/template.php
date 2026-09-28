<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?$this->setFrameMode(false);?>
<div class="region new">
    <span class="region__mark"><i class="fa fa-map-marker"></i></span>
    <span class="user-geo-position-value">
        <a href="#" class="region__link user-geo-position-value-link location__button" data-siteId="<?=SITE_ID?>">
            <span>
                <?if($arParams["INCLUDE_YANDEX_API"] == "Y"):?><?=GetMessage("DETECT_YOU_GEO_LOCATION")?><?else:?><?=$_SESSION["USER_GEO_POSITION"]["city"]?><?endif;?>
            </span>
        </a>
    </span>
    <div id="geo-location-window-small" class="hidden">
        <div class="location__confirm">
            <p><?=GetMessage("your_town")?> <span class="geo-location-window-city-value"><?=GetMessage("petrozavodsk")?></span>?</p>
            <div class="location__confirm-btns">
                <button class="btn btn-default button_text_white location__confirm_success"><?=GetMessage("yes")?></button>
                <button class="btn button_text_white OpenLocWin"><?=GetMessage("no")?></button>
            </div>
        </div>
    </div>
    <div id="geo-location-window" class="hidden">
        <div class="geo-location-window-container">
            <div class="geo-location-window-container-bg">
                <div class="location_container location">
                    <button type="button" class="modal-close geo-location-window-exit"><svg xmlns="http://www.w3.org/2000/svg" version="1" viewBox="0 0 24 24"><path d="M13 12l5-5-1-1-5 5-5-5-1 1 5 5-5 5 1 1 5-5 5 5 1-1z"></path></svg></button>
                    <div class="location__col location__col_region">
                        <ul class="loclist loclist_region loclist_region_primary">
                            <li class="search_label active"><a href="#" ><?=GetMessage("search_results")?></a></li>
                            <li class="loclist__item_all active"><a href="#" data_region_id="all" class="region_select"><?=GetMessage("cities")?></a></li>
							<?foreach($arResult["LOCATIONS"]["DEFAULTS"] as $region):?>
								<?if($region["REGION_ID"]):?>
                                    <li><a href="#" data_region_id="<?=$region["REGION_ID"];?>" class="region_select"><?=$region["REGION_NAME"];?></a></li>
								<?else:?>
                                    <li><a href="#" data-id="<?=$region["CITY_ID"];?>" data-parse-value="<?=$region["CITY_NAME"];?>" class="geo-location-window-list-item-link"><?=$region["CITY_NAME"];?></a></li>
								<?endif;?>
							<?endforeach;?>
                        </ul>
                        <div class="loclist__item_all active"><?=GetMessage("regions")?></div>
                        <ul class="loclist loclist_region loclist_region_secondary">
                            
							<?foreach($arResult["LOCATIONS"]["LIST"] as $key => $group):?>
								<?$first = true;?>
								<?foreach($group as $region):?>
									<?if($region["REGION_ID"]):?>
                                        <li><a href="#" data_region_id="<?=$region["REGION_ID"];?>" class="region_select">
												<?if($first):?>
                                                    <span><?=$key;?></span>
													<?$first = false;?>
												<?endif;?>
												<?=$region["REGION_NAME"];?>
                                            </a>
                                        </li>
									<?else:?>
                                        <li>

                                            <a href="#" data-id="<?=$region["CITY_ID"];?>" data-parse-value="<?=$region["CITY_NAME"];?>" class="geo-location-window-list-item-link">					<?if($first):?>
                                                    <span><?=$key;?></span>
													<?$first = false;?>
												<?endif;?>	<?=$region["CITY_NAME"];?></a></li>
									<?endif;?>
                                    <?if($region["REGION_NAME"]) $GLOBALS["regions"][] = $region["REGION_NAME"];?>
								<?endforeach;?>
							<?endforeach;?>
                        </ul>
                    </div>
                    <div class="location__col location__col_city">
							<span id="geo-location-window-fast-loader">
								<span class="f_circleG" id="frotateG_01"></span>
								<span class="f_circleG" id="frotateG_02"></span>
								<span class="f_circleG" id="frotateG_03"></span>
								<span class="f_circleG" id="frotateG_04"></span>
								<span class="f_circleG" id="frotateG_05"></span>
								<span class="f_circleG" id="frotateG_06"></span>
								<span class="f_circleG" id="frotateG_07"></span>
								<span class="f_circleG" id="frotateG_08"></span>
							</span>
                            <?/*
                        <div class="not_show_modile">
                            <div class="loclist__item_all active"><?=GetMessage("all_cities")?></div>
                            <ul class="loclist loclist_city">
                                
                            </ul>
                        </div>
                        */?>
                        <div>
                        <?/* <div class="loclist__item_all active"><?=GetMessage("all_cities")?></div>*/?>
                            <div class="title_location"><?=GetMessage("YOU_GEO_LOCATION_WINDOW_LABEL")?></div>
                            <div class="location__col location__col_search">
                                <div class="location__search form">
                                    <div class="form-group">
                                        <div class="geo-location-window-search">
                                            <label class="icon-search"></label>
                                            <input type="text" value="" placeholder="<?=GetMessage("PLACEHOLDER_LABEL")?>" class="geo-location-window-search-input">
                                            <i class="search_icon"></i>
                                            <button type="button" class="clear" style="display:none">×</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="location__text">
                                    <?=htmlspecialchars_decode($arParams["INFO_TEXT"]);?>
                                </div>
                            </div>
                            <ul class="loclist loclist_city">
                                
                            </ul>
                        </div>
                        <ul class="geo-location-window-search-values loclist loclist_city_search"></ul>
                    </div>
                    
                </div>

            </div>

        </div>
    </div>
    <script>
		<?if($arParams["INCLUDE_YANDEX_API"] == "Y"):?>
        var getPositionIncludeApi = true;
		<?endif;?>
        var geoPositionAjaxDir = "<?=$componentPath?>";
        var geoPositionEngine = "<?=$arParams["GEO_IP_PARAMS"]?>"
    </script>
</div>
