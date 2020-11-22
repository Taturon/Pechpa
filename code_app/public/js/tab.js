(function(){
	var $$ = function(){
		this.setEvent(window , "DOMContentLoaded" , this.set);
	};

	$$.prototype.set = function(){
		var textareas = document.getElementsByTagName("textarea");
		for(var i=0; i<textareas.length; i++){
			$$.prototype.setTextarea(textareas[i]);
		}
	};

	$$.prototype.setTextarea = function(elm){
		elm.onkeydown = function(event){
			if(event.keyCode !== 9){return}
			var textarea = event.target;
			var sentence = textarea.value;
			var len = sentence.length;
			var pos = textarea.selectionStart;
			var before = sentence.substr(0, textarea.selectionStart);
			var after = sentence.substr(textarea.selectionEnd, len);
			var word = "\t";
			sentence = before + word + after;
			textarea.value = sentence;
			textarea.setSelectionRange(len+1 , pos+1);
			return false;
		};
	};

	$$.prototype.setEvent = function(target, mode, func){
		//other Browser
		if (target.addEventListener){target.addEventListener(mode, func, false)}
		else{target.attachEvent('on' + mode, function(){func.call(target , window.event)})}
	};

	new $$;
})();
