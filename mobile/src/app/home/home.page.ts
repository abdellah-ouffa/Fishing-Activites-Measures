import { Component, OnInit } from '@angular/core';
import { AnnexesService } from '../services/annexes.service';
import { Router } from '@angular/router';
import { NavController } from '@ionic/angular';
import { Helper } from '../helpers/helper';
import { AuthService } from '../services/auth.service';

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage implements OnInit {

  annexes = [];

  constructor(
    private annexesService: AnnexesService,
    public navCtrl: NavController,
    private helper: Helper,
    private authService: AuthService
  ) {}

  ngOnInit () {
    this.helper.getAuthUser().then(user => {
      if(user) {
        this.helper.presentLoading(false);
        console.log(JSON.parse(user));
        let token = JSON.parse(user).token;
        this.annexesService.getAnnexes(token)
        .subscribe(response => {
          this.helper.dismissLoading();
          this.annexes = response.rules;
        });
      } else {
        this.authService.logout();
      }
    })
  }

  onDetailsAnnexe(annexe) {
    this.helper.setNavExtras(annexe)
    this.navCtrl.navigateForward("annexe-details");
  }

}
