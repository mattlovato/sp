(function($){var Touchable=$.Touchable;$.fn.Hoverable=function(conf){return this.each(function(){var t=$(this).data['Hoverable']=new Hoverable(this,conf);return t;});}
$.fn.newHover=function(fn1,fn2,disableHover){return this.each(function(){$(this).bind('newHoverIn',fn1).bind('newHoverOut',fn2);});}
$.fn.newHover2=function(fn1,fn2){return this.each(function(){$(this).bind('newHoverIn2',fn1).bind('newHoverOut2',fn2);});}
function Hoverable(elem,conf)
{var self=this;this.logging=false;var log=function(a){if(self.logging&&(typeof console!=='undefined')){console.log(Array.prototype.slice.call(arguments));}};this.elem=elem;if(!$(elem).Touchable)throw new Error('Hoverable depends on Touchable! Please be sure to include Touchable in your project.')
this.$elem=$(elem).Touchable(conf);this.inHover=false;this.target=null;if(typeof conf!=='undefined'){if(typeof conf.disableHover!=='undefined'){this.disableHover=conf.disableHover;}
else{this.disableHover=false;}
if(typeof conf.logging!=='undefined'){this.logging=conf.logging;}}
if(!this.disableHover){this.$elem.mouseenter(genericHover);this.$elem.bind('mouseleave',genericHover);}
this.$elem.bind('longTap',genericHover);this.$elem.bind('touchableend',genericHover);function genericHover(e,touch){if(e.type==='touchableend'||e.type==='mouseleave'){log('Touchable newHoverOut');return self.$elem.trigger('newHoverOut',self);}
log('Touchable newHoverIn');self.$elem.trigger('newHoverIn',self);}
if(!this.disableHover){this.$elem.bind('mouseenter',genericHover2);this.$elem.bind('mouseleave',genericHover2);}
self.$elem.bind('touchablestart',function(e,touch){self.$elem.bind('touchablemove',genericHover2);},false);self.$elem.bind('touchableend',function(e,touch){self.$elem.unbind('touchablemove',genericHover2);genericHover2(e,touch);},false);function genericHover2(e,touch){if(e.type==='touchableend'||e.type==='touchend'){log('Touchable newHoverOut2');self.inHover=false;return self.$elem.trigger('newHoverOut2',self);}else if(e.type==='mouseenter'){log('Touchable newHoverIn2');return self.$elem.trigger('newHoverIn2',self);}else if(e.type==='mouseleave'){log('Touchable newHoverOut2');return self.$elem.trigger('newHoverOut2',self);}
if(e.type=='touchablemove'){if(touch instanceof Touchable){var hitTarget=self.hitTarget;log('Touchable target ID/node'+' hitTarget'+' '+hitTarget+'e.target'+e.target+' e.currentTarget'+e.currentTarget+' self in hover'+self.inHover);var pass=false;if(typeof e.currentTarget!=='undefined'&&e.currentTarget===self.$elem.get(0)){pass=true;}
if(pass&&!self.inHover){self.inHover=true;log('Touchable newHoverIn2');self.$elem.trigger('newHoverIn2',self);}
else if(pass===false&&self.inHover){self.inHover=false;log('Touchable newHoverOut2');self.$elem.trigger('newHoverOut2',self);}}}}}})(jQuery);