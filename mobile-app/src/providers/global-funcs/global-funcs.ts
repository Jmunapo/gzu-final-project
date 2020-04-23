import { Injectable } from '@angular/core';
import { ToastController, LoadingController } from 'ionic-angular';

@Injectable()
export class GlobalFuncsProvider {

  _toaster: any;
  _loader: any;
  public loaded: boolean = false;
  constructor(
    private toastCtrl: ToastController,
    private loadingCtrl: LoadingController
  ) { }

  public showToster(message, type: string = 'info-toaster', duration: number = 3000) {
    if (this._toaster && type !== 'info-toaster') {
      this._toaster.dismiss();
    }
    let position = (type === 'success-toaster') ? 'top' : 'bottom';
    this._toaster = this.toastCtrl.create({
      message,
      duration,
      position,
      cssClass: type,
      dismissOnPageChange: true
    });
    this._toaster.present();
    this._toaster.onDidDismiss(() => {
      this._toaster = null;
    })
  }

  public showLoading(content: string = 'Loading..', duration: number = 3000, callback: any = (() => console.log('Dissmised'))) {
    if (this._loader) {
      this._loader.dismiss();
    }

    this._loader = this.loadingCtrl.create({
      spinner: 'crescent',
      content: content,
      duration
    });
    this._loader.present();
    try {
      this._loader.onDidDismiss(() => {
        callback();
        if (!this.loaded) {
          this.showToster('Network error, try again!', 'error-toaster');
          this.loaded = true;
        }
      });
    } catch (error) {

    }

  }

  public destroyLoader() {
    if (this._loader) {
      this._loader.dismiss();
      this._loader = null;
    }
  }

}
