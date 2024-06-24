( function( blocks, element, editor, components, i18n ) {
    var el = element.createElement;

    var __                = i18n.__;
    var createElement     = element.createElement;
 
    blocks.registerBlockType( 'tishonator/image-flow-gallery-block', {
        title: 'Image Flow Gallery',
        icon: 'format-gallery',
        category: 'common',

        attributes: {
            galleryImagesSrc: {
                type: 'array',
            },
            galleryImagesAlt: {
                type: 'array',
            },
            galleryImagesTitle: {
                type: 'array',
            }
        },

        edit: function( props ) {

            var mediaPlaceHolderEl = createElement( wp.blockEditor.MediaPlaceholder, {
                    multiple: true,
                    onSelect: function ( selectedImages ) {
                        var imgArrSrc = [];
                        var imgArrAlt = [];
                        var imgArrTitle = [];
                        for (var i = 0; i < selectedImages.length; i++) {
                            var selectedImage = selectedImages[i];

                            imgArrSrc.push(selectedImage.url);
                            imgArrAlt.push(selectedImage.alt);
                            imgArrTitle.push(selectedImage.title);
                        }
                        props.setAttributes( { galleryImagesSrc: imgArrSrc } );
                        props.setAttributes( { galleryImagesAlt: imgArrAlt } );
                        props.setAttributes( { galleryImagesTitle: imgArrTitle } );
                    },
                } );

            var flowGalleryImages = [];
            var length = (props.attributes && props.attributes.galleryImagesSrc) ? 
                props.attributes.galleryImagesSrc.length : 0;
            for (var i = 0; i < length; i++) {
                var galleryImgSrc = (props.attributes && props.attributes.galleryImagesSrc
                                        && (i < props.attributes.galleryImagesSrc.length)) ?
                                        props.attributes.galleryImagesSrc[i] : '';
                var galleryImgAlt = (props.attributes && props.attributes.galleryImgAlt
                                        && (i < props.attributes.galleryImgAlt.length)) ?
                                        props.attributes.galleryImagesAlt[i] : '';
                var galleryImgTitle = (props.attributes && props.attributes.galleryImgTitle
                                        && (i < props.attributes.galleryImgTitle.length)) ?
                                        props.attributes.galleryImagesTitle[i] : '';

                flowGalleryImages.push( createElement('li', {'data-flip-title': galleryImgTitle}, 
                                            createElement( 'img', {
                                                src: galleryImgSrc,
                                                alt: galleryImgAlt
                                            } ) ) );
            }

            var galleryImagesEl = createElement('div', {class:'coverflow'}, 
                                createElement('ul', {class: 'flip-items'}, flowGalleryImages ) );

            return [mediaPlaceHolderEl, galleryImagesEl];
        },
     
        save: function( props ) {

            var flowGalleryImages = [];
            for (var i = 0; i < props.attributes.galleryImagesSrc.length; i++) {
                var galleryImgSrc = props.attributes.galleryImagesSrc[i];
                var galleryImgAlt = props.attributes.galleryImagesAlt[i];
                var galleryImgTitle = props.attributes.galleryImagesTitle[i];

                flowGalleryImages.push( createElement('li', {'data-flip-title': galleryImgTitle}, 
                                            createElement( 'img', {
                                                src: galleryImgSrc,
                                                alt: galleryImgAlt
                                            } ) ) );
            }

            return createElement('div', {class:'coverflow'}, 
                                createElement('ul', {class: 'flip-items'}, flowGalleryImages ) );
        }
    } );
}(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor,
    window.wp.components,
    window.wp.i18n
) );
