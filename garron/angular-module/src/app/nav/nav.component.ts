import { Component, OnInit } from '@angular/core';
import { CurrentRouteService } from "./../current-route.service";



@Component({
  selector: 'app-nav',
  templateUrl: './nav.component.html',
  styleUrls: ['./nav.component.css']
})
export class NavComponent implements OnInit {

  items: any[] = [
    {
      "name":"Home",
      "link":"/"
    },
    {
      "name":"Login",
      "link":"login"
    },{
      "name":"User",
      "link":"user"
    }];
    who = '';
  constructor(private nav: CurrentRouteService) { }

  ngOnInit() {
    this.nav.reciber.subscribe((msg)=>{
      //console.log(msg);
      this.who = msg;
    });
  }

}
