class Template{ImageLazyLoad(a){a?a.each((function(){$(this).addClass("imageloaded").css({"background-image":"url("+$(this).data("image")+")"})})):$(".lazyLoadImage").each((function(){$(this).data("image")&&$(this).addClass("imageloaded").css({"background-image":"url("+$(this).data("image")+")"})}))}responsiveChanges(){const a=new Template;$(window).width()<=1024?($("#mainDisplay .blcGeral ul.postList").removeClass("vert medium").addClass("horiz small"),a.ImageLazyLoad($("#mainDisplay .blcGeral ul.postList li .lazyLoadImage"))):($("#mainDisplay .blcGeral ul.postList").removeClass("horiz small").addClass("vert medium"),a.ImageLazyLoad($("#mainDisplay .blcGeral ul.postList li .lazyLoadImage"))),$(window).width()<=992?($("#tutoriaisHome ul.postList").removeClass("vert medium").addClass("horiz small"),a.ImageLazyLoad($("#tutoriaisHome ul.postList li .lazyLoadImage"))):($("#tutoriaisHome ul.postList ul.postList").removeClass("horiz small").addClass("vert medium"),a.ImageLazyLoad($("#tutoriaisHome ul.postList li .lazyLoadImage")))}bannerSystem(){$("a.bannerSystem").each((function(){var a;a={parent:$(this),nome:$(this).data("cliente"),url:$(this).data("url"),origin:$(this).data("pagina"),display:$(this).data("display"),image:$(this).find("img"),desktop:$(this).find("img").data("img-desktop"),tablet:$(this).find("img").data("img-tablet"),mobile:$(this).find("img").data("img-mobile")},$(window).width()>=1024&&a.image.attr("src",a.desktop),$(window).width()<1024&&(a.tablet?a.image.attr("src",a.tablet):a.image.attr("src",a.desktop)),$(window).width()<560&&a.image.attr("src",a.mobile),a.parent.removeClass("inicial"),$(this).on("click",(function(a){a.preventDefault(),window.open($(this).data("url"))}))}))}getNewsFromWebitcoin(){const a=new Template;$(".getNewsWebitcoin").each((function(){var t=$(this),i=$(this).attr("data-type");$.post(t.attr("data-json"),{token:"FxQYhUmg6XpvtN5NsQ9PBZeP1rvKBiai",post_type:t.attr("data-post-type"),posts_per_page:t.attr("data-post-total")},(function(e){!function(t,i,e){for(var s="",o=0;o<i.length;o++)s+=0==e?'<li class="col-xs-12 col-xl-4">':"<li>",s+='<div class="image">',s+='<a href="'+i[o].url+'" title="Ir para página do vídeo <?php the_title(); ?>">',s+='<div class="lazyLoadImage" data-image="'+i[o].imagem+'">',s+='<img src="https://tv.webitcoin.com.br/wp-content/themes/webitcoin-tv/images/default-videos-small-2.png">',s+="</div>",s+="</a>",s+='</div><div class="content">',0==e&&(s+='<a href="'+i[o].category_url+'" class="categoria">',s+=i[o].category[0].cat_name,s+="</a>"),s+='<a href="'+i[o].url+'" title="Ir para página do vídeo <?php the_title(); ?>">'+i[o].titulo+"</a>",s+="</div>",s+="</li>";t.html(s),a.ImageLazyLoad()}(t,e,i)}))}))}init(){this.ImageLazyLoad(),this.responsiveChanges(),this.bannerSystem(),this.getNewsFromWebitcoin(),$(window).resize((function(){this.responsiveChanges()}))}}export default Template;
//# sourceMappingURL=Template.js.map