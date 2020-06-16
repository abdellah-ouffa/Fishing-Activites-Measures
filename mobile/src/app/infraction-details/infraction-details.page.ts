import { Component, OnInit } from '@angular/core';
import { Helper } from '../helpers/helper';
import { NavController } from '@ionic/angular';

@Component({
  selector: 'app-infraction-details',
  templateUrl: './infraction-details.page.html',
  styleUrls: ['./infraction-details.page.scss'],
})
export class InfractionDetailsPage implements OnInit {

  infraction = null;

  constructor(
    private helper: Helper,
    public navCtrl: NavController
  ) { }

  ngOnInit() {
    this.infraction = this.helper.getNavExtras();
  }
}
