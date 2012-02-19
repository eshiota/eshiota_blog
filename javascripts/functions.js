// TODO: Rewrite everything in an elegant way using modules and templates.

// Initial namespace
ESHIOTA = window.ESHIOTA || {};

ESHIOTA.Utils = {
  
  getData : function (opts) {
    $.ajax({
      type : 'GET',
      dataType : opts.dataType || 'jsonp',
      url : opts.url,
      success : opts.onSuccess,
      error : opts.onError || function () { return; }
    });
  }
  
};

ESHIOTA.Adapters = {
  
  getFlickr : function () {
    
  }
  
};


$(document).ready(function() {
  function fetchFlickr (element, q, id) {
    var html = $('<ul />')
      , url  = 'http://api.flickr.com/services/feeds/photos_public.gne?ids=' + id + '&lang=en-us&format=json&jsoncallback=?'
      , limit
      , src
      , i
    ;
    
    $.getJSON(url, function (data) {
      limit = Math.min(q, data.items.length);
      
      for (i = 0; i < limit; i++) {
        src = data.items[i].media.m.replace("_m.jpg","_s.jpg");

        html.append(
          $('<li />').append(
            $('<a href=' + data.items[i].link + ' />')
              .attr("title", data.items[i].title + " — Ver esta foto no Flickr")
              .append(
                $('<img src=' + src + ' />')
                  .attr("alt", "Flickr — " + data.items[i].title)
              )
            )
          )
        ;
      }
            
      $("#"+element).html(html);
    });
  }
  
  function fetchInstagram (element, q) {
    var html = $('<ul />')
      , limit
      , src
      , link
      , title
    ;
        
    $.ajax({
      type: "GET",
      dataType: "jsonp",
      cache: false,
      url: "https://api.instagram.com/v1/users/self/media/recent/?access_token=896055.0250db2.7bf9102e46774f2ebefc6570148a0363",
      success : function (d) {
        limit = Math.min(q, d.data.length);

        for (var i = 0; i < limit; i++) {
          title = d.data[i].caption.text;
          src = d.data[i].images.thumbnail.url;
          link = d.data[i].link;

          html.append(
            $('<li />').append(
              $('<a href=' + link + ' />')
                .attr("title", title + " — View this photo on Instagr.am website")
                .append(
                  $('<img src=' + src + ' />')
                    .attr("alt", "Instagr.am — " + title)
                )
              )
            )
          ;
        }

        $("#"+element).html(html);
      }
    });
  }
    
    function setupProjectGallery(speed) {
        var $gallery = $("#project-gallery"),
            qty      = $gallery.find("li").length,
            current  = 0;
        
        galleryResize();
        $(window).resize(galleryResize);
        
        setInterval(function(){
            var previous = $gallery.find("li:eq(" + current + ")").removeClass("active");
            
            current = (current === qty-1) ? 0 : current+1;
            
            $gallery.find("li:eq(" + current + ")").addClass("active");
        }, speed);
        
        function galleryResize () {
            var width = $gallery.width()
              , height
              , ratio = 0.625
            ;

            height = width * ratio;
            $gallery.css("height", height);
        }
    }
    
    fetchFlickr("flicks", 9, "29353094@N07");
    fetchInstagram("instagram", 9);
    
    if($("body").is(".home")) {
        $("#headline h1").fitText(2.83);
        $("#headline h2").fitText(0.86);
        $("#headline h3").fitText(3.05);
    }
    
    if($("#project-gallery").length) {
        setupProjectGallery(5500);
    }
});