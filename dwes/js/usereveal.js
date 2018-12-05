/*global Reveal*/
(function () {
    var page = 1;
    var last = 1;
    var max = 10;
    init();
    function add(page) {
        console.log('creando ' + page);
        var time = 'future';
        if(page == 1) {
            time = 'present';
        }
    	document.getElementById('slideid').innerHTML += '<section hidden aria-hidden="true" class="' + time + '" id="section-' + page + '"></section>';
    	load(page);
    }
    function init() {
        add(page);
        page++;
        add(page);
        Reveal.initialize({transition: 'convex'});//transitionSpeed: 'slow', viewDistance: 100
        Reveal.addEventListener('slidechanged', function( event ) {
        	//event.previousSlide, event.currentSlide, event.indexh, event.indexv
        	//console.log(event);
        	var state = Reveal.getState();
        	console.log(last + ' ' + page + ' ' + state.indexh);
        	if(last + 1 == page && last < state.indexh + 1 && page < max) {
        		page++;
        		add(page);
        	}
        	last = state.indexh + 1;
        });
        Reveal.addEventListener('somestate', function() {
	        console.log('some: ' + Reveal.getState().indexh);
        }, false );
    }
    function load(page) {
    	var xhttp = new XMLHttpRequest();
    	xhttp.onreadystatechange = function() {
    		if (this.readyState == 4 && this.status == 200) {
    			Reveal.next();
    			Reveal.prev();
    			document.getElementById("section-" + page).innerHTML = this.responseText;
    			//Reveal.sync();
    		}
    	};
    	xhttp.open("GET", "php/getpage.php?page=" + page, true);
    	xhttp.send();
    }
})();