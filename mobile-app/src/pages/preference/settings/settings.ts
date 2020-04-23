import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, AlertController } from 'ionic-angular';
import { OneSignal } from '@ionic-native/onesignal';
import { isCordovaAvailable } from '../../../common/is-cordova-available';
import { GlobalFuncsProvider } from '../../../providers/global-funcs/global-funcs';
import { Storage } from '@ionic/storage';

@IonicPage()
@Component({
  selector: 'page-settings',
  templateUrl: 'settings.html',
})
export class SettingsPage {

  notify: boolean = false;
  rated: boolean = false;

  settings = {
    ring_mode: true,
  };

  notice_tags = [
    { label: 'Notices', name: 'notice', checked: false },
    { label: 'News', name: 'news', checked: false },
    { label: 'Results', name: 'results', checked: false },
    { label: 'Events', name: 'events', checked: false },
    { label: 'Examination Timetable', name: 'timetable', checked: true },
  ];



  constructor(public navCtrl: NavController,
    private oneSignal: OneSignal,
    public alertCtrl: AlertController,
    public storage: Storage,
    private _gf: GlobalFuncsProvider,
    public navParams: NavParams) {
  }

  ionViewDidLoad() {
    this.storage.get('NOTICE_TAGS').then((data: Array<any>) => {
      if (data && data.length) {
        this.notice_tags.forEach(n => {
          let i = data.indexOf(n.name);
          n.checked = i !== -1;
        });
      }
    })
  }

  notifyMe() {
    let alert = this.alertCtrl.create();
    alert.setSubTitle('Show notifications on');

    this.notice_tags.forEach(notice => {
      alert.addInput({
        type: 'checkbox',
        label: notice.label,
        value: notice.name,
        checked: notice.checked
      });
    });


    alert.addButton('Cancel');
    alert.addButton({
      text: 'Save',
      handler: data => {
        console.log('Checkbox data:', data);

        let toDelete = [];

        this.notice_tags.forEach(n => {
          let i = data.indexOf(n.name);
          n.checked = i !== -1;
          if (!n.checked) {
            toDelete.push(n.name);
          }
        });
        this.changeIcon();
        this.receiveNotif(data, toDelete);
      }
    });
    alert.present();
    return false;
  }

  rateApp() {
    this.rated = true;
  }

  faq() {
    window.open('https://library.gzu.ac.zw/?p=361', '_system', 'location=yes')
  }

  changeIcon() {
    let check = this.notice_tags.filter(e => e.checked);

    this.settings.ring_mode = (check.length) ? true : false;
  }

  receiveNotif(tags, delTags) {
    if (isCordovaAvailable()) {
      if (tags.length) {
        tags.forEach(t => {
          this.oneSignal.sendTag(t, "1");
        });
      }
      if (delTags.length) {
        this.oneSignal.deleteTags(delTags);
      }
    }
    this.storage.set('NOTICE_TAGS', tags).then(() => "");
    this._gf.showToster('Saved', 'info-toaster', 450);

  }

}
