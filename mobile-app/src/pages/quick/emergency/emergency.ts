import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, AlertController, LoadingController, Events } from 'ionic-angular';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';

import * as V from 'voca';
import Swal from 'sweetalert2'
import { RemoteProvider } from '../../../providers/remote/remote';
import { AuthProvider } from '../../../providers/auth/auth';
import { Storage } from '@ionic/storage';
import { timer } from 'rxjs/observable/timer';


@IonicPage()
@Component({
  selector: 'page-emergency',
  templateUrl: 'emergency.html',
})
export class EmergencyPage {
  fill: string = "#f44336";

  user: any = {};

  emergency: any = {};

  subjects: Array<string> = [
    "Health", "Abuse", "Accommodation"
  ]

  private emergencyForm: FormGroup;

  constructor(public navCtrl: NavController,
    public alertCtrl: AlertController,
    private formBuilder: FormBuilder,
    private remote: RemoteProvider,
    private auth: AuthProvider,
    private event: Events,
    public storage: Storage,
    public loadingCtrl: LoadingController,
    public navParams: NavParams) {
    this.user = this.navParams.data;
    console.log(this.user);

    this.emergencyForm = this.formBuilder.group({
      reporter: ['', Validators.required],
      subject: ['', Validators.required],
      urgency: ['', Validators.required],
      address: ['', Validators.required],
      phone: ['', Validators.required],
      description: ['', Validators.required]
    });

  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad EmergencyPage');
  }

  addLocation(which: string) {

    const prompt = this.alertCtrl.create({
      subTitle: `Enter emergency address`,
      inputs: [
        {
          name: 'town',
          placeholder: 'City or Mashava',
          type: 'text'
        },
        {
          name: 'street',
          placeholder: 'Street & House No',
          type: 'text'
        },
        {
          name: 'location',
          placeholder: 'Location',
          type: 'text'
        },
      ],
      buttons: [
        {
          text: 'Cancel',
          handler: data => {
            console.log('Cancel clicked');
          }
        },
        {
          text: 'Save',
          handler: data => {
            if (data.town === "" || data.street === "" || data.location === "") {
              return false;
            }

            let loc = V.titleCase(`${data.street} ${data.location}. ${data.town}`) + " campus";
            this.emergency.address = loc;
          }
        }
      ]
    });
    prompt.present();
  }

  subjChange($e) {

    console.log($e);
    if ($e === "other") {
      this.emergencyForm.patchValue({
        subject: ''
      })
      const prompt = this.alertCtrl.create({
        subTitle: `Please specify`,
        inputs: [
          {
            name: 'subject',
            type: 'text'
          }
        ],
        buttons: [
          {
            text: 'Cancel',
            handler: data => {
              console.log('Cancel clicked');
            }
          },
          {
            text: 'Save',
            handler: data => {
              if (data.subject === "") {
                return false;
              }
              this.subjects.push(V.titleCase(data.subject));
              this.emergency.subject = V.titleCase(data.subject);

            }
          }
        ]
      });
      prompt.present();
    }
  }

  submitEmergency(formData) {

    const loader = this.loadingCtrl.create({
      content: "Submitting...",
      spinner: "crescent",
      duration: 3000
    });
    loader.present();

    console.log(formData);
    let { access_token } = this.user;
    this.remote.submitEmergency(formData, access_token).subscribe(data => {
      console.log(data);
      Swal.fire({
        position: 'center',
        type: 'success',
        title: 'Emergency Submitted',
        showConfirmButton: false,
        timer: 1500
      });
      this.emergencyForm.reset();
    }, error => {
      if (error.error && (error.error.error === "Token is Expired" ||
        error.error.error === "Authorization Token not found" ||
        error.error.error === "Token is Invalid"
      )) {
        this.event.subscribe('login:emerg', data => {
          this.user.access_token = data;
          this.event.unsubscribe("login:emerg");
          timer(200).subscribe(() => this.submitEmergency(formData));

        })
        this.auth.enterPassword(this.user, 'emerg');
      }
    })

  }

}
