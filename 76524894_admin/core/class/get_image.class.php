<?php
	/**
	* GetImage Class, version: 1.0
	* Author - valiano - http://codecanyon.net/user/valiano
	* Release date: 23/11/2010
	*/

	function dmp($str){
		echo "<pre>";
		echo $str;
		echo "</pre>";
	}

	class GetImage{
		const TYPE_EXACT = "exact";
		const TYPE_EXACT_TOP = "exacttop";

		private $dirImages = "";
		private $dirCache = "";
		private $pathErrorImage = "";
		private $jpeg_quality = 100;

		public function __construct(){
			//validate GD library
			$this->validateGD();
		}

		/**
		 *
		 * Show error message
		 * @param $str error string
		 */
		private function throwError($str){
			echo $str;
			exit();
		}

		/**
		 *
		 * Set jpeg quality
		 * @param $folderCache
		 */
		public function setJpegQuality($quality){
			$this->jpeg_quality = $quality;
		}


		/**
		 *
		 * Set cache folder
		 * @param $folderCache
		 */
		public function setCacheFolder($folderCache){
			//add '/' sign at the end
			//if(!preg_match("/^.*\//", $folderCache)) $folderCache.="/";
			//$this->dirCache = $folderCache;
			$this->dirCache = $folderCache."/";
		}

		/**
		 *
		 * Set images folder
		 * @param $folderImages
		 */
		public function setImagesFolder($folderImages){
			//add '/' sign at the end
			//if(!preg_match("/^.*\//", $folderImages)) $folderImages.="/";
			//$this->dirImages = $folderImages;
		}

		/**
		 *
		 * Set path to (image not found) image
		 * @param $pathErrorImage
		 */
		public function setErrorImagePath($pathErrorImage){
			$this->pathErrorImage = $pathErrorImage;
		}

		/**
		 * Validates that GD library exists. If not - print error
		 */
		private function validateGD(){
			if(function_exists("gd_info") == false){
				echo "PHP GD library not found. Please enable it in php.ini";
				exit();
			}
		}

		/**
		 * Validate if the type is "exact" and there is valid width and height.
		 */
		private function validateExact($type,$width,$height){
			if($type == self::TYPE_EXACT || $type == self::TYPE_EXACT_TOP){
				if($width <= 0 || $height <= 0)
				{
					echo "For <b>'$type'</b> type you must specify both - the width and the height";
					exit();
				}
			}
		}

		/**
		 *
		 * Validate that error image path exists
		 */
		private function validateErrorImagePath(){
			if(!is_file($this->pathErrorImage)){
				return "../../../img/image_not_found_1240.jpg";
				//echo "No 'error image' found by this path:".$this->pathErrorImage;
				exit();
			}
		}

		/**
		 * get path info of certain path with all needed fields
		 * @param $filepath
		 */
		private function getPathInfo($filepath){
			$info = pathinfo($filepath);

			//fix the filename problem
			if(!isset($info["filename"])){
				$filename = $info["basename"];
				if(isset($info["extension"]))
					$filename = substr($info["basename"],0,(-strlen($info["extension"])-1));
				$info["filename"] = $filename;
			}

			return($info);
		}

		/**
		 *
		 * Create thumbnail filename for saving.
		 * @param string $filename
		 * @param string $filetime - timestamp image update/create
		 * @param number $width
		 * @param number $height
		 * @param string $title_prefix_lang
		 * @param string $type
		 */
		private function getThumbFilename($filename,$filetime,$width,$height,$title_prefix_lang,$type=""){
			$info 			= pathInfo($filename);
			$ext 			= $info["extension"];
			$name 			= $info["filename"];
			$width 			= ceil($width);
			//$height 		= ceil($height);
			$thumbFilename 	= $name;
			//$thumbFilename = $name."_".$width."x".$height;
			if($type != "") //$thumbFilename .= "_" . $type;
				$thumbFilename .= "_" . $title_prefix_lang;
				//$thumbFilename .= "_".$filetime;
				$thumbFilename .= "_".$width.".".$ext;
				//$thumbFilename .= ".".$ext;
			return($thumbFilename);
		}

		/**
		 *
		 * Get thumbnail filepath
		 * @param string $filename
		 * @param string $filetime - timestamp image update/create
		 * @param number $width
		 * @param number $height
		 * @param string $title_prefix_lang
		 * @param string $type
		 */
		private function getThumbFilepath($filename,$filetime,$width,$height,$title_prefix_lang,$type=""){
			$filename = $this->getThumbFilename($filename,$filetime,$width,$height,$title_prefix_lang,$type);
			$filepath = $this->dirCache.$filename;
			return($filepath);
		}

		/**
		 *
		 * Output image from filepath
		 * @param string $filepath
		 */
		private function outputImage($filepath){
			$info = $this->getPathInfo($filepath);
			$ext = $info["extension"];
			$filetime = filemtime($filepath);

			if(strtolower($ext) == "jpg")
				$ext = "jpeg";

			$numExpires = 31536000;	//one year
			$strExpires = date('D, d M Y H:i:s',time()+$numExpires);
			$strModified = date('D, d M Y H:i:s',$filetime);

			$contents = file_get_contents($filepath);
			$filesize = strlen($contents);
			header("Last-Modified: $strModified GMT");
			header("Expires: $strExpires GMT");
			header("Cache-Control: public");
			header("Content-Type: image/$ext");
			header("Content-Length: $filesize");
			echo $contents;
			exit();
		}

		/**
		 *
		 * Output image with download headers from filepath
		 * @param string $filepath
		 * @param string $filename - the new filename
		 * @param string $mimeType - the mime type of the file
		 */
		private function outputImageForDownload($filepath,$filename,$mimeType=""){
			$contents = file_get_contents($filepath);
			$filesize = strlen($contents);

			if($mimeType == ""){
				$info = $this->getPathInfo($filepath);
				$ext = $info["extension"];
				$mimeType = "image/$ext";
			}

			header("Content-Type: $mimeType");
			header("Content-Disposition: attachment; filename=\"$filename\"");
			header("Content-Length: $filesize");
			echo $contents;
			exit();
		}

		/**
		 *
		 * Download image from images folder
		 * @param string $filename
		 */
		private function downloadImage($filename){
			$filepath = $this->dirImages."/".$filename;
			if(!is_file($filepath)) {
				echo "file doesn't exists";
				exit();
			}
			$this->outputImageForDownload($filepath,$filename);
		}

		/**
		 *
		 * get src image from filepath according the image type
		 * @param string $filepath
		 * @param string $type
		 */
		private function getGdSrcImage($filepath,$type){
			// create the image
			$src_img = false;
			switch($type){
				case IMAGETYPE_JPEG:
					$src_img = @imagecreatefromjpeg($filepath);
				break;
				case IMAGETYPE_PNG:
					$src_img = @imagecreatefrompng($filepath);
				break;
				case IMAGETYPE_GIF:
					$src_img = @imagecreatefromgif($filepath);
				break;
				case IMAGETYPE_WBMP:
					$src_img = @imagecreatefromwbmp($filepath);
				break;
				default:
					$this->throwError("wrong image format, can't resize");
				break;
			}

			if($src_img == false) $this->throwError("Can't resize image: $filepath");
			return(array("success"=>true,"image"=>$src_img));
		}

		/**
		 *
		 * save gd image to some filepath. return if success or not
		 * @param img $dst_img
		 * @param string $filepath
		 * @param string $type
		 */
		private function saveGdImage($dst_img,$filepath,$type){
			$successSaving = false;
			switch($type){
				case IMAGETYPE_JPEG:
					$successSaving = imagejpeg($dst_img,$filepath,$this->jpeg_quality);
				break;
				case IMAGETYPE_PNG:
					$successSaving = imagepng($dst_img,$filepath);
				break;
				case IMAGETYPE_GIF:
					$successSaving = imagegif($dst_img,$filepath);
				break;
				case IMAGETYPE_WBMP:
					$successSaving = imagewbmp($dst_img,$filepath);
				break;
			}

			return($successSaving);
		}

		/**
		 *
		 * crop image to specifix height and width , and save it to new path
		 * @param string $filepath
		 * @param number $cropWidth
		 * @param number $cropHeight
		 * @param string $filepathNew
		 * @param string $type
		 */
		private function cropImageSaveNew($filepath,$cropWidth,$cropHeight,$filepathNew,$type){

			$imgInfo = getimagesize($filepath);
			$imgType = $imgInfo[2];

			$response = $this->getGdSrcImage($filepath,$imgType);
			if($response["success"] == false) return($response);

			$src_img = $response["image"];

			$width = imageSX($src_img);
			$height = imageSY($src_img);

			//crop the image from the top
			$startx = 0;
			$starty = 0;

			//find precrop width and height:
			$percent = $cropWidth / $width;
			$newWidth = $cropWidth;
			$newHeight = ceil($percent*$height);

			if($type == self::TYPE_EXACT){ 	//crop the image from the middle
				//$startx = ($width-$cropWidth)/2;
				$startx = 0;
				$starty = ($newHeight-$cropHeight)/2 / $percent;
			}

			if($newHeight < $cropHeight){	//by width
				$percent = $cropHeight / $height;
				$newHeight = $cropHeight;
				$newWidth = ceil($percent*$width);

				if($type == self::TYPE_EXACT){ 	//crop the image from the middle
					$startx = ($newWidth - $cropWidth)/2 / $percent;	//the startx is related to big image
					$starty = 0;
				}
			}

			//resize the picture:
			$tmp_img = ImageCreateTrueColor($newWidth,$newHeight);

			$this->handleTransparency($tmp_img,$imgType,$newWidth,$newHeight);

			imagecopyresampled($tmp_img,$src_img,0,0,floor($startx),floor($starty),$newWidth,$newHeight,$width,$height);

			//crop the picture:
			$dst_img = ImageCreateTrueColor($cropWidth,$cropHeight);

			$this->handleTransparency($dst_img,$imgType,$cropWidth,$cropHeight);

			imagecopy($dst_img, $tmp_img, 0, 0, 0, 0, $newWidth, $newHeight);

			//save the picture
			$this->saveGdImage($dst_img,$filepathNew,$imgType);

			imagedestroy($dst_img);
			imagedestroy($src_img);
			imagedestroy($tmp_img);

			//return(array("success"=>true));
		}

		/**
		 *
		 * if the images are png or gif - handle image transparency
		 * @param img $dst_img
		 * @param string $imgType
		 * @param number $newWidth
		 * @param number $newHeight
		 */
		private function handleTransparency(&$dst_img,$imgType,$newWidth,$newHeight){
			//handle transparency:
			if($imgType == IMAGETYPE_PNG || $imgType == IMAGETYPE_GIF){
			  imagealphablending($dst_img, false);
			  imagesavealpha($dst_img,true);
			  $transparent = imagecolorallocatealpha($dst_img, 255,  255, 255, 127);
			  imagefilledrectangle($dst_img, 0,  0, $newWidth, $newHeight,  $transparent);
			}
		}

		/**
		 *
		 * resize image and save it to new path
		 * @param string $filepath
		 * @param number $maxWidth
		 * @param number $maxHeight
		 * @param string $filepathNew
		 */
		private function resizeImageSaveNew($filepath,$maxWidth,$maxHeight,$filepathNew){

			$imgInfo = getimagesize($filepath);
			$imgType = $imgInfo[2];

			$response = $this->getGdSrcImage($filepath,$imgType);
			if($response["success"] == false) return($response);

			$src_img = $response["image"];

			$width = imageSX($src_img);
			$height = imageSY($src_img);

			$newWidth = $width;
			$newHeight = $height;


			//find new width
			if($height > $maxHeight){
				$procent = $maxHeight / $height;
				$newWidth = ceil($width * $procent);
				$newHeight = $maxHeight;
			}

			//if the new width is grater than max width, find new height, and remain the width.
			if($newWidth > $maxWidth){
				$procent = $maxWidth / $newWidth;
				$newHeight = ceil($newHeight * $procent);
				$newWidth = $maxWidth;
			}

			//if the image don't need to be resized, just copy it from source to destanation.
			if($newWidth == $width && $newHeight == $height){
				$success = copy($filepath,$filepathNew);
				if($success == false) $this->throwError("can't copy the image from one path to another");
			}
			else{		//else create the resized image, and save it to new path:
				$dst_img=ImageCreateTrueColor($newWidth,$newHeight);

				$this->handleTransparency($dst_img,$imgType,$newWidth,$newHeight);

				//copy the new resampled image:
				imagecopyresampled($dst_img,$src_img,0,0,0,0,$newWidth,$newHeight,$width,$height);

				$this->saveGdImage($dst_img,$filepathNew,$imgType);
				imagedestroy($dst_img);
			}

			imagedestroy($src_img);
			$result = array();
			$result["success"] = true;
			return($result);
		}


		/**
		 *
		 * Show image from the images path, with saving to cache
		 * @param string $filename
		 * @param number $maxWidth
		 * @param number $maxHeight
		 * @param string $title_prefix_lang
		 * @param string $type
		 */

		public function showImage($filename,$maxWidth=-1,$maxHeight=-1,string $title_prefix_lang = null,$type="")
		{
			$this->validateErrorImagePath();
			$this->validateExact($type,$maxWidth,$maxHeight);

			$filepath = $this->dirImages.$filename;

			if(!is_file($filepath)) $filepath = $this->pathErrorImage;

			//get image filetime
			$filetime = filemtime($filepath);

			if(is_numeric($maxWidth) == false || is_numeric($maxHeight) == false) $this->outputImage($filepath);
			if($maxWidth <= 0 && $maxHeight <= 0) $this->outputImage($filepath);

			if($maxWidth <= 0) $maxWidth = 1000000;
			if($maxHeight <= 0) $maxHeight = 100000;

			$filepathNew = $this->getThumbFilepath($filename,$filetime,$maxWidth,$maxHeight,$title_prefix_lang,$type);

			if($type == self::TYPE_EXACT || $type == self::TYPE_EXACT_TOP)
				$response = $this->cropImageSaveNew($filepath,$maxWidth,$maxHeight,$filepathNew,$type);
			else
				$response = $this->resizeImageSaveNew($filepath,$maxWidth,$maxHeight,$filepathNew);

			/*if($response["success"] == false) $this->outputImage($filepath);
			if(is_file($filepathNew)) $this->outputImage($filepathNew);
			else $this->outputImage($filepath);
			exit();*/
		}

		/**
		 * [showImageWithoutLanguage description]
		 *
		 * @param  [type]  $filename  [description]
		 * @param  integer $maxWidth  [description]
		 * @param  integer $maxHeight [description]
		 * @param  string  $type      [description]
		 * @return [type]             [description]
		 */

		public function showImageWithoutLanguage($filename,$maxWidth=-1,$maxHeight=-1,$type="")
		{
			$this->validateErrorImagePath();
			$this->validateExact($type,$maxWidth,$maxHeight);

			$filepath = $this->dirImages.$filename;

			if(!is_file($filepath)) $filepath = $this->pathErrorImage;

			//get image filetime
			$filetime = filemtime($filepath);

			if(is_numeric($maxWidth) == false || is_numeric($maxHeight) == false) $this->outputImage($filepath);
			if($maxWidth <= 0 && $maxHeight <= 0) $this->outputImage($filepath);

			if($maxWidth <= 0) $maxWidth = 1000000;
			if($maxHeight <= 0) $maxHeight = 100000;

			$filepathNew = $this->getThumbFilepathWithoutLanguage($filename,$filetime,$maxWidth,$maxHeight,$type);

			if($type == self::TYPE_EXACT || $type == self::TYPE_EXACT_TOP)
				$response = $this->cropImageSaveNew($filepath,$maxWidth,$maxHeight,$filepathNew,$type);
			else
				$response = $this->resizeImageSaveNew($filepath,$maxWidth,$maxHeight,$filepathNew);

			/*if($response["success"] == false) $this->outputImage($filepath);
			if(is_file($filepathNew)) $this->outputImage($filepathNew);
			else $this->outputImage($filepath);
			exit();*/
		}

		/**
		 * [getThumbFilepathWithoutLanguage description]
		 *
		 * @param  [type] $filename [description]
		 * @param  [type] $filetime [description]
		 * @param  [type] $width    [description]
		 * @param  [type] $height   [description]
		 * @param  string $type     [description]
		 * @return [type]           [description]
		 */

		private function getThumbFilepathWithoutLanguage($filename,$filetime,$width,$height,$type=""){
			$filename = $this->getThumbFilenameWithoutLanguage($filename,$filetime,$width,$height,$type);
			$filepath = $this->dirCache.$filename;
			return($filepath);
		}

		/**
		 * [getThumbFilenameWithoutLanguage description]
		 *
		 * @param  [type] $filename [description]
		 * @param  [type] $filetime [description]
		 * @param  [type] $width    [description]
		 * @param  [type] $height   [description]
		 * @param  string $type     [description]
		 * @return [type]           [description]
		 */

		private function getThumbFilenameWithoutLanguage($filename,$filetime,$width,$height,$type=""){
			$info 			= pathInfo($filename);
			$ext 			= $info["extension"];
			$name 			= $info["filename"];
			$width 			= ceil($width);
			//$height 		= ceil($height);
			$thumbFilename 	= $name;
			//$thumbFilename = $name."_".$width."x".$height;
			if($type != "") //$thumbFilename .= "_" . $type;
				//$thumbFilename .= "_".$filetime;
				$thumbFilename .= "_".$width.".".$ext;
				//$thumbFilename .= ".".$ext;
			return($thumbFilename);
		}
	}
?>