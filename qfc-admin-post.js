jQuery(document).ready( function($) {

	if(!window.fusionBuilderState) return;

	qTranslateConfig.qtx.addLanguageSwitchBeforeListener(function(){
		if(fusionBuilderState != 'active') return;
		fusionParser.checkBuilderElements();
	});

	qTranslateConfig.qtx.addLanguageSwitchAfterListener(function(){
		if(fusionBuilderState != 'active') return;
		fusionHistoryManager.turnOffTracking();
		Editor.deleteAllElements();
		fusionHistoryManager.turnOnTracking();
		DdHelper.shortCodestoBuilderElements();
	});

}
);
