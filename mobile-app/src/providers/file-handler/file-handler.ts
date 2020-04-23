import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';

import 'rxjs/add/operator/timeout';
import { getEnv } from '../../common/is-cordova-available';

@Injectable()
export class FileHandlerProvider {


  url: string = '';

  constructor(public http: HttpClient) {
    this.url = getEnv().BASE_URL + '/api/auth/filehandler';
    console.log(this.url);
  }

  postFile(file: Blob, name) {


    let httpOptions = {
      headers: new HttpHeaders({
        'enctype': 'multipart/form-data; boundary=----WebKitFormBoundaryuL67FWkv1CA'
      })
    };

    let formData = new FormData();
    formData.append('file', file, name);
    return this.http.post(this.url, formData, httpOptions).timeout(15000);
  }

  delFile(fileName: string) {
    let url = `${this.url}?fileName=${fileName}`;
    return this.http.delete(url);
  }

}
