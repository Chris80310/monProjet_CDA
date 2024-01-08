(function(k){var c=window.AmazonUIPageJS||window.P,m=c._namespace||c.attributeErrors,h=m?m("PageRefreshAsset",""):c;h.guardFatal?h.guardFatal(k)(h,window):h.execute(function(){k(h,window)})})(function(k,c,m){k.when("A","page-refresh-state","web-ajax-utility","alt-page-refresh-measurement","dp-interactive-page-refresh-handler","dp-click-to-ci-utils").register("page-refresh-handler",function(h,d,g,b,e,a){var f={},l=h.$,p=m,n="",k=function(b,f){var c=this;c.clientId=b;c.persistentParams={};c.pageRefreshUrlParams=
"";c.deviceType="";c.doPageRefresh=function(f,c,l,h){f=k(f,c);e.createInteractivityObjectForTwisterUpdate();var d;d=g.getInstance(b,f,{success:function(){var f=arguments[arguments.length-1];f&&!f.isResponseFromCache?p&&n&&(f=d.xhr.http.getResponseHeader("x-amz-rid"),p.setRequestId(n,f),n=""):a.logCounter("CachedTwisterMetric-Desktop");l.success.apply(null,arguments)},chunk:l.chunk,failure:l.failure},h);d.getContent()};c.addParams=function(a){c.persistentParams=l.extend(!0,c.persistentParams,a);return!0};
c.removeParams=function(a){h.each(a,function(a,f){delete c.persistentParams[a]});return!0};c.createCustomParamsMap=function(a,f){var b={Persistent:{},"Non-Persistent":{}};l.each(a,function(a,f){b.Persistent[a]=f});l.each(f,function(a,f){b["Non-Persistent"][a]=f});return b};c.startMeasurement=function(a,f,b,c,l,e){n=a;p&&p.start(a,f,b,c,l,e)};c.stampImageLoad=function(a){p&&p.stampImageLoad(a)};c.stampFeature=function(a,f){p&&p.stampFeature(a,f)};var k=function(a,b){c.persistentParams=l.extend(!0,
c.persistentParams,b.Persistent);var e={};l.extend(!0,e,c.persistentParams,b["Non-Persistent"]);b=f;var n=h.contains(b,"?");b=b+(n?"\x26":"?")+((a?"asin\x3d"+a:"")+(c.pageRefreshUrlParams?c.pageRefreshUrlParams:""));for(var d in e)null!=e[d]&&(a=e[d],n=b.slice(-1),b+="?"===n||"\x26"===n?"":"\x26",b+=d+"\x3d"+a);return b};(function(){var a=d.pageRefreshData;c.pageRefreshUrlParams=a.pageRefreshUrlParams;c.deviceType=a.deviceType})()};return{getHandlerInstance:function(a,e,d){(null==a||""===a)&&c.ueLogError&&
c.ueLogError({message:"Invalid ClientId"},{logLevel:"FATAL",attribution:"PageRefreshAPI",message:"Invalid ClientId passed to getHandlerInstance of dpRefreshHandler"});f[a]||(f[a]=new k(a,e));!p&&d&&(e=d.config,p=new b(l,e.atf.marker,e.cf.marker),p.setStoreId(n,d.storeID));return f[a]}}});"use strict";k.when("A","page-refresh-handler").register("dp-refresh-handler",function(h,d){function g(b,c,a){this.featureTriggeringRefresh=b.featureName;this.deviceType=(this.deviceTypeStateData=h.state("detail-page-device-type"))&&
this.deviceTypeStateData.deviceType?this.deviceTypeStateData.deviceType:"web";this.pageRefreshUrl=c&&c.pageRefreshUrl?c.pageRefreshUrl:"/gp/twister/ajaxv2";this.clientId="PageRefresh_"+this.deviceType+"_Client";this.DPRefreshHandler=d.getHandlerInstance(this.clientId,this.pageRefreshUrl,a)}g.prototype={doPageRefresh:function(b,e,a,f){try{this.DPRefreshHandler.doPageRefresh(b,e,a,f)}catch(l){c.ueLogError&&c.ueLogError(l,{logLevel:"ERROR",attribution:this.featureTriggeringRefresh,message:"This error is caused by the doPageRefresh method triggered by - "+
this.featureTriggeringRefresh})}},createCustomParamsMap:function(b,e){var a={};try{a=this.DPRefreshHandler.createCustomParamsMap(b,e)}catch(f){c.ueLogError&&c.ueLogError(f,{logLevel:"ERROR",attribution:this.featureTriggeringRefresh,message:"This error is caused by the createCustompParamsMap method triggered by - "+this.featureTriggeringRefresh})}return a},addParams:function(b){return b&&"object"==typeof b?this.DPRefreshHandler.addParams(b):!1},removeParams:function(b){return b&&"object"==typeof b?
this.DPRefreshHandler.removeParams(b):!1},startMeasurement:function(b,e,a,f,l,d){try{this.DPRefreshHandler.startMeasurement(b,e,a,f,l,d)}catch(n){c.ueLogError&&c.ueLogError(n,{logLevel:"ERROR",attribution:this.featureTriggeringRefresh,message:"This error is caused by the startMeasurement method triggered by - "+this.featureTriggeringRefresh})}},stampImageLoad:function(b){try{this.DPRefreshHandler.stampImageLoad(b)}catch(e){c.ueLogError&&c.ueLogError(e,{logLevel:"ERROR",attribution:this.featureTriggeringRefresh,
message:"This error is caused by the startMeasurement method triggered by - "+this.featureTriggeringRefresh})}},stampFeature:function(b,e){try{this.DPRefreshHandler.stampFeature(b,e)}catch(a){c.ueLogError&&c.ueLogError(a,{logLevel:"ERROR",attribution:this.featureTriggeringRefresh,message:"This error is caused by the startMeasurement method triggered by - "+this.featureTriggeringRefresh})}}};return g});k.when("A","jQuery","dp-interactive-page-refresh-handler","dp-click-to-ci-utils").register("alt-page-refresh-ajax-scope",
function(h,d,g,b){return function(e,a,f,l){this.scopeName=a;this.customPageTypeId=f;this.customTags=l;this.storeId="";this.CFmarked=this.requestIdAvailable=!1;ues("t0",a,c.newTwisterInteractionStartTime);ues("ctb",a,"1");this.signalMarker=function(a){!this.markers[a]||0>=this.markers[a].conditions||0===--this.markers[a].conditions&&"function"==typeof this.markers[a].handler&&this.markers[a].handler()};this.addlongPoleTag=function(a,f){a=a.toLowerCase();this.markers[a]&&0==this.markers[a].conditions&&
0==this.markers[a].conditions&&c.ue&&"function"===typeof ue.tag&&ue.tag(f)};this.markClickToCI=function(){var a=this,f=g.getClickToCIMetric();f&&f.then(function(f){uet("fn",a.scopeName,m,f.interactiveTime);a.requestIdAvailable&&uex("ld",lScopeName);b.logCounter("TTISuccessCountForTwisterUpdate")}).catch(function(a){b.logCounter("TTIFailureCountForTwisterUpdate")})};this.setStoreId=function(a){a&&(this.storeId=a)};this.setRequestId=function(a){a&&(this.CFmarked=this.requestIdAvailable=!0,this.postData(a))};
this.postData=function(a){var f=this.scopeName,b=this.customPageTypeId,d=this.customTags;c.ue&&ue.tag&&(c.ue_pty&&ue.tag(c.ue_pty),c.ue_spty&&ue.tag(c.ue_spty),ue.tag(c.ue_spty),ue.tag("main"),ue.tag(this.storeID),ue.tag("clientOnly"));if(this.requestIdAvailable&&this.CFmarked){ues("id",f,a);var e;b!==m&&(e=c.ue_pti,c.ue_pti=b);if(d!==m)for(a=0;a<d.length;a++)ue.tag(d[a]);uex("ld",f);b!==m&&(c.ue_pti=e)}};var d=this;this.markers={image:{conditions:1,handler:function(){uet("ne",a);d.signalMarker("af")}},
af:{conditions:Twister.atfMarkerCount?Twister.atfMarkerCount:2,handler:function(){h.trigger("PageRefresh:ATF");uet("af",a);uet("cf",a);d.signalMarker("cf");g.updateCriticalFeatures();d.markClickToCI()}},cf:{conditions:Twister.cfMarkerCount?Twister.cfMarkerCount:2,handler:function(){h.trigger("PageRefresh:CF");uet("cf",a);this.CFmarked=!0;d.postData()}}}}});k.when("A","jQuery","alt-page-refresh-ajax-scope").register("alt-page-refresh-measurement",function(h,d,g){return function(b,d,a){this.atfMarker=
d;this.cfMarker=a;this.scopeCount={};this.ajaxScopes={};this.start=function(a,d,e,h,k,m){c.ue&&(this.scopeCount[a]||(this.scopeCount[a]=0),d=a+(this.scopeCount[a]+1),this.scopeCount[a]++,this.ajaxScopes[a]=new g(b,d,k,m))};this.setRequestId=function(a,b){this.ajaxScopes[a]&&this.ajaxScopes[a].setRequestId(b)};this.setStoreId=function(a,b){this.ajaxScopes[a]&&this.ajaxScopes[a].setStoreId(requestId)};this.stampImageLoad=function(a){this.ajaxScopes[a]&&(this.ajaxScopes[a].signalMarker("image"),Twister.cfImageLongPollTag&&
this.ajaxScopes[a].addlongPoleTag("cf",Twister.cfImageLongPollTag))};this.stampFeature=function(a,b){this.ajaxScopes[b]?(a===this.atfMarker&&this.ajaxScopes[b].signalMarker("af"),a===this.cfMarker&&(this.ajaxScopes[b].signalMarker("cf"),Twister.cfHtmlLongPollTag&&this.ajaxScopes[b].addlongPoleTag("cf",Twister.cfHtmlLongPollTag))):a===this.cfMarker&&h.trigger("PageRefresh:AjaxCallCompletedButCFMarkingNotDone")};this.stampCustomMetrics=function(a,b){this.ajaxScopes[b]&&uet(a,this.ajaxScopes[b].scopeName)}}});
k.when("A","ready").register("page-refresh-state",function(c){var d=c.state("page-refresh-data");c=c.state("detail-page-device-type");var g={};"undefined"!==typeof d&&(g.pageRefreshUrlParams=d.pageRefreshUrlParams);"undefined"!==typeof c&&(g.deviceType=c.deviceType);return{pageRefreshData:g}});k.when("A","jQuery","dp-js-logger").register("web-ajax-utility",function(c,d,g){function b(a,b,c,d){this.scope=a;this.url=b;this.options=c;this.status=0;this.selected=!1;this.error=this.successData=this.xhr=
this._status=m;this.chunks=[];this.doNotAbort=d||!1}var e=new g("WebAjaxUtility");b._objects={};b.prototype._callback=function(){var a=arguments[0],b=Array.prototype.slice.call(arguments,1);"function"===typeof a&&a.apply(self,b)};b.prototype._canAbort=function(){return!this.doNotAbort&&1===this.status};b.prototype._isAborted=function(){return 3===this.status};b.prototype._getUrl=function(){return this.url};b.prototype._abort=function(){if(1===this.status)try{this.ajaxRequestRefence.abort(),this.status=
3}catch(a){e.logFatal(a,{message:" Could not abort ajax request."})}};b.prototype._flushChunkData=function(){var a=this;a.chunks.length&&d.map(a.chunks,function(b){a._callback(a.options.chunk,b)})};b.prototype._request=function(){var a=this;a.ajaxRequestRefence=c.get(a.url,{params:a.options.params,success:function(b,d,e){a.status=4;a.successData=b;a._status=d;a.xhr=e;a.selected&&a._callback(a.options.success,b,d,e,{isResponseFromCache:!1});c.trigger("TwisterRefresh:Success")},error:function(b,c,d){a.status=
2;a.xhr=b;a._status=c;a.error=d;a.selected&&a._callback(a.options.error,b,c,d)},abort:function(b){a.status=3;a.xhr=b;a.selected&&a._callback(a.options.abort,b)},chunk:function(b){b&&(a.chunks.push(b),a.selected&&a._callback(a.options.chunk,b))},timeout:a.options.timeout||4E4})};b.prototype.getContent=function(){b._abortRequestsExcept(this);this.selected=!0;0===this.status?(this.status=1,this._request()):1===this.status?this._flushChunkData():4===this.status&&(this._flushChunkData(),this._callback(this.options.success,
this.successData,this._status,this.xhr,{isResponseFromCache:!0}),c.trigger("a:pageUpdate"),c.trigger("TwisterRefresh:Success"))};b._abortRequestsExcept=function(a){d.each(b._objects[a.scope],function(b,c){c._canAbort()&&b!==a._getUrl()&&c._abort()})};b.getInstance=function(a,c,d,e){if(!a||!c||"object"!==typeof d)throw"Incorrect parameter passed.";b._objects[a]=b._objects[a]||{};var g=b._objects[a][c];g&&g._isAborted()&&(delete b._objects[a][c],g=m);g||(b._objects[a][c]=new b(a,c,d,e,this));return b._objects[a][c]};
return b});k.when("A").register("state-aware-critical-features",function(c){return function(){var c=[];this.add=function(g,b){for(var e=g.featureName,a=!1,f=0;f<c.length;f++)if(c[f].featureName===e){a=!0;break}if(a)throw"Critical Feature "+g.featureName+" already registered for State Aware Messaging!";g={};g.featureName=e;g.callback=b;c.push(g)};this.getAllCriticalFeatures=function(){return c}}});k.when("A","state-aware-parameter-handler").register("state-aware-feature-consolidator",function(c,d){return{getStateAwareParameters:function(){return d.getStateAwareParameters()}}});
k.when("A","state-aware-critical-features","state-aware-parameters").register("state-aware-parameter-handler",function(h,d,g){return new function(){var b=new d,e=new g;this.registerCriticalFeature=function(a,d){try{if("function"===typeof d)b.add(a,d);else throw"callback needs to be a function!";}catch(e){c.ueLogError&&c.ueLogError(e,{logLevel:"ERROR",attribution:a.featureName,message:"StateAwareExceptionMessaging:- This error is caused by the feature "+a.featureName+" while registering itself as a critical feature for State Aware Messaging. "+
e})}};this.getStateAwareParameters=function(){for(var a=b.getAllCriticalFeatures(),d=0;d<a.length;d++){var g=a[d],h=g.featureName,g=g.callback.apply();try{e.putParameters(h,g)}catch(k){c.ueLogError&&c.ueLogError(k,{logLevel:"ERROR",attribution:h,message:"StateAwareMessaging:- This error is caused by the feature "+h+" while injecting state aware parameters. "+k})}}return e.getAllStateAwareParameters()}}});k.when("A").register("state-aware-parameters",function(){return function(){var c={};this.putParameters=
function(d,g){var b=!0;for(feature in c)if(c.hasOwnProperty(feature)&&d!==feature){var e=this.getParameters(feature);if(b){var b=g,a=!1;for(paramKey in b)if(b.hasOwnProperty(paramKey)&&e.hasOwnProperty(paramKey)){a=!0;break}b=!a}}if(b)for(paramKey in g)g.hasOwnProperty(paramKey)&&(e=g[paramKey],c[d]||(c[d]={}),c[d][paramKey]=e);else throw"Duplicate Parameters found for other Critical Feature!";};this.getParameters=function(d){return c[d]};this.getAllStateAwareParameters=function(){var d={},g;for(g in c)if(c.hasOwnProperty(g)){var b=
this.getParameters(g),e;for(e in b)b.hasOwnProperty(e)&&(d[e]=b[e])}return d}}});k.when("A").register("page-refresh-utils",function(h){var d=h.$,g={intermediateEOS:1,EOS:1};return{fadeInFeatures:function(b){d.each(b,function(a,c){"#"!==c[0]&&(b[a]="#"+c)});var c=b.join(",");d(c).addClass("js-feature-refresh-overlay");d(c).css("opacity",.5)},refreshFeature:function(b){var e=b.Value;b=b.FeatureName;if(!g[b]){var a,f;try{b&&e&&e.content&&(f=e.content[b],"undefined"!==typeof f&&(a=d("#"+b),a.html(f),
a.removeClass("js-feature-refresh-overlay"),a.css("opacity","")))}catch(h){e={message:"Error in feature"+(b||"NoFeatureName"),logLevel:"FATAL"},c.ueLogError&&c.ueLogError(h,e)}}},removeOverlayForAllFeatures:function(b){b=d("body").find(".js-feature-refresh-overlay");for(var c=0;c<b.length;c++){var a=b[c];d(a).removeClass("js-feature-refresh-overlay");d(a).css("opacity","")}}}})});