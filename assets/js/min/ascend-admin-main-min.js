jQuery(document).ready(function($){function e(){var e=$("#post-formats-select input:checked").attr("value");void 0!==e&&("gallery"===e?$("#gallery_post_metabox").stop(!0,!0).fadeIn(500):$("#gallery_post_metabox").stop(!0,!0).fadeOut(500),"0"===e?$("#standard_post_metabox").stop(!0,!0).fadeIn(500):$("#standard_post_metabox").stop(!0,!0).fadeOut(500),"image"===e?$("#image_post_metabox").stop(!0,!0).fadeIn(500):$("#image_post_metabox").stop(!0,!0).fadeOut(500),"video"===e?$("#video_post_metabox").stop(!0,!0).fadeIn(500):$("#video_post_metabox").stop(!0,!0).fadeOut(500),"quote"===e?$("#quote_post_metabox").stop(!0,!0).fadeIn(500):$("#quote_post_metabox").stop(!0,!0).fadeOut(500))}$("#post-formats-select input").change(e),$(window).load(function(){e()})}),function($){"use strict";$.imgupload=$.imgupload||{},$(document).ready(function(){$.imgupload()}),$.imgupload=function(){$("body").on({click:function(e){var a=$(this).closest(".kad_img_upload_widget");if("undefined"!=typeof wp&&wp.media){e.preventDefault();var t,i=$(this);if(t)return void t.open();t=wp.media({multiple:!1,library:{type:"image"}}),t.on("select",function(){var e=t.state().get("selection").first();t.close(),a.find(".kad_custom_media_url").val(e.attributes.url),a.find(".kad_custom_media_id").val(e.attributes.id);var i=e.attributes.url;i=void 0!==e.attributes.sizes&&void 0!==e.attributes.sizes.thumbnail?e.attributes.sizes.thumbnail.url:e.attributes.icon,a.find(".kad_custom_media_image").attr("src",i),a.find(".kad_custom_media_id").trigger("change")}),t.open()}}},".kad_custom_media_upload")}}(jQuery),function($){"use strict";$.juanjimeneztjgallery=$.juanjimeneztjgallery||{},$(document).ready(function(){$.juanjimeneztjgallery()}),$.juanjimeneztjgallery=function(){$("body").on({click:function(e){var a=$(this).closest(".kad_widget_image_gallery");if("clear-gallery"===e.currentTarget.id){var t=a.find(".gallery_values").val("");return void a.find(".gallery_images").html("")}if("undefined"!=typeof wp&&wp.media&&wp.media.gallery){e.preventDefault();var i=$(this),l=a.find(".gallery_values").val();wp.media.view.Settings.Gallery=wp.media.view.Settings.Gallery.extend({template:function(e){}});var d;if(l)d='[gallery ids="'+l+'"]',r=wp.media.gallery.edit(d);else var n={frame:"post",state:"gallery",multiple:!0},r=wp.media.editor.open("gallery_values",n);return r.state("gallery-edit").on("update",function(e){a.find(".gallery_images").html("");var t,i="",l,d,n=e.models.map(function(e){return t=e.toJSON(),l=void 0!==t.sizes.thumbnail?t.sizes.thumbnail.url:t.url,d=t.id,i='<a class="of-uploaded-image edit-kt-meta-gal" data-attachment-id="'+d+'" href="#"><img class="gallery-widget-image" src="'+l+'" /></a>',a.find(".gallery_images").append(i),e.id});a.find(".gallery_values").val(n.join(",")),a.find(".gallery_values").trigger("change")}),!1}}},".gallery-attachments")}}(jQuery),function($){"use strict";$.juanjimeneztj_attachment_gallery=$.juanjimeneztj_attachment_gallery||{},$(document).ready(function(){$.juanjimeneztj_attachment_gallery()}),$.juanjimeneztj_attachment_gallery=function(){$("body").on({click:function(e){var a=$(this).closest(".kad_widget_image_gallery"),t=$(this).data("attachment-id");if("undefined"!=typeof wp&&wp.media&&wp.media.gallery){e.preventDefault(),wp.media.view.Settings.Gallery=wp.media.view.Settings.Gallery.extend({template:function(e){}});var i=$(this),l=a.find(".gallery_values").val(),d='[gallery ids="'+l+'"]';return wp.media.gallery.edit(d).state("gallery-edit").on("update",function(e){a.find(".gallery_images").html("");var t,i="",l,d,n=e.models.map(function(e){return t=e.toJSON(),l=void 0!==t.sizes.thumbnail?t.sizes.thumbnail.url:t.url,d=t.id,i='<a class="of-uploaded-image edit-kt-meta-gal" data-attachment-id="'+d+'" href="#"><img class="gallery-widget-image" src="'+l+'" /></a>',a.find(".gallery_images").append(i),e.id});a.find(".gallery_values").val(n.join(",")),a.find(".gallery_values").trigger("change")}),!1}}},".edit-kt-meta-gal")}}(jQuery);