﻿function splitLines(a){return a.split(/\r?\n|\r/)}function StringStream(a){this.pos=this.start=0;this.string=a}
StringStream.prototype={eol:function(){return this.pos>=this.string.length},sol:function(){return 0==this.pos},peek:function(){return this.string.charAt(this.pos)||null},next:function(){if(this.pos<this.string.length)return this.string.charAt(this.pos++)},eat:function(a){var b=this.string.charAt(this.pos);if("string"==typeof a?b==a:b&&(a.test?a.test(b):a(b)))return++this.pos,b},eatWhile:function(a){for(var b=this.pos;this.eat(a););return this.pos>b},eatSpace:function(){for(var a=this.pos;/[\s\u00a0]/.test(this.string.charAt(this.pos));)++this.pos;
return this.pos>a},skipToEnd:function(){this.pos=this.string.length},skipTo:function(a){a=this.string.indexOf(a,this.pos);if(-1<a)return this.pos=a,!0},backUp:function(a){this.pos-=a},column:function(){return this.start},indentation:function(){return 0},match:function(a,b,c){if("string"==typeof a){if((c?this.string.toLowerCase():this.string).indexOf(c?a.toLowerCase():a,this.pos)==this.pos)return!1!==b&&(this.pos+=a.length),!0}else{if((a=this.string.slice(this.pos).match(a))&&!1!==b)this.pos+=a[0].length;
return a}},current:function(){return this.string.slice(this.start,this.pos)}};exports.StringStream=StringStream;exports.startState=function(a,b,c){return a.startState?a.startState(b,c):!0};var modes=exports.modes={},mimeModes=exports.mimeModes={};exports.defineMode=function(a,b){modes[a]=b};exports.defineMIME=function(a,b){mimeModes[a]=b};
exports.getMode=function(a,b){"string"==typeof b&&mimeModes.hasOwnProperty(b)&&(b=mimeModes[b]);if("string"==typeof b)var c=b,f={};else null!=b&&(c=b.name,f=b);c=modes[c];if(!c)throw Error("Unknown mode: "+b);return c(a,f||{})};exports.runMode=function(a,b,c){for(var b=exports.getMode({indentUnit:2},b),a=splitLines(a),f=exports.startState(b),e=0,g=a.length;e<g;++e){e&&c("\n");for(var d=new exports.StringStream(a[e]);!d.eol();){var h=b.token(d,f);c(d.current(),h,e,d.start);d.start=d.pos}}};