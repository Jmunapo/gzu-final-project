initSW();

function initSW() {
  if (!"serviceWorker" in navigator) {
    //service worker isn't supported
    return;
  }
  if (!"PushManager" in window) {
    //service worker isn't supported
    return;
  }

  //register the service worker
  navigator.serviceWorker.register('../sw.js')
    .then(() => {
      console.log('serviceWorker installed!')
      initPush();
    })
    .catch((err) => {
      console.log(err)
    });
}

function initPush() {
  new Promise(function (resolve, reject) {
    const permissionResult = Notification.requestPermission(function (result) {
      resolve(result);
    });
    if (permissionResult) {
      permissionResult.then(resolve, reject);
    }
  })
    .then((permissionResult) => {
      if (permissionResult !== 'granted') {
        throw new Error('We weren\'t granted permission.');
      }
      subscribeUser();
    });
}

function subscribeUser() {
  navigator.serviceWorker.ready
    .then((registration) => {
      const subscribeOptions = {
        userVisibleOnly: true,
        applicationServerKey: urlBase64ToUint8Array(
          'BAIZwd5MAUa5AQX+Wg5slCmbjoaXcgE3TgTB4BkdGhpB1KInWEjNI93H0bf+o0GWZKwenPcOqoDjyOe/Ch5Glcg='
        )
      };
      return registration.pushManager.subscribe(subscribeOptions);
    })
    .then((pushSubscription) => {
      console.log('Received PushSubscription: ', JSON.stringify(pushSubscription));
      storePushSubscription(pushSubscription);
    });
}

function urlBase64ToUint8Array(base64String) {
  var padding = '='.repeat((4 - base64String.length % 4) % 4);
  var base64 = (base64String + padding)
    .replace(/\-/g, '+')
    .replace(/_/g, '/');
  var rawData = window.atob(base64);
  var outputArray = new Uint8Array(rawData.length);
  for (var i = 0; i < rawData.length; ++i) {
    outputArray[i] = rawData.charCodeAt(i);
  }
  return outputArray;
}

function storePushSubscription(pushSubscription) {
  const token = document.querySelector('meta[name=csrf-token]').getAttribute('content');
  fetch('/push', {
    method: 'POST',
    body: JSON.stringify(pushSubscription),
    headers: {
      'Accept': 'application/json',
      'Content-Type': 'application/json',
      'X-CSRF-Token': token
    }
  })
    .then((res) => {
      return res.json();
    })
    .then((res) => {
      console.log(res)
    })
    .catch((err) => {
      console.log(err)
    });
}


