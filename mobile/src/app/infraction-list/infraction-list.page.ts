import { Component, OnInit } from '@angular/core';
import { NavController } from '@ionic/angular';
import { InfractionService } from '../services/infraction.service';
import { Helper } from '../helpers/helper';
import { AuthService } from '../services/auth.service';

@Component({
  selector: 'app-infraction-list',
  templateUrl: './infraction-list.page.html',
  styleUrls: ['./infraction-list.page.scss'],
})
export class InfractionListPage implements OnInit {

  infractions = [];

  constructor(
    private infractionService: InfractionService,
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
        this.infractionService.getInfractions(token)
        .subscribe(response => {
          this.helper.dismissLoading();
          this.infractions = response.infractions;
          console.log(response);
          console.log(this.infractions);
        });
      } else {
        this.authService.logout();
      }
    })
  }

  onDetailsInfraction(infraction) {
    this.helper.setNavExtras(infraction);
    this.navCtrl.navigateForward("infraction-details");
  }

}
