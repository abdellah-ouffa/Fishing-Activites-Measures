import { Storage } from '@ionic/storage';
import { Injectable } from '@angular/core';
import { Agent } from '../models/agent.model';
import { AlertController, LoadingController } from '@ionic/angular';

@Injectable({
  providedIn: 'root'
})
export class Helper {

  extras: any;
  loader: any;

  constructor(
    public storage: Storage,
    public alertController: AlertController,
    public loadingController: LoadingController
  ) { }

  public setNavExtras(data) {
    this.extras = data;
  }

  public getNavExtras() {
    return this.extras;
  }

  setAuthUser (agent: Agent) {
    this.storage.set('auth', JSON.stringify(agent));
  }

  getAuthUser () {
    return this.storage.get('auth');
  }

  destroyAuthUser() {
    this.storage.set('auth', null);
  }

  async showModal(parameters) {
    const alert = await this.alertController.create({
      header: parameters['title'],
      message: parameters['message'],
      buttons: parameters['buttons']
    });

    await alert.present();
  }

  async presentLoading(message) {
    if(!message) {
      message = 'Veuillez patienter !';
    }
    this.loader = await this.loadingController.create({
      message: message
    });
    this.loader.present();
  }

  dismissLoading() {
    this.loader.dismiss();
  }
}
