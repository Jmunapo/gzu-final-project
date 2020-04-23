import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, Refresher } from 'ionic-angular';
import { timer } from 'rxjs/observable/timer';
import { HttpClient } from '@angular/common/http';
import { ImageLoader } from 'ionic-image-loader';
import { getEnv } from '../../../common/is-cordova-available';
import { ImageViewerController } from 'ionic-img-viewer';

@IonicPage()
@Component({
  selector: 'page-gallery',
  templateUrl: 'gallery.html',
})
export class GalleryPage {

  _imageViewerCtrl: ImageViewerController;

  fill: string = "#006064";
  loaded: boolean = false;

  users = [];
  jsonData = null;

  constructor(public navCtrl: NavController,
    private http: HttpClient,
    private imageViewerCtrl: ImageViewerController,
    private imgLoader: ImageLoader,
    public navParams: NavParams) {
    this._imageViewerCtrl = imageViewerCtrl;
  }

  ionViewDidLoad() {
    let base = getEnv().BASE_URL + '/assets/img/app';
    let links = [];
    for (let i = 1; i < 10; i++) {
      links.push({
        img: `${base}/${i}.jpg`
      });
    }
    this.users = links;
    this.loaded = true;
  }

  clearCache(ev) {
    this.imgLoader.clearCache();
    ev.complete();
  }

  onImageLoad(ev) {
    //console.log(ev);
  }

  presentImage(img) {
    const imageViewer = this._imageViewerCtrl.create(img);
    imageViewer.present();
    // setTimeout(() => imageViewer.dismiss(), 1000);
    // imageViewer.onDidDismiss(() => alert('Viewer dismissed'));
  }

}
