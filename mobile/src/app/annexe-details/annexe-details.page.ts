import { Component, OnInit } from '@angular/core';
import { Helper } from '../helpers/helper';

@Component({
  selector: 'app-annexe-details',
  templateUrl: './annexe-details.page.html',
  styleUrls: ['./annexe-details.page.scss'],
})
export class AnnexeDetailsPage implements OnInit {

  annexe = null;

  constructor(
    private helper: Helper
  ) { }

  ngOnInit() {
    this.annexe = this.helper.getNavExtras();
  }
}
