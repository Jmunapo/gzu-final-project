import { Component, ViewChild, Renderer2 } from '@angular/core';
import { IonicPage, NavController, NavParams, ToastController, ModalController, Events, LoadingController, AlertController } from 'ionic-angular';
import { ApplicantsProvider } from '../../../../providers/applicants/applicants';
import * as V from 'voca';
import * as flatten from 'flat';
import * as plur from 'plur';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { App } from 'ionic-angular';

@IonicPage()
@Component({
  selector: 'page-programme-choices-tab',
  templateUrl: 'programme-choices-tab.html',
})
export class ProgrammeChoicesTabPage {

  @ViewChild('hideScroll') hideScroll;
  @ViewChild('searchPanel') searchPanel;

  public programmeChoices: FormGroup;

  selectingProg: boolean = true;

  programme_loaded: number = 0;

  selectedPrgr: number = 0;
  selectedProgrammesArray: any[] = [];
  allProgrammes: any[] = [];
  resetArrayProgrammes: any[] = [];
  filteredProgrammes: any[] = [];

  /**Programmes selected already */

  sponsorOtherShow: boolean = false;

  applicantData: any = {};

  constructor(public navCtrl: NavController, public navParams: NavParams,
    private events: Events,
    public alertCtrl: AlertController,
    private app: App,
    public toastCtrl: ToastController,
    public modalCtrl: ModalController,
    private rendr: Renderer2,
    public remote: ApplicantsProvider,
    public loadingCtrl: LoadingController,
    private _FB: FormBuilder, ) {

    this.programmeChoices = this._FB.group({
      first_choice_programme: [''],
      second_choice_programme: [''],
      third_choice_programme: [''],
      entry_type: ['', Validators.required],
      intake_type: ['', Validators.required],
      sponsorship: ['', Validators.required],
    });

  }

  ionViewWillLoad() {
    this.loadProgrammes();
  }

  private loadProgrammes() {

  }

  ionViewDidEnter() {
    let loader = this.loadingCtrl.create({
      content: "Loading Programmes.."
    });
    loader.present();
    this.remote.getProgrammes().subscribe((data: any) => {
      if (data.length > 2) {
        data.forEach(progr => {
          progr.parts = this.programmeParts(progr.programme_name);
          progr.selctd = false;
        });
        loader.dismiss();
        this.allProgrammes = data;
        this.filteredProgrammes = data;
        this.resetArrayProgrammes = data;
      } else {
        loader.dismiss();
        const confirm = this.alertCtrl.create({
          message: 'Sorry we don\'t have any programmes on offer currently, please visit our website gzu.ac.zw for more information',
          buttons: [{
            text: ' Ok ', handler: () => {
              this.app.getRootNav().setRoot('LoginPage');
            }
          }]
        });
        confirm.present();
      }
    }, e => {
      loader.dismiss();
      const confirm = this.alertCtrl.create({
        subTitle: 'Oops! failed to load Programmes',
        message: 'Check your internet connection and click back and submit on previous page',
        buttons: [{ text: ' Ok ' }]
      });
      confirm.present();
    });
  }

  public selectProgramme(progr) {

    if (progr.selctd) {

      this.selectedPrgr++;
      this.selectedProgrammesArray.push(progr);
      this.allProgrammes = this.allProgrammes.filter(pr => {
        return pr.id !== progr.id
      })
    } else {

      this.selectedPrgr--;
      this.selectedProgrammesArray = this.selectedProgrammesArray.filter(p => {
        return p.id !== progr.id
      })
      this.allProgrammes.push(progr);
    }
    let message = `${this.selectedPrgr} ${plur('Programme', this.selectedPrgr)} selected`;
    if (this.selectedPrgr < 3) {
      message += `. Select ${3 - this.selectedPrgr} more to continue`;
    } else {
      message += `. Press continue`;
    }

    let toast = this.toastCtrl.create({
      message,
      duration: 2000,
      position: 'top'
    });
    toast.present();

    if (this.selectedPrgr === 3) {
      this.programmeChoices.patchValue({
        first_choice_programme: this.selectedProgrammesArray[0].programme_name,
        second_choice_programme: this.selectedProgrammesArray[1].programme_name,
        third_choice_programme: this.selectedProgrammesArray[2].programme_name
      });
      this.hideScrollElement();
    }
  }

  reSelectProgramme() {
    let toast = this.toastCtrl.create({
      message: 'Uncheck the ones you want to change!',
      duration: 2000,
      position: 'top'
    });
    toast.present();
    this.selectingProg = true;
    try {
      this.rendr.setStyle(this.hideScroll['_scrollContent'].nativeElement.parentNode, 'height', 'calc(100% - 110px)');
      this.rendr.setStyle(this.searchPanel['_elementRef'].nativeElement, 'display', 'block');
    } catch (error) {
      console.log(error);
    }
  }

  private hideScrollElement() {
    this.selectingProg = false;
    try {
      this.rendr.setStyle(this.hideScroll['_scrollContent'].nativeElement.parentNode, 'height', '0px');
      this.rendr.setStyle(this.searchPanel['_elementRef'].nativeElement, 'display', 'none');
    } catch (error) {
      console.log(error);
    }

  }



  infoModalShow(prog) {
    let infoModal = this.modalCtrl.create('ProgrammesInfoPage', prog);
    infoModal.present();
    infoModal.onDidDismiss(() => {
      console.log('Test');
    })

  }

  initialiseItems() {
    this.filteredProgrammes = this.allProgrammes;
  }

  getProgrammes(ev) {
    this.initialiseItems();

    let typed = V.upperCase(ev.target.value);
    this.filteredProgrammes = [...this.allProgrammes.filter(prog => {
      const flt = flatten(JSON.parse(JSON.stringify(prog)));
      let fltnedProg = [
        flt.graduate_level,
        flt.programme_name,
        flt.conventional_duration,
        flt.block_duration,
        flt['parts.level'],
        flt['parts.field'],
        flt['parts.name'],
      ]

      let seachString = V.chain(fltnedProg.join(" ")).upperCase().value();
      let found = V.indexOf(seachString, `${typed}`);
      return found !== -1;
    }), ...this.selectedProgrammesArray]
  }

  programmeParts(programme: string) {
    let level = null, field = null, name = null;

    programme = programme.toUpperCase();

    if (this.isWhat(programme, 'BACHELOR OF') || this.isWhat(programme, 'MASTER OF')) {
      field = (V.chain(programme).words().value()).slice(0, 3).join(" ");
      let prgNameStart = V.indexOf(programme, '[');
      if (prgNameStart === -1) {
        name = V.trim(V.substr(programme, field.length));
      } else {
        name = V.substr(programme, V.indexOf(programme, '['));
        level = V.trim(V.substring(programme, field.length, programme.length - name.length))
      }
    } else if (this.isWhat(programme, 'DIPLOMA IN')) {
      let i = V.indexOf(programme, 'DIPLOMA IN');
      field = V.trim(V.substr(programme, 0, i) + 'DIPLOMA IN');
      level = V.trim(V.substr(programme, field.length));
    } else {
      name = programme;
    }

    return { level, field, name, }
  }

  isWhat(str: string, check: string) {
    return V.indexOf(str, check) !== -1
  }

  changeSponsor(e) {
    this.sponsorOtherShow = (e === 'other');
  }

  submitProgrammeChoices(val) {
    let data = {
      key: 'programme_choices',
      val
    }

    this.events.publish('form:next', data);
  }

}


