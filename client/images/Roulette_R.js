(function (cjs, an) {

var p; // shortcut to reference prototypes
var lib={};var ss={};var img={};
lib.ssMetadata = [
		{name:"Roulette_atlas_", frames: [[0,0,650,707],[402,1610,332,295],[804,901,332,295],[402,1313,332,295],[804,604,332,295],[1138,604,332,295],[1138,901,332,295],[1472,604,332,295],[1472,901,332,295],[804,1198,332,295],[1138,1198,332,295],[1472,1198,332,295],[736,1495,332,295],[652,302,400,300],[0,709,400,300],[652,0,400,300],[0,1011,400,300],[402,709,400,300],[402,1011,400,300],[0,1313,400,300],[1456,302,400,300],[0,1615,400,300],[1054,0,400,300],[1456,0,400,300],[1054,302,400,300]]}
];


// symbols:



(lib.pointer = function() {
	this.spriteSheet = ss["Roulette_atlas_"];
	this.gotoAndStop(0);
}).prototype = p = new cjs.Sprite();



(lib.Roulette_01 = function() {
	this.spriteSheet = ss["Roulette_atlas_"];
	this.gotoAndStop(1);
}).prototype = p = new cjs.Sprite();



(lib.Roulette_02 = function() {
	this.spriteSheet = ss["Roulette_atlas_"];
	this.gotoAndStop(2);
}).prototype = p = new cjs.Sprite();



(lib.Roulette_03 = function() {
	this.spriteSheet = ss["Roulette_atlas_"];
	this.gotoAndStop(3);
}).prototype = p = new cjs.Sprite();



(lib.Roulette_04 = function() {
	this.spriteSheet = ss["Roulette_atlas_"];
	this.gotoAndStop(4);
}).prototype = p = new cjs.Sprite();



(lib.Roulette_05 = function() {
	this.spriteSheet = ss["Roulette_atlas_"];
	this.gotoAndStop(5);
}).prototype = p = new cjs.Sprite();



(lib.Roulette_06 = function() {
	this.spriteSheet = ss["Roulette_atlas_"];
	this.gotoAndStop(6);
}).prototype = p = new cjs.Sprite();



(lib.Roulette_07 = function() {
	this.spriteSheet = ss["Roulette_atlas_"];
	this.gotoAndStop(7);
}).prototype = p = new cjs.Sprite();



(lib.Roulette_08 = function() {
	this.spriteSheet = ss["Roulette_atlas_"];
	this.gotoAndStop(8);
}).prototype = p = new cjs.Sprite();



(lib.Roulette_09 = function() {
	this.spriteSheet = ss["Roulette_atlas_"];
	this.gotoAndStop(9);
}).prototype = p = new cjs.Sprite();



(lib.Roulette_10 = function() {
	this.spriteSheet = ss["Roulette_atlas_"];
	this.gotoAndStop(10);
}).prototype = p = new cjs.Sprite();



(lib.Roulette_11 = function() {
	this.spriteSheet = ss["Roulette_atlas_"];
	this.gotoAndStop(11);
}).prototype = p = new cjs.Sprite();



(lib.Roulette_12 = function() {
	this.spriteSheet = ss["Roulette_atlas_"];
	this.gotoAndStop(12);
}).prototype = p = new cjs.Sprite();



(lib.Roulette_R_01 = function() {
	this.spriteSheet = ss["Roulette_atlas_"];
	this.gotoAndStop(13);
}).prototype = p = new cjs.Sprite();



(lib.Roulette_R_02 = function() {
	this.spriteSheet = ss["Roulette_atlas_"];
	this.gotoAndStop(14);
}).prototype = p = new cjs.Sprite();



(lib.Roulette_R_03 = function() {
	this.spriteSheet = ss["Roulette_atlas_"];
	this.gotoAndStop(15);
}).prototype = p = new cjs.Sprite();



(lib.Roulette_R_04 = function() {
	this.spriteSheet = ss["Roulette_atlas_"];
	this.gotoAndStop(16);
}).prototype = p = new cjs.Sprite();



(lib.Roulette_R_05 = function() {
	this.spriteSheet = ss["Roulette_atlas_"];
	this.gotoAndStop(17);
}).prototype = p = new cjs.Sprite();



(lib.Roulette_R_06 = function() {
	this.spriteSheet = ss["Roulette_atlas_"];
	this.gotoAndStop(18);
}).prototype = p = new cjs.Sprite();



(lib.Roulette_Result_01 = function() {
	this.spriteSheet = ss["Roulette_atlas_"];
	this.gotoAndStop(19);
}).prototype = p = new cjs.Sprite();



(lib.Roulette_Result_02 = function() {
	this.spriteSheet = ss["Roulette_atlas_"];
	this.gotoAndStop(20);
}).prototype = p = new cjs.Sprite();



(lib.Roulette_Result_03 = function() {
	this.spriteSheet = ss["Roulette_atlas_"];
	this.gotoAndStop(21);
}).prototype = p = new cjs.Sprite();



(lib.Roulette_Result_04 = function() {
	this.spriteSheet = ss["Roulette_atlas_"];
	this.gotoAndStop(22);
}).prototype = p = new cjs.Sprite();



(lib.Roulette_Result_05 = function() {
	this.spriteSheet = ss["Roulette_atlas_"];
	this.gotoAndStop(23);
}).prototype = p = new cjs.Sprite();



(lib.Roulette_Result_06 = function() {
	this.spriteSheet = ss["Roulette_atlas_"];
	this.gotoAndStop(24);
}).prototype = p = new cjs.Sprite();
// helper functions:

function mc_symbol_clone() {
	var clone = this._cloneProps(new this.constructor(this.mode, this.startPosition, this.loop));
	clone.gotoAndStop(this.currentFrame);
	clone.paused = this.paused;
	clone.framerate = this.framerate;
	return clone;
}

function getMCSymbolPrototype(symbol, nominalBounds, frameBounds) {
	var prototype = cjs.extend(symbol, cjs.MovieClip);
	prototype.clone = mc_symbol_clone;
	prototype.nominalBounds = nominalBounds;
	prototype.frameBounds = frameBounds;
	return prototype;
	}


(lib.pointer_1 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// 圖層_1
	this.instance = new lib.pointer();
	this.instance.parent = this;
	this.instance.setTransform(-51,-55,0.157,0.157);

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

}).prototype = getMCSymbolPrototype(lib.pointer_1, new cjs.Rectangle(-51,-55,102.1,111), null);


// stage content:
(lib.Roulette = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// timeline functions:
	this.frame_0 = function() {
		this.addEventListener("click", btnClicked.bind(this));
		
		this.bClicked = false;
		
		function btnClicked(){
			if(!this.bClicked){
				if(document.getElementById("readedRule").checked){
					this.gotoAndPlay(24);
					
					this.bClicked = true;
				}else{
					alert("請先閱讀下方注意事項並確認勾選");
				}
			}
		}
	}
	this.frame_22 = function() {
		this.gotoAndPlay(1);
	}
	this.frame_59 = function() {
		this.stop();
		
		showRouletteResult();
	}

	// actions tween:
	this.timeline.addTween(cjs.Tween.get(this).call(this.frame_0).wait(22).call(this.frame_22).wait(37).call(this.frame_59).wait(1));

	// 圖層_2
	this.instance = new lib.pointer_1();
	this.instance.parent = this;
	this.instance.setTransform(133.7,136.1,0.8,0.8,0,0,0,0.1,0.6);

	this.timeline.addTween(cjs.Tween.get(this.instance).to({y:116.1},11).to({y:136.1},11).to({_off:true},1).wait(37));

	// 圖層_1
	this.instance_1 = new lib.Roulette_01();
	this.instance_1.parent = this;
	this.instance_1.setTransform(0,4,0.8,0.8);

	this.instance_2 = new lib.Roulette_02();
	this.instance_2.parent = this;
	this.instance_2.setTransform(0,4,0.8,0.8);

	this.instance_3 = new lib.Roulette_03();
	this.instance_3.parent = this;
	this.instance_3.setTransform(0,4,0.8,0.8);

	this.instance_4 = new lib.Roulette_04();
	this.instance_4.parent = this;
	this.instance_4.setTransform(0,4,0.8,0.8);

	this.instance_5 = new lib.Roulette_05();
	this.instance_5.parent = this;
	this.instance_5.setTransform(0,4,0.8,0.8);

	this.instance_6 = new lib.Roulette_06();
	this.instance_6.parent = this;
	this.instance_6.setTransform(0,4,0.8,0.8);

	this.instance_7 = new lib.Roulette_07();
	this.instance_7.parent = this;
	this.instance_7.setTransform(0,4,0.8,0.8);

	this.instance_8 = new lib.Roulette_08();
	this.instance_8.parent = this;
	this.instance_8.setTransform(0,4,0.8,0.8);

	this.instance_9 = new lib.Roulette_09();
	this.instance_9.parent = this;
	this.instance_9.setTransform(0,4,0.8,0.8);

	this.instance_10 = new lib.Roulette_10();
	this.instance_10.parent = this;
	this.instance_10.setTransform(0,4,0.8,0.8);

	this.instance_11 = new lib.Roulette_11();
	this.instance_11.parent = this;
	this.instance_11.setTransform(0,4,0.8,0.8);

	this.instance_12 = new lib.Roulette_12();
	this.instance_12.parent = this;
	this.instance_12.setTransform(0,4,0.8,0.8);

	this.instance_13 = new lib.Roulette_Result_01();
	this.instance_13.parent = this;
	this.instance_13.setTransform(0,0,0.8,0.8);

	this.instance_14 = new lib.Roulette_Result_02();
	this.instance_14.parent = this;
	this.instance_14.setTransform(0,0,0.8,0.8);

	this.instance_15 = new lib.Roulette_Result_03();
	this.instance_15.parent = this;
	this.instance_15.setTransform(0,0,0.8,0.8);

	this.instance_16 = new lib.Roulette_Result_04();
	this.instance_16.parent = this;
	this.instance_16.setTransform(0,0,0.8,0.8);

	this.instance_17 = new lib.Roulette_Result_05();
	this.instance_17.parent = this;
	this.instance_17.setTransform(0,0,0.8,0.8);

	this.instance_18 = new lib.Roulette_Result_06();
	this.instance_18.parent = this;
	this.instance_18.setTransform(0,0,0.8,0.8);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.instance_1}]}).to({state:[{t:this.instance_2}]},24).to({state:[{t:this.instance_3}]},1).to({state:[{t:this.instance_4}]},1).to({state:[{t:this.instance_5}]},1).to({state:[{t:this.instance_6}]},1).to({state:[{t:this.instance_7}]},1).to({state:[{t:this.instance_8}]},1).to({state:[{t:this.instance_9}]},1).to({state:[{t:this.instance_10}]},1).to({state:[{t:this.instance_11}]},1).to({state:[{t:this.instance_12}]},1).to({state:[{t:this.instance_1}]},1).to({state:[{t:this.instance_2}]},1).to({state:[{t:this.instance_3}]},1).to({state:[{t:this.instance_4}]},1).to({state:[{t:this.instance_5}]},1).to({state:[{t:this.instance_6}]},1).to({state:[{t:this.instance_7}]},1).to({state:[{t:this.instance_8}]},1).to({state:[{t:this.instance_9}]},1).to({state:[{t:this.instance_10}]},1).to({state:[{t:this.instance_11}]},1).to({state:[{t:this.instance_12}]},1).to({state:[{t:this.instance_13}]},1).to({state:[{t:this.instance_14}]},1).to({state:[{t:this.instance_15}]},1).to({state:[{t:this.instance_16}]},1).to({state:[{t:this.instance_17}]},1).to({state:[{t:this.instance_18}]},1).to({state:[]},1).wait(7));

	// ball
	this.instance_19 = new lib.Roulette_R_01();
	this.instance_19.parent = this;
	this.instance_19.setTransform(0,0,0.8,0.8);

	this.instance_20 = new lib.Roulette_R_02();
	this.instance_20.parent = this;
	this.instance_20.setTransform(0,0,0.8,0.8);

	this.instance_21 = new lib.Roulette_R_03();
	this.instance_21.parent = this;
	this.instance_21.setTransform(0,0,0.8,0.8);

	this.instance_22 = new lib.Roulette_R_04();
	this.instance_22.parent = this;
	this.instance_22.setTransform(0,0,0.8,0.8);

	this.instance_23 = new lib.Roulette_R_05();
	this.instance_23.parent = this;
	this.instance_23.setTransform(0,0,0.8,0.8);

	this.instance_24 = new lib.Roulette_R_06();
	this.instance_24.parent = this;
	this.instance_24.setTransform(0,0,0.8,0.8);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[]}).to({state:[{t:this.instance_19}]},53).to({state:[{t:this.instance_20}]},1).to({state:[{t:this.instance_21}]},1).to({state:[{t:this.instance_22}]},1).to({state:[{t:this.instance_23}]},1).to({state:[{t:this.instance_24}]},1).wait(2));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(160,124,265.6,236);
// library properties:
lib.properties = {
	id: '6CDB229C4C56E24CA273329784E09E86',
	width: 320,
	height: 240,
	fps: 12,
	color: "#FFFFFF",
	opacity: 1.00,
	manifest: [
		{src:"images/Roulette_atlas_R.png", id:"Roulette_atlas_"}
	],
	preloads: []
};



// bootstrap callback support:

(lib.Stage = function(canvas) {
	createjs.Stage.call(this, canvas);
}).prototype = p = new createjs.Stage();

p.setAutoPlay = function(autoPlay) {
	this.tickEnabled = autoPlay;
}
p.play = function() { this.tickEnabled = true; this.getChildAt(0).gotoAndPlay(this.getTimelinePosition()) }
p.stop = function(ms) { if(ms) this.seek(ms); this.tickEnabled = false; }
p.seek = function(ms) { this.tickEnabled = true; this.getChildAt(0).gotoAndStop(lib.properties.fps * ms / 1000); }
p.getDuration = function() { return this.getChildAt(0).totalFrames / lib.properties.fps * 1000; }

p.getTimelinePosition = function() { return this.getChildAt(0).currentFrame / lib.properties.fps * 1000; }

an.bootcompsLoaded = an.bootcompsLoaded || [];
if(!an.bootstrapListeners) {
	an.bootstrapListeners=[];
}

an.bootstrapCallback=function(fnCallback) {
	an.bootstrapListeners.push(fnCallback);
	if(an.bootcompsLoaded.length > 0) {
		for(var i=0; i<an.bootcompsLoaded.length; ++i) {
			fnCallback(an.bootcompsLoaded[i]);
		}
	}
};

an.compositions = an.compositions || {};
an.compositions['6CDB229C4C56E24CA273329784E09E86'] = {
	getStage: function() { return exportRoot.getStage(); },
	getLibrary: function() { return lib; },
	getSpriteSheet: function() { return ss; },
	getImages: function() { return img; }
};

an.compositionLoaded = function(id) {
	an.bootcompsLoaded.push(id);
	for(var j=0; j<an.bootstrapListeners.length; j++) {
		an.bootstrapListeners[j](id);
	}
}

an.getComposition = function(id) {
	return an.compositions[id];
}



})(createjs = createjs||{}, AdobeAn = AdobeAn||{});
var createjs, AdobeAn;