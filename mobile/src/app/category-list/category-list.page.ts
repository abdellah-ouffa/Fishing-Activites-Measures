import { Component, OnInit } from '@angular/core';
import { NavController } from '@ionic/angular';
import { Helper } from '../helpers/helper';
import { AuthService } from '../services/auth.service';
import { CategoryService } from '../services/category.service';

@Component({
  selector: 'app-category-list',
  templateUrl: './category-list.page.html',
  styleUrls: ['./category-list.page.scss'],
})
export class CategoryListPage implements OnInit {

  categories = [];

  constructor(
    private categoryService: CategoryService,
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
        this.categoryService.getCategories(token)
        .subscribe(response => {
          this.helper.dismissLoading();
          this.categories = response.categories;
          console.log(response);
          console.log(this.categories);
        });
      } else {
        this.authService.logout();
      }
    })
  }

  onDetailsCategory(category) {
    this.helper.setNavExtras(category);
    this.navCtrl.navigateForward("fish-list");
  }

}
