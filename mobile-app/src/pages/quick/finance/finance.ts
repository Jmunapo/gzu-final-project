import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, Events, PopoverController, AlertController, ModalController } from 'ionic-angular';
import { timer } from 'rxjs/observable/timer';

import * as moment from 'moment';
import pdfMake from 'pdfmake/build/pdfmake';
import pdfFonts from 'pdfmake/build/vfs_fonts';
pdfMake.vfs = pdfFonts.pdfMake.vfs;


import { FinanceOptionsPage } from './finance-options/finance-options';
import { SocialSharing } from '@ionic-native/social-sharing';
import { isCordovaAvailable } from '../../../common/is-cordova-available';
import { RemoteProvider } from '../../../providers/remote/remote';
import { TransInfoModalPage } from './trans-info-modal/trans-info-modal';
import { File } from '@ionic-native/file'
import { FileOpener } from '@ionic-native/file-opener';

@IonicPage()
@Component({
  selector: 'page-finance',
  templateUrl: 'finance.html',
})
export class FinancePage {

  letterObj: any = {};
  pdfObj: any;

  fill: string = "#4a148c";
  loaded: boolean = false;

  finance: any = {};

  allTransactions: Array<any> = [];
  filteredTrans: Array<any> = [];

  title: string = 'Tuition';

  depositing: boolean = false;

  titles = ['Tuition', 'Graduation', 'Accommodation', 'Student Wallet', 'All Accounts']

  constructor(public navCtrl: NavController,
    private events: Events,
    public alertCtrl: AlertController,
    private remote: RemoteProvider,
    public popoverCtrl: PopoverController,
    private socialShare: SocialSharing,
    public modalCtrl: ModalController,
    private file: File,
    private fileOpener: FileOpener,
    public navParams: NavParams) {
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad FinancePage');
    timer(500).subscribe(() => this.loaded = true);
  }

  loadFinance(token: string) {
    this.remote.getFinancials(token).subscribe((fin: any) => {
      if (typeof fin === 'object') {
        this.finance = fin;
      }
      console.log(fin)
    }, e => {
      this.navCtrl.setRoot('HomePage');
      console.log(e);
    })
  }

  ionViewWillLoad() {
    const token = this.navParams.data;
    if (token) {
      this.loadFinance(token);
      this.remote.getTransactions(token).subscribe((trans: Array<any>) => {
        console.log(trans)
        if (trans.length) {
          this.allTransactions = trans;
          this.filteredTrans = this.allTransactions.filter((t) => {
            return t.fees_type === this.title;
          })
        }
        this.depositing = false;
      }, e => {
        console.log(e);
      })
    }
  }

  changeTitle(title: string) {
    this.events.publish('title:changed');
    this.title = title;
    if (title === 'All Accounts') {
      this.filteredTrans = this.allTransactions;
      let arr = Object.keys(this.finance);
      this.finance['All Accounts'] = 0;
      for (let i = 0; i < arr.length; i++) {
        const elem = arr[i];
        if (!isNaN(this.finance[elem])) {
          if (elem !== 'fees' && elem !== 'Tuition') {
            this.finance['All Accounts'] += this.finance[elem];
          }
        }
      }
      return;
    }
    this.filteredTrans = this.allTransactions.filter((t) => {
      return t.fees_type === this.title;
    })
  }

  presentPopover(myEvent) {
    let popover = this.popoverCtrl.create(FinanceOptionsPage, { action: this.title });
    popover.present({
      ev: myEvent
    });
    popover.onDidDismiss((data) => {
      if (data === 'deposit') {
        this.accDeposit();
      } else if (data === 'share') {
        //this.shareAs();
        this.events.publish('feature');
      }
    })
  }

  accDeposit() {
    console.log('Confirm');
    let subTitle = (this.title === 'Student Wallet') ? 'Top up wallet' : 'Deposit ' + this.title.toLowerCase() + ' fee';
    const prompt = this.alertCtrl.create({
      subTitle,
      inputs: [
        {
          name: 'amount',
          placeholder: 'Amount',
          type: 'number'
        },
        {
          name: 'ecocash',
          placeholder: 'Ecocash number',
          type: 'tel'
        },
      ],
      buttons: [
        {
          text: 'Cancel',
          handler: () => {
            console.log('Cancel clicked');
          }
        },
        {
          text: 'Deposit',
          handler: data => {
            //var patt = /^\s*(?:\+?(\d{1,3}))?[- (]*(\d{3})[- )]*(\d{3})[- ]*(\d{4})(?: *[x/#]{1}(\d+))?\s*$/;
            console.log(data)
            if (data.ecocash === "" || data.amount === "" || isNaN(Number(data.amount))) {
              return false;
            }

            this.depositing = true;

            timer(1800).subscribe(() => this.deposit(data));
          }
        }
      ]
    });
    prompt.present();
  }

  deposit(data) {
    data['token'] = this.navParams.data
    data['fees_type'] = this.title;
    this.remote.postDeposit(data).subscribe(data => {
      console.log(data);
      this.ionViewWillLoad();
      //this.events.publish('Accountd:Update');
    })
  }

  shareAs() {
    if (isCordovaAvailable()) {
      this.pdfObj.getBuffer((buffer) => {
        var blob = new Blob([buffer], { type: 'application/pdf' });

        // Save the PDF to the data Directory of our App
        this.file.writeFile(this.file.dataDirectory, 'finance.pdf', blob, { replace: true }).then(fileEntry => {
          // Open the PDf with the correct OS tools
          this.fileOpener.open(this.file.dataDirectory + 'finance.pdf', 'application/pdf');
        })
      });

      // this.socialShare.share('Share financial statement',
      //   'financials', null, 'https://joemags.co.zw').then(() => {
      //     alert('Successfull');
      //   }).catch(e => {
      //     console.log(e);
      //   })
    } else {
      // On a browser simply use download!
      this.pdfObj.download();
    }
  }



  moreInfo(trans: string) {
    this.events.publish('title:changed');
    console.log("Selected Transaction", trans);
    const modal = this.modalCtrl.create(TransInfoModalPage, trans);
    modal.present();
    modal.onDidDismiss(action => {
      console.log(action);
      if (action) {
        this.shareData(action);
      }
    })
  }

  transactionDate(date: string) {
    return moment(date).format('LL');
  }

  shareData(data) {
    var docDefinition = {
      content: [
        { text: 'TRANSACTION DETAILS', style: 'header' },
        { text: data.status, alignment: 'right' },
        { text: data.fees_type },

        { text: data.payment_type + ' refrence', style: 'subheader' },
        { text: data.bank_refrence },

        { text: 'amount', style: 'subheader' },
        this.finance.currency + data.amount,

      ],
      styles: {
        header: {
          fontSize: 18,
          bold: true,
        },
        subheader: {
          fontSize: 14,
          bold: true,
          margin: [0, 15, 0, 0]
        },
        story: {
          italic: true,
          alignment: 'center',
          width: '50%',
        }
      }
    }
    this.pdfObj = pdfMake.createPdf(docDefinition);
    this.shareAs();
  }
}
