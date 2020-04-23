import { Component, ViewChild } from '@angular/core';
import { IonicPage, NavController, NavParams, Events, ToastController, AlertController, LoadingController } from 'ionic-angular';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import * as V from 'voca';
import { FileHandlerProvider } from '../../../../providers/file-handler/file-handler';
import { Storage } from '@ionic/storage';
/**
 * Generated class for the PersonalDetailsTabPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-personal-details-tab',
  templateUrl: 'personal-details-tab.html',
})
export class PersonalDetailsTabPage {

  @ViewChild('certFile') certFile: any; //to reset input file

  oldFile: string = null; //to remember and delete if changed

  dom_vars: any = {

  }
  no_vet: string = "no";
  no_dis: string = "no";

  public persornalDetails: FormGroup;
  constructor(public navCtrl: NavController, public navParams: NavParams,
    public toastCtrl: ToastController, private fileHandler: FileHandlerProvider,
    public alertCtrl: AlertController, public loadingCtrl: LoadingController,
    private formNextEvent: Events, private storage: Storage,
    private formBuilder: FormBuilder) {
    this.persornalDetails = this.formBuilder.group({
      firstname: ['', Validators.required],
      lastname: ['', Validators.required],
      date_of_birth: ['', Validators.required],
      place_of_birth: ['', Validators.required],
      sex: ['', Validators.required],
      title: ['', Validators.required],
      marital_status: ['', Validators.required],
      prev_surname: [''],
      national_id_number: ['', Validators.required],
      race: ['', Validators.required],
      nationality: ['', Validators.required],
      citizenship: ['', Validators.required],
      province: ['', Validators.required],
      religion: ['', Validators.required],
      physical_disability: ['', Validators.required],
      disability_type: [''],
      war_veteran: ['', Validators.required],
      veteran_proof: [''],
      personal_documents: ['', Validators.required]
    });
  }

  public changeVar(v: string, val: any) {
    this.dom_vars[v] = val;
  }

  fileUpload(e, doc) {
    let file = e.target.files[0];
    let natID = this.persornalDetails.controls.national_id_number.value;
    let corrTyp = this.isCorrectFileType(file.name);
    if (!corrTyp || !natID) {
      let message = (corrTyp) ? `Please enter your National ID number` : `Error! Not a valid file type`;
      this.certFile.nativeElement.value = '';
      let toast = this.toastCtrl.create({
        message,
        duration: 3000,
        position: 'top'
      });
      toast.present();
      return false;
    }
    if (file) {
      this.storage.set('NAT_ID', natID).then(() => "");
      this.dom_vars[doc] = file.name;
      let file_name = natID + '_' + doc + '_' + file.name;
      let loader = this.loadingCtrl.create({
        content: "Uploading.."
      });
      loader.present();
      this.fileHandler.postFile(file, file_name).subscribe((res: any) => {
        if (res) {
          if (this.oldFile) {
            this.fileHandler.delFile(this.oldFile).subscribe(() => "", e => "");
          }
          this.oldFile = file_name;
          loader.dismiss();
        }
      }, () => {
        this.certFile.nativeElement.value = '';
        delete this.dom_vars.personal_documents;
        loader.dismiss();
        const confirm = this.alertCtrl.create({
          subTitle: 'Oops! Uploading fail',
          message: 'Check your internet connection and retry',
          buttons: [{ text: ' Ok ' }]
        });
        confirm.present();
      });
    }
  }

  submit() {
    const fields = [
      "lastname",
      "firstname",
      "date_of_birth",
      "place_of_birth",
      "sex",
      "title",
      "marital_status",
      "prev_surname",
      "national_id_number",
      "race",
      "nationality",
      "citizenship",
      "province",
      "religion",
      "physical_disability",
      "disability_type",
      "war_veteran",
      "veteran_proof",
      "personal_documents"
    ];

    for (let i = 0; i < fields.length; i++) {
      const f = fields[i];
      if (!this.persornalDetails.controls[f].valid) {
        let name = V.titleCase(V.replaceAll(f, '_', ' '));
        let message = `Please enter your ${name}`;
        if (f === "personal_documents") {
          message = `Please attach your ${name}`;
        }
        let toast = this.toastCtrl.create({
          message,
          duration: 2000,
          position: 'top'
        });
        toast.present();
        return false;
      }
    }

    let formData = this.persornalDetails.value;
    delete formData.personal_documents;
    this.formNextEvent.publish('files', { for: 'personal_documents', name: this.oldFile })
    this.formNextEvent.publish('form:next', { key: 'personal_details', val: formData });
  }

  isCorrectFileType(file) {
    const regex = new RegExp("(.*?)\.(pdf|docx|stw|doc)$");
    return regex.test(file);
  }

}
