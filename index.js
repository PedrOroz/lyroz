const imagemin 					= require("imagemin"),    		// The imagemin module.
      webp  					= require("imagemin-webp"),   	// imagemin's WebP plugin.
      outputFolder 				= "./images",            		// Output folder
      outputFolderWebp 			= "./images/webp",            		// Output folder
      PNGImages 				= "./images/*.png",         		// PNG images
      JPEGImages 				= "./images/*.{jpg,jpeg}",        	// JPEG images
      SVGImages 				= "./images/*.svg";        		// SVG images
      GIFImages 				= "./images/*.gif";        		// GIF images
const imageminPngquant 			= require('imagemin-pngquant');
const imageminJpegtran 			= require('imagemin-jpegtran');
const imageminGifsicle 			= require('imagemin-gifsicle');
const imageminSvgo 				= require('imagemin-svgo');
const {extendDefaultPlugins} 	= require('svgo');

(async () => {
	/*OPTIMIZAR*/
	await imagemin([PNGImages], outputFolder, {
		use: [
            imageminPngquant()
        ]
	});
	console.log('PNGs optimized');
	/*WEBP*/
	await imagemin([PNGImages], outputFolderWebp, {
		plugins: [
		  	webp({
		      	lossless: true // Losslessly encode images
			})
		]
	});
	console.log('PNGs processed');
	/*OPTIMIZAR*/
	await imagemin([JPEGImages], outputFolder, {
		use: [
            imageminJpegtran()
        ]
	});
	console.log('JPGs and JPEGs optimized');
	/*WEBP*/
	await imagemin([JPEGImages], outputFolderWebp, {
		plugins: [
	  		webp({
	   	 		quality: 65 // Quality setting from 0 to 100
	  		})
	  	]
	});
	console.log('JPGs and JPEGs processed');
	/*OPTIMIZAR*/
	/*await imagemin([SVGImages], outputFolder, {
		plugins: [
			imageminSvgo({
				plugins:
					extendDefaultPlugins([{
						name: 'removeViewBox',
						active: false
					}
				])
			})
		]
	});
	console.log('SVGs optimized');*/
	/*OPTIMIZAR*/
	await imagemin([GIFImages], outputFolder, {
        use: [
            imageminGifsicle()
        ]
    });
    console.log('GIFs optimized');
})();