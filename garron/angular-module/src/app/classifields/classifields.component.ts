import { Component, OnInit } from '@angular/core';
import { CurrentRouteService } from "./../current-route.service";
import * as $ from 'jquery'

@Component({
  selector: 'app-classifields',
  templateUrl: './classifields.component.html',
  styleUrls: ['./classifields.component.css']
})
export class ClassifieldsComponent implements OnInit {

  items: any [] = [1,2, 3, 4];

  constructor(private nav:CurrentRouteService) {}

  ngOnInit() {
    this.nav.updateRoute('/');
  }
  getJobs(event: any){
    console.log(event.target.value)
    if(event.target.value){
      $('#jobs-list').show();
      $('#jobs').addClass('col-md-12').removeClass('col-md-6');
      $('#profesionals').hide();
    } else {
      $('#jobs-list').hide();
      $('#jobs').addClass('col-md-6').removeClass('col-md-12');
      $('#profesionals').show();
    }
  }
  getProfessionals(event: any){
    console.log(event.target.value)
    if(event.target.value){
      $('#profesionals-list').show();
      $('#profesionals').addClass('col-md-12').removeClass('col-md-6');
      $('#jobs').hide();
    } else {
      $('#profesionals-list').hide();
      $('#profesionals').addClass('col-md-6').removeClass('col-md-12');
      $('#jobs').show();

    }
  }

}
