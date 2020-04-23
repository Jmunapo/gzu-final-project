import { Component, ViewChild, NgZone } from '@angular/core';
import { Nav, Platform, MenuController, ToastController, Events } from 'ionic-angular';
import { SplashScreen } from '@ionic-native/splash-screen';

import { timer } from "rxjs/observable/timer";
import { isCordovaAvailable } from '../common/is-cordova-available';
import { AuthProvider } from '../providers/auth/auth';
import { OneSignal, OSNotificationPayload } from '@ionic-native/onesignal';
import { oneSignalAppId, sender_id } from '../common/app.config';
import { CacheService } from 'ionic-cache';
import { ImageLoaderConfig } from 'ionic-image-loader';
import { GlobalFuncsProvider } from '../providers/global-funcs/global-funcs';
import { HomePage } from '../pages/home/home';
import { LoginPage } from '../pages/auth/login/login';
@Component({
  templateUrl: 'app.html'
})
export class MyApp {
  @ViewChild(Nav) nav: Nav;
  showSplash: boolean = true;

  clicked: boolean = false;

  rootPage: any;

  token: string;

  user: any;


  constructor(public platform: Platform,
    private imgLoader: ImageLoaderConfig,
    private auth: AuthProvider,
    private _gf: GlobalFuncsProvider,
    private zone: NgZone,
    private oneSignal: OneSignal,
    public toastCtrl: ToastController,
    private event: Events,
    private cache: CacheService,
    private menuCtrl: MenuController,
    public splashScreen: SplashScreen) {

    this.featureComing();

    this.initializeApp();

  }

  initializeApp() {
    this.platform.ready().then(() => {
      this.cache.setDefaultTTL(60 * 60 * 24) //1 day cache
      this.cache.setOfflineInvalidate(false);
      //this.cache.clearAll().then(() => console.log('cleared'))

      this.validateAuth();
      this.registerBackButton();

      timer(15000).subscribe(() => this.showSplash = false);
    });
  }

  private validateAuth() {
    this.auth.authState.subscribe(user => {
      if (user === undefined) {
        return false;

      }
      if (user) {
        this.zone.run(() => this.user = user);

        if (user && user.access_token) {
          this.token = user.access_token;
        }
        this.oneSignal.sendTag('timetable', "1");

        this.menuCtrl.enable(true, 'on-login');
        this.rootPage = 'HomePage';
        //this.rootPage = 'RegisterPage';

        timer(500).subscribe(() => this.showSplash = false);

      } else {

        this.showSplash = true;
        this.rootPage = 'LoginPage';
        this.menuCtrl.enable(false, 'on-login');
        timer(500).subscribe(() => this.showSplash = false);

      }

      this.doCordova();

    })
  }

  private doCordova() {
    if (isCordovaAvailable()) {

      this.imgLoader.enableDebugMode();
      this.imgLoader.enableFallbackAsPlaceholder(true);
      this.imgLoader.setFallbackUrl('assets/imgs/portal.png');
      this.imgLoader.setMaximumCacheAge(24 * 60 * 60 * 1000)
      this.imgLoader.setImageReturnType('base64');
      // this.imgLoader

      this.splashScreen.hide();

      this.oneSignal.startInit(oneSignalAppId, sender_id);
      this.oneSignal.inFocusDisplaying(this.oneSignal.OSInFocusDisplayOption.Notification);
      this.oneSignal.handleNotificationReceived().subscribe(data => this.onPushReceived(data.payload));
      this.oneSignal.handleNotificationOpened().subscribe(data => this.onPushOpened(data.notification.payload));
      this.oneSignal.endInit();
    }
  }

  private onPushReceived(payload: OSNotificationPayload) {
    console.log(payload);
    this.cache.removeItem('POSTS');
    alert('New notification:' + payload.body);
  }

  private onPushOpened(payload: OSNotificationPayload) {
    console.log(payload);
    this.cache.removeItem('POSTS');
    alert('New notification: ' + payload.body);
  }

  openPage(page, params) {
    if (!params) {
      this.event.publish('feature');
      return 0;
    }
    if (page === 'AboutPage' || page === 'SettingsPage') {
      this.nav.push(page, params);
    } else {
      this.nav.setRoot(page, params);
    }

  }

  public logout() {
    this.cache.clearAll().then(() => console.log('cleared'))
    this.auth.logout();
  }

  featureComing() {
    this.event.subscribe('feature', () => {
      const toast = this.toastCtrl.create({
        message: 'Stick around!, feature is coming soon',
        position: 'top',
        duration: 4000
      });
      toast.present();
    })

  }

  registerBackButton() {
    this.platform.registerBackButtonAction(() => {
      if (this.menuCtrl.isOpen()) {
        this.menuCtrl.close();
        return;
      }
      if (this.nav.getActive().instance instanceof HomePage && !this.nav.canGoBack()) {
        this.doubleClick();
        return;
      }

      if (this.nav.getActive().instance instanceof LoginPage) {
        this.doubleClick();
        return;
      }

      if (this.nav.canGoBack()) {
        this.nav.pop();
        return;
      }
      if (this.token) {
        this.nav.setRoot('HomePage');
        return;
      }

      this.nav.setRoot('LoginPage');
    });
  }

  doubleClick() {
    if (this.clicked) {
      this.platform.exitApp();
      return;
    }
    this._gf.showToster('Press again to close', 'info-toaster', 2000);
    this.clicked = true;
    setTimeout(() => {
      this.clicked = false;
    }, 2100);
  }

}
