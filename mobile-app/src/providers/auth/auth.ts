import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { BehaviorSubject, Subject } from 'rxjs';
import { Storage } from '@ionic/storage';

import Swal from 'sweetalert2'
import 'rxjs/add/operator/timeout';
import { Events } from 'ionic-angular';
import { CacheService } from 'ionic-cache';
import { getEnv } from '../../common/is-cordova-available';


@Injectable()
export class AuthProvider {

  public authState: Subject<any> = new BehaviorSubject(undefined);
  public nextStep: Subject<any> = new BehaviorSubject(null);

  baseUrl: string = "";

  public user: any;

  constructor(public http: HttpClient, public storage: Storage,
    private cache: CacheService,
    private event: Events) {
    this.baseUrl = getEnv().BASE_URL + '/api/auth';
    console.log(this.baseUrl);

    this.storage.get('USER').then(data => {
      this.authState.next(data);
    })

    this.authState.subscribe(user => {
      if (user) {
        this.user = user;
      }
    })
    console.log('Hello AuthProvider Provider');
  }


  public logout() {
    this.storage.remove('USER').then(() => this.authState.next(null));
  }

  public login(data: any) {
    return this.http.post(`${this.baseUrl}/login`, data).timeout(15000);
  }

  public userDetails(token: string) {
    let headers = new HttpHeaders()
      .set('Content-Type', 'application/json')
      .set('Authorization', 'Bearer ' + token);
    return this.http.post(`${this.baseUrl}/me`, {}, { headers }).timeout(15000);
  }


  public enterPassword(user, where = "global") {
    let { reg_number } = user;
    Swal.fire({
      title: 'Login expired. Please enter your password',
      input: 'password',
      inputAttributes: {
        autocapitalize: 'off'
      },
      showCancelButton: true,
      confirmButtonText: 'Login',
      showLoaderOnConfirm: true,
      preConfirm: (password) => {
        let cred = {
          password,
          reg_number
        }

        return fetch(this.baseUrl + '/login', {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(cred)
        }).then(response => {
          if (!response.ok) {
            throw new Error(response.statusText)
          }
          return response.json()
        }).catch(error => {
          Swal.showValidationMessage(
            `Login failed, Invalid credentials`
          )
        })
      },
      allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
      if (result.value) {
        user.access_token = result.value.access_token;
        this.storage.set('USER', user).then(() => {
          this.authState.next(user);
          this.event.publish(`login:${where}`, result.value.access_token);
          this.event.publish(`TOKEN:changed`, result.value.access_token);
        });
        //this.nextStep.next(result.value.access_token);
      }
    })
  }

  getProfile(token: string) {
    let headers = new HttpHeaders()
      .set('Content-Type', 'application/json')
      .set('Authorization', 'Bearer ' + token);
    const URL = `${this.baseUrl}/profile`;
    const req = this.http.post(URL, {}, { headers });
    return this.cache.loadFromObservable(URL, req);
  }

}