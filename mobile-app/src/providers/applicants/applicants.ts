import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { ApiProvider } from '../api/api';

@Injectable()
export class ApplicantsProvider {

  constructor(public api: ApiProvider) {
  }

  getProgrammes(params?: any) {
    return this.api.get('programmes', params);
  }

  submitDetais(data: any) {
    return this.api.post('apply', data);
  }

}
