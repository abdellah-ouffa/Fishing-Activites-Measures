import { Component, OnInit } from '@angular/core';
import { FishService } from '../services/fish.service';
import { NavController } from '@ionic/angular';
import { Helper } from '../helpers/helper';
import { AuthService } from '../services/auth.service';

@Component({
  selector: 'app-fish-measure',
  templateUrl: './fish-measure.page.html',
  styleUrls: ['./fish-measure.page.scss'],
})
export class FishMeasurePage implements OnInit {

  measures = [];
  fish = null;

  constructor(
    private fishService: FishService,
    public navCtrl: NavController,
    private helper: Helper,
    private authService: AuthService
  ) {}

  ngOnInit() {
    this.fish = this.helper.getNavExtras();

    this.helper.getAuthUser().then(user => {
      if(user) {
        this.helper.presentLoading(false);
        let token = JSON.parse(user).token;
      this.fishService.getMeasures(token, this.fish.id)
        .subscribe(response => {
          this.helper.dismissLoading();
          this.measures = response;
          console.log(this.measures)
        });
      } else {
        this.authService.logout();
      }
    })
  }

}
