import { Component } from '@angular/core';

import { Platform } from '@ionic/angular';
import { SplashScreen } from '@ionic-native/splash-screen/ngx';
import { StatusBar } from '@ionic-native/status-bar/ngx';
import { AuthService } from './services/auth.service';
import { Router } from '@angular/router';
import { Helper } from './helpers/helper';

@Component({
  selector: 'app-root',
  templateUrl: 'app.component.html',
  styleUrls: ['app.component.scss']
})
export class AppComponent {
  
  public authUser;
  public appPages = [
    {
      title: 'Annexes Juridiques',
      url: '/annexe-list',
      icon: 'paper'
    },
    {
      title: 'Categories',
      url: '/category-list',
      icon: 'boat'
    }
  ];

  constructor(
    private platform: Platform,
    private splashScreen: SplashScreen,
    private statusBar: StatusBar,
    private router: Router,
    private helper: Helper,
    private authService: AuthService
  ) {
    this.initializeApp();
  }

  initializeApp() {
    this.platform.ready().then(() => {
      this.statusBar.styleDefault();
      this.splashScreen.hide();
    });
  }

  logout() {
    this.authService.logout();
  }

  onMenuOpen() {
    this.helper.getAuthUser().then(user => {
      this.authUser = JSON.parse(user);
      console.log(this.authUser)
    });
  }
}
