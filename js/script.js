(function (window, document) {

})(window, document);


/* following functions are used to test browser video support */	
function videoCheck() {
	    return !!docment.createElement('video').canPlayType;
}
	
function h264Check() {
	    if (!videoCheck) {
		        document.write("not");
		   }

		   var video = document.createElement("video");
		   if (!video.canPlayType ('video/mp4; codecs="avc1.42E01E, mp4a.40.2"')){
		       document.write("not");
		   }
		   return;
}
/* end video support check */