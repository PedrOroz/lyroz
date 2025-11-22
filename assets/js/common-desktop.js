var detector = require('detector');
var ua = detector.parse(navigator.userAgent);
if(ua.device.name === 'iphone' || ua.device.name === 'ipad' || ua.device.name === 'android' || ua.device.name === 'blackberry' || ua.device.name === 'wp'
	|| ua.device.name === 'mi' || ua.device.name === 'meizu' || ua.device.name === 'nexus' || ua.device.name === 'nokia' || ua.device.name === 'samsung'
	|| ua.device.name === 'aliyun' || ua.device.name === 'huawei' || ua.device.name === 'lenovo' || ua.device.name === 'zte' || ua.device.name === 'vivo'
	|| ua.device.name === 'htc' || ua.device.name === 'oppo' || ua.device.name === 'konka' || ua.device.name === 'sonyericsson' || ua.device.name === 'coolpad'
	|| ua.device.name === 'lg' || ua.device.name === 'alcatel'){
}else{
		document.location = url_desktop;
	 }