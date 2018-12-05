/*global Reveal*/
(function () {
    var page = 0;
    init();
    function addPagesSection(page, theme, pages) {
        var numPages = pages.length;
        for(var i = 0; i < numPages; i++) {
            document.getElementById('section-' + theme).innerHTML += '<section data-file="' + pages[i] + '" id="tema-' + theme + '-pagina-' + i + '"></section>';
        }
    }
    function addThemeSection(page, theme) {
    	document.getElementById('slideid').innerHTML += '<section id="section-' + theme + '"></section>';
    }
    function addTitleSection(page, theme, title) {
        if(title == '') {
            title = 'Tema ' + theme;
        } else {
            title = theme + '. ' + title;
        }
        title = '<h2>' + title + '</h2>';
    	document.getElementById('section-' + theme).innerHTML += '<section id="tema-' + theme + '">' + title + '</section>';
    }
    function addPages(json) {
        for(var i = 0; i < json.numeroTemas; i++) {
            addThemeSection(i + 1, json.temas[i].tema);
            addTitleSection(i + 1, json.temas[i].tema, json.temas[i].titulo);
            addPagesSection(i + 1, json.temas[i].tema, json.temas[i].archivos);
        }
        Reveal.initialize();
        Reveal.addEventListener('slidechanged', function( event ) {
        	//event.previousSlide, event.currentSlide, event.indexh, event.indexv
        	//console.log(event);
        	var state = Reveal.getState();
        	var id = event.currentSlide.id;
        	var element = document.getElementById(id);
        	var content = element.innerHTML;
        	if(content=='') {
        	    var dataFile = element.getAttribute('data-file');
        	    load(dataFile, id);
        	}
        });
    }
    function init() {
        load(page, 'section-0');
    }
    function load(page, id) {
    	var xhttp = new XMLHttpRequest();
    	xhttp.onreadystatechange = function() {
    		if (this.readyState == 4 && this.status == 200) {
    		    try {
    		        var json = JSON.parse(this.responseText);
    		        addPages(json);
    		    } catch(error) {
    		        document.getElementById(id).innerHTML = this.responseText;
    		        var state = Reveal.getState();
                    Reveal.setState( state );
    		    }
    		}
    	};
    	xhttp.open("GET", "php/reveal.php?page=" + page, true);
    	xhttp.send();
    }
})();