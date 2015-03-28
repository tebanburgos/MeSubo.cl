MQKEY=Key='Fmjtd|luurnuubnu,a5=o5-9wrxq6';
MQCONFIGNUMBER=1;
if(window.MQPROTOCOL===undefined){ MQPROTOCOL=window.location.protocol==='https:'?'https://':'http://'; }
MQPLATFORMSERVER=MQPROTOCOL+"www.mapquestapi.com";
MQSTATICSERVER="http://www.mapquestapi.com/staticmap/";
MQTRAFFSERVER=TRAFFSERVER="http://www.mapquestapi.com/traffic/";
MQROUTEURL="http://www.mapquestapi.com/directions/";
MQGEOCODEURL="http://www.mapquestapi.com/geocoding/";
MQNOMINATIMURL=MQPROTOCOL+"open.mapquestapi.com/";
MQSEARCHURL="http://www.mapquestapi.com/search/";
MQLONGURL=MQPLATFORMSERVER;
MQSMSURL=MQPLATFORMSERVER;
MQTOOLKIT_VERSION="v1.1".replace(/^v/, '');
MQCDN=MQIMAGEPATH="http://api.mqcdn.com/"+"sdk/leaflet/v1.1/";
MQCDNCOMMON="http://api.mqcdn.com/";
MQICONSERVER=ICONSERVER=MQPROTOCOL+'icons.mqcdn.com';
LOGSERVER=MQTILELOGGER="http://coverage.tt.mqcdn.com";
MQLOGURL="http://coverage.tt.mqcdn.com/logger/v1";
COVSERVER=MQCOPYRIGHT="http://coverage.tt.mqcdn.com";
MAPSERVER="ttiles01.mqcdn.com,ttiles02.mqcdn.com,ttiles03.mqcdn.com,ttiles04.mqcdn.com".split(",");
MAPSERVER_TILEPATH="/tiles/1.0.0/vy/map";
MQTILEMAP="http://ttiles0{$hostrange}.mqcdn.com/tiles/1.0.0/vy/map/{$z}/{$x}/{$y}.{$ext}";
MQTILEMAPEXT="jpg";
MQTILEMAPHI=4;
MQTILEMAPLO=1;
SATSERVER="ttiles01.mqcdn.com,ttiles02.mqcdn.com,ttiles03.mqcdn.com,ttiles04.mqcdn.com".split(",");
SATSERVER_TILEPATH="/tiles/1.0.0/vy/sat";
MQTILESAT="http://ttiles0{$hostrange}.mqcdn.com/tiles/1.0.0/vy/sat/{$z}/{$x}/{$y}.{$ext}";
MQTILESATEXT="jpg";
MQTILESATHI=4;
MQTILESATLO=1;
HYBSERVER="ttiles01.mqcdn.com,ttiles02.mqcdn.com,ttiles03.mqcdn.com,ttiles04.mqcdn.com".split(",");
HYBSERVER_TILEPATH="/tiles/1.0.0/vy/hyb";
MQTILEHYB="http://ttiles0{$hostrange}.mqcdn.com/tiles/1.0.0/vy/hyb/{$z}/{$x}/{$y}.{$ext}";
MQTILEHYBEXT="png";
MQTILEHYBHI=4;
MQTILEHYBLO=1;
function $pv() {};  function $a() {};

/**
 * MapQuest tiled map toolkit.
 * Copyright 2014, MapQuest Inc.  All Rights Reserved.
 * Copying, reverse engineering, or modification is strictly prohibited.
 */
MQ.Geocode=L.Class.extend({includes:L.Mixin.Events,options:{key:null,map:null,icon:null,mapFitBounds:true,maxResults:-1,bounds:null},initialize:function(B){L.setOptions(this,B);MQ.mapConfig.setAPIKey(this.options)},_getOptionParameters:function(){var E={};if(this.options.maxResults!=-1){E.maxResult=maxResults}if(this.options.bounds){var D=this.options.bounds.getNorthWest();var F=this.options.bounds.getSouthEast();E.boundingBox=D.lat+","+D.lng+","+F.lat+","+F.lng}return E},search:function(E){var G;var H=this._getOptionParameters();if(Object.prototype.toString.call(E)==="[object Array]"){G="batch?key="+this.options.key;H.locations=E}else{G="address?key="+this.options.key;H.location=E}G+="&json="+MQ.util.stringifyJSON(H);var F=this;MQ.mapConfig.ready(function(){MQ.util.doJSONP(MQ.mapConfig.getConfig("geocodeAPI")+G,{},L.Util.bind(F._onResult,F))});return this},reverse:function(E){var D="reverse?key="+this.options.key;D+="&lat="+E.lat+"&lng="+E.lng;var F=this;MQ.mapConfig.ready(function(){MQ.util.doJSONP(MQ.mapConfig.getConfig("geocodeAPI")+D,{},L.Util.bind(F._onResult,F))});return this},_onResult:function(O){if(O&&O.info&&O.info.statuscode==0&&O.results){var I=[];for(var M=0;M<O.results.length;M++){var H=O.results[M].locations;for(var N=0;N<H.length;N++){H[N].latlng=new L.LatLng(H[N].latLng.lat,H[N].latLng.lng);delete H[N].latLng}var J={best:H[0],matches:H};if(O.results[M].providedLocation.location){J.search=O.results[M].providedLocation.location}else{if(O.results[M].providedLocation.json){J.search=O.results[M].providedLocation.json}else{if(O.results[M].providedLocation.street){J.search=O.results[M].providedLocation.street}else{J.search=O.results[M].providedLocation}}}I.push(J)}if(this.options.map){this._placeOnMap(I)}if(I.length==1){this.fire("success",{result:I[0],data:O})}else{this.fire("success",{result:I,data:O})}}else{var K=null;if(O&&O.info){K={code:O.info.statuscode};if(O.info.messages&&O.info.messages.length>0){K.message=O.info.messages[0]}}this.fire("error",K)}},_placeOnMap:function(M){var K=null,J={};if(this.options.icon){J.icon=this.options.icon}for(var N=0;N<M.length;N++){var I=L.marker(M[N].best.latlng,J).addTo(this.options.map);I.bindPopup(this.describeLocation(M[N].best));if(this.options.mapFitBounds){if(K){K.extend(M[N].best.latlng)}else{var O=0.01;var P=new L.LatLng(M[N].best.latlng.lat-O,M[N].best.latlng.lng-O);var Q=new L.LatLng(M[N].best.latlng.lat+O,M[N].best.latlng.lng+O);K=new L.LatLngBounds(P,Q)}}}if(this.options.mapFitBounds&&K){this.options.map.fitBounds(K)}},describeLocation:function(C){var D="";if(C.street){D+=C.street+"<br/>"}if(C.adminArea5){if(C.adminArea3){D+=C.adminArea5+", "+C.adminArea3+"<br/>"}else{D+=C.adminArea5+"<br/>"}}else{if(C.adminArea3){D+=C.adminArea3+"<br/>"}}return D}});MQ.geocode=function(B){if(B==null){B={}}if(!B.key&&MQKEY){B.key=MQKEY}return new MQ.Geocode(B)};