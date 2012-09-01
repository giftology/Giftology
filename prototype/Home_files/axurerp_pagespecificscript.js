for(var i = 0; i < 69; i++) { var scriptId = 'u' + i; window[scriptId] = document.getElementById(scriptId); }

$axure.eventManager.pageLoad(
function (e) {

});
document.getElementById('u51_img').tabIndex = 0;

u51.style.cursor = 'pointer';
$axure.eventManager.click('u51', u51Click);
InsertAfterBegin(document.body, "<div class='intcases' id='u51LinksClick'></div>")
var u51LinksClick = document.getElementById('u51LinksClick');
function u51Click(e) 
{
windowEvent = e;


	ToggleLinks(e, 'u51LinksClick');
}

InsertBeforeEnd(u51LinksClick, "<div class='intcaselink' onmouseout='SuppressBubble(event)' onclick='u51Clickuf4451fe7c44c4df49ecff7f69e30c952(event)'>Patient</div>");
function u51Clickuf4451fe7c44c4df49ecff7f69e30c952(e)
{

	self.location.href=$axure.globalVariableProvider.getLinkUrl('Patient_First_Page.html');

	ToggleLinks(e, 'u51LinksClick');
}

InsertBeforeEnd(u51LinksClick, "<div class='intcaselink' onmouseout='SuppressBubble(event)' onclick='u51Clicku24cd8d9c4bd4487a93e37fcf571c4e32(event)'>Provider</div>");
function u51Clicku24cd8d9c4bd4487a93e37fcf571c4e32(e)
{

	self.location.href=$axure.globalVariableProvider.getLinkUrl('Provider_First_Page.html');

	ToggleLinks(e, 'u51LinksClick');
}
gv_vAlignTable['u52'] = 'center';gv_vAlignTable['u56'] = 'center';gv_vAlignTable['u57'] = 'top';gv_vAlignTable['u58'] = 'top';gv_vAlignTable['u59'] = 'top';document.getElementById('u22_img').tabIndex = 0;

u22.style.cursor = 'pointer';
$axure.eventManager.click('u22', function(e) {

if (true) {

	self.location.href='#';

}
});
gv_vAlignTable['u23'] = 'center';gv_vAlignTable['u25'] = 'center';gv_vAlignTable['u26'] = 'top';gv_vAlignTable['u27'] = 'top';gv_vAlignTable['u28'] = 'top';document.getElementById('u29_img').tabIndex = 0;

u29.style.cursor = 'pointer';
$axure.eventManager.click('u29', function(e) {

if (true) {

	SetPanelState('u12', 'pd2u12','none','',500,'none','',500);

}
});
gv_vAlignTable['u60'] = 'top';gv_vAlignTable['u66'] = 'top';gv_vAlignTable['u67'] = 'top';
u68.style.cursor = 'pointer';
$axure.eventManager.click('u68', function(e) {

if (true) {

	SetPanelVisibility('u54','','none',500);

}
});
gv_vAlignTable['u30'] = 'center';gv_vAlignTable['u33'] = 'center';gv_vAlignTable['u35'] = 'center';gv_vAlignTable['u36'] = 'top';gv_vAlignTable['u37'] = 'top';
$axure.eventManager.blur('u39', function(e) {

if ((GetWidgetText('u38')) == (GetWidgetText('u39'))) {

	SetPanelState('u31', 'pd0u31','none','',500,'none','',500);

	SetPanelVisibility('u31','','none',500);

}
else
if ((GetWidgetText('u38')) != (GetWidgetText('u39'))) {

	SetPanelState('u31', 'pd1u31','none','',500,'none','',500);

}
});
gv_vAlignTable['u1'] = 'center';gv_vAlignTable['u4'] = 'top';gv_vAlignTable['u6'] = 'center';gv_vAlignTable['u8'] = 'center';u45.tabIndex = 0;

u45.style.cursor = 'pointer';
$axure.eventManager.click('u45', function(e) {

if (true) {

	SetPanelState('u12', 'pd1u12','none','',500,'none','',500);

}
});
gv_vAlignTable['u45'] = 'top';gv_vAlignTable['u44'] = 'center';gv_vAlignTable['u48'] = 'top';gv_vAlignTable['u46'] = 'top';gv_vAlignTable['u47'] = 'top';
$axure.eventManager.focus('u42', function(e) {

if (true) {

SetWidgetFormText('u42', '');

}
});

$axure.eventManager.focus('u41', function(e) {

if (true) {

SetWidgetFormText('u41', '');

}
});

$axure.eventManager.focus('u40', function(e) {

if (true) {

SetWidgetFormText('u40', '');

}
});

u10.style.cursor = 'pointer';
$axure.eventManager.click('u10', function(e) {

if (true) {

	SetPanelVisibility('u11','','none',500);

}
});
gv_vAlignTable['u14'] = 'center';gv_vAlignTable['u15'] = 'top';gv_vAlignTable['u16'] = 'top';gv_vAlignTable['u17'] = 'top';gv_vAlignTable['u18'] = 'top';gv_vAlignTable['u19'] = 'top';