export let isCordovaAvailable = () => {
	if (!(<any>window).cordova) {
		console.log('This is a native feature. Please use a device');
		return false;
	}
	return true;
};

export const getEnv = () => {
	let obj = { BASE_URL: '' }
	if (!isCordovaAvailable()) {
		obj.BASE_URL = 'http://127.0.0.1:8000';
	} else {
		obj.BASE_URL = 'https://gzu.joemags.co.zw';
	}
	return obj;
}