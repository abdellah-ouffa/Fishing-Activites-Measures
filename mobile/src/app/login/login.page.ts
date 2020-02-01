import { Component, OnInit } from '@angular/core';
import { AuthService } from '../services/auth.service';
import { Helper } from '../helpers/helper';
import { AlertController, MenuController } from '@ionic/angular';
import { Router } from '@angular/router';

@Component({
  selector: 'app-login',
  templateUrl: './login.page.html',
  styleUrls: ['./login.page.scss'],
})
export class LoginPage {

  credentials = {PPRNumber: Number};

  constructor(
    private authService: AuthService,
    private helper: Helper,
    private router: Router,
    private menu: MenuController
  ) {}

  ionViewDidEnter() {
    this.menu.enable(false);
  }

  ionViewDidLeave() {
    this.menu.enable(true);
  }

  login() {
    this.helper.presentLoading(false);
    this.authService.login(this.credentials)
    .subscribe(response => {
      this.helper.dismissLoading();
      this.helper.setAuthUser(response);
      this.router.navigate(['home']);
    }, error => {
      let params = {
        "title": "Authentification", 
        "message": "Données incorrectes !", 
        "buttons": ['Cancel']
      };
      this.helper.showModal(params); 
    });
  }

}
