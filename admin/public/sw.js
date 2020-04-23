self.addEventListener('push', function (e) {
  if (!(self.Notification && self.Notification.permission === 'granted')) {
    console.log('You should allow notifications');
    return;
  }
  if (e.data) {
    console.log(e);
    try {
      var msg = e.data.json();
      console.log(self)
      e.waitUntil(self.registration.showNotification(msg.title, {
        body: msg.body,
        icon: msg.icon,
        image: msg.icon
      }));
    } catch (error) {
      console.log(error, e.data);
    }

  }
});