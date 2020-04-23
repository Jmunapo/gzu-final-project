import { Injectable } from '@angular/core';
import { Events } from 'ionic-angular';
@Injectable()
export class Helpers {

  _appstate = {};

  constructor(public events: Events) {
    console.log('Hello App Globals Provider');
  }


  // already return a clone of the current state
  get appstate() {
    return this._appstate = this.clone(this._appstate);
  }

  // never allow mutation
  set state(value) {
    throw new Error('do not mutate the `.state` directly');
  }

  get(prop?: any) {
    // use our state getter for the clone
    const state = this.state;
    return state.hasOwnProperty(prop) ? state[prop] : state;
  }

  set(prop: string, value: any) {
    // internally mutate our state
    return this._appstate[prop] = value;
  }

  private clone(object) {
    // simple object clone
    return JSON.parse(JSON.stringify(object));
  }

  /**
   * Global accessble method to change menu
   * @param menuId landlord | student
   */
  public changeMenu(menuId: string) {

    this.events.publish('menu:changed', menuId);

  }

  public loadingSplash(show: boolean = true, time: number = 100000) {

    this.events.publish("splash:changed", show, time);

  }

  public getSafe(fn) {
    try {
      return fn();
    } catch (e) {
      return undefined;
    }
  }


}