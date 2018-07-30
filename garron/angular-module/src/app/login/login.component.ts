import { Component, OnInit } from '@angular/core';
import { CurrentRouteService } from "./../current-route.service";

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  constructor(private nav:CurrentRouteService) {}

  ngOnInit() {
    this.nav.updateRoute('login')
  }

}
