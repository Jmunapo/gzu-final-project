import { HttpClient, HttpParams } from '@angular/common/http';
import { Injectable } from '@angular/core';

import 'rxjs/add/operator/timeout';
import { getEnv } from '../../common/is-cordova-available';

//https://services.gzu.ac.zw/ecocash/getsdetails.php?reg=M190001&pack=100&amnt=120.00
//https://services.gzu.ac.zw/ecocash/getforward.php?reg=M158130&pack=105&amnt=1.00&mn=263775696233&pck=105-Student%20Wallet%20TopUp&fn=JOSIAH%20MUNAPO&ord=M158130000000000019
//https://services.gzu.ac.zw/ecocash/gettrans.php ||post with orderno: M158130000000000019
//{orderno: "M158130000000000019", msgstatus: "COMPLETED", ecoref: "MP190504.0040.L27454", dv: "SUCCESS"}
@Injectable()
export class ApiProvider {
  url: string = '';

  constructor(public http: HttpClient) {
    this.url = getEnv().BASE_URL + '/api/auth';
    console.log(this.url);
  }

  get(endpoint: string, params?: any, reqOpts?: any) {
    if (!reqOpts) {
      reqOpts = {
        params: new HttpParams()
      };
      console.log(reqOpts);
    }

    // Support easy query params for GET requests
    if (params) {
      reqOpts.params = new HttpParams();
      for (let k in params) {
        reqOpts.params = reqOpts.params.set(k, params[k]);
      }
    }

    return this.http.get(this.url + '/' + endpoint, reqOpts).timeout(15000);
  }

  post(endpoint: string, body: any, reqOpts?: any) {
    return this.http.post(this.url + '/' + endpoint, body, reqOpts).timeout(15000);
  }

  put(endpoint: string, body: any, reqOpts?: any) {
    return this.http.put(this.url + '/' + endpoint, body, reqOpts).timeout(15000);
  }

  delete(endpoint: string, reqOpts?: any) {
    return this.http.delete(this.url + '/' + endpoint, reqOpts).timeout(15000);
  }

  patch(endpoint: string, body: any, reqOpts?: any) {
    return this.http.patch(this.url + '/' + endpoint, body, reqOpts).timeout(15000);
  }
}
