import { Component, OnInit } from '@angular/core';
import { Helper } from '../helpers/helper';
import { NavController } from '@ionic/angular';

@Component({
  selector: 'app-fish-details',
  templateUrl: './fish-details.page.html',
  styleUrls: ['./fish-details.page.scss'],
})
export class FishDetailsPage implements OnInit {

  fish = null;

  constructor(
    private helper: Helper,
    public navCtrl: NavController
  ) { }

  ngOnInit() {
    this.fish = this.helper.getNavExtras();
  }

  onDetailsMeasures() {
    this.helper.setNavExtras(this.fish);
    this.navCtrl.navigateForward("fish-measure");
  }
}
