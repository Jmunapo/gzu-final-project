import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { RemoteProvider } from '../../../providers/remote/remote';
import { GlobalFuncsProvider } from '../../../providers/global-funcs/global-funcs';

@IonicPage()
@Component({
  selector: 'page-news-events',
  templateUrl: 'news-events.html',
})
export class NewsEventsPage {

  fill: string = "#827717";
  loaded: boolean = false;
  not_found: boolean = false;

  news: Array<any> = [];

  private TOKEN: string;

  constructor(public navCtrl: NavController,
    private remote: RemoteProvider,
    private _gf: GlobalFuncsProvider,
    public navParams: NavParams) {
    console.log(this.navParams.data);
    this.TOKEN = this.navParams.data;
    console.log(this.TOKEN);
  }

  ionViewDidLoad() {
    this.remote.getPosts(this.TOKEN).subscribe((data: Array<any>) => {
      console.log(data);
      this.loaded = true;
      this.news = data || [];
    }, failed => {
      this.loaded = true;
      this.news = [];
      console.log(failed);
    })
  }

  favoritePost(post) {
    console.log(post);
    this._gf.showToster('Added', 'info-toaster', 450);
  }
  readNews(post) {
    this.navCtrl.push('ReadNewsPage', post);
  }

}
