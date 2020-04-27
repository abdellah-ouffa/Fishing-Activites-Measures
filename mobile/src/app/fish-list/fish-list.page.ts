import { Component, OnInit } from '@angular/core';
import { Helper } from '../helpers/helper';
import { NavController } from '@ionic/angular';

@Component({
  selector: 'app-fish-list',
  templateUrl: './fish-list.page.html',
  styleUrls: ['./fish-list.page.scss'],
})
export class FishListPage implements OnInit {

  category = null;

  constructor(
    private helper: Helper,
    public navCtrl: NavController
  ) { }

  ngOnInit() {
    this.category = this.helper.getNavExtras();
  }

  onDetailsFish(fish) {
    this.helper.setNavExtras(fish);
    this.navCtrl.navigateForward("fish-details");
  }

}
