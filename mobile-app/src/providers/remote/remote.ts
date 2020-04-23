import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Storage } from '@ionic/storage';
import { CacheService } from 'ionic-cache';
import { getEnv, isCordovaAvailable } from '../../common/is-cordova-available';

@Injectable()
export class RemoteProvider {

  baseUrl: string = "";

  constructor(public http: HttpClient,
    private cache: CacheService,
    public storage: Storage) {
    this.baseUrl = getEnv().BASE_URL + '/api/app';
  }

  private getHeaders(token) {
    let headers = new HttpHeaders()
      .set('Content-Type', 'application/json')
      .set('Authorization', 'Bearer ' + token);
    return headers;
  }

  submitEmergency(formData: any, token: string) {
    return this.http.post(`${this.baseUrl}/emergency`, formData, { headers: this.getHeaders(token) }).timeout(15000);
  }

  getFinancials(token: string) {
    let url = this.baseUrl + '/financials';
    return this.http.get(url, { headers: this.getHeaders(token) });
  }

  getTransactions(token: string) {
    let url = this.baseUrl + '/transactions';
    return this.http.get(url, { headers: this.getHeaders(token) });
  }

  getCourses(token: string) {
    let url = this.baseUrl + '/courses';
    return this.http.get(url, { headers: this.getHeaders(token) });
  }

  confirmCourseReg(crses: Array<any>, token) {
    let headers = this.getHeaders(token);
    headers.set('Access-Control-Allow-Origin', '*');
    return this.http.post(`${this.baseUrl}/register`, crses, { headers }).timeout(15000);
  }

  postDeposit(data) {
    return this.http.post(`${this.baseUrl}/store_deposit`, data, { headers: this.getHeaders(data.token) }).timeout(15000);
  }

  getTTable(token: string) {
    let url = this.baseUrl + '/timetable';
    return this.http.get(url, { headers: this.getHeaders(token) });
  }

  getPosts(token: string) {
    if (!isCordovaAvailable()) {
      this.cache.removeItem('POSTS');
    }
    let headers = new HttpHeaders()
      .set('Content-Type', 'application/json')
      .set('Authorization', 'Bearer ' + token)
      .set('Access-Control-Allow-Origin', '*');
    const URL = `${this.baseUrl}/posts`;
    const req = this.http.get(URL, { headers });
    return this.cache.loadFromObservable('POSTS', req);
    // let url = this.baseUrl + '/posts';
    // return this.http.get(url, { headers: this.getHeaders(token) });
  }




}
