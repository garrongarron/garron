import { Component, OnInit } from '@angular/core';
import { CurrentRouteService } from "./../current-route.service";
import * as $ from 'jquery'

@Component({
  selector: 'app-user',
  templateUrl: './user.component.html',
  styleUrls: ['./user.component.css']
})
export class UserComponent{

  items: any [] = [1,2, 3, 4];

  constructor(private nav:CurrentRouteService) {}

  ngOnInit() {
    this.nav.updateRoute('user')
  }
  experience(event){
    event.preventDefault();
    $('.nav-link').removeClass('active')
    $('#experience').addClass('active');
    $('.education').fadeOut(function(){
      //setTimeout(function(){
        $('.experience').fadeIn();
      //},2000);
    })
    console.log('exp')
  }

  education(event){
    event.preventDefault();
    $('.nav-link').removeClass('active')
    $('#education').addClass('active');
    $(this).addClass('active');
    $('.experience').fadeOut(function(){
      //setTimeout(function(){
        $('.education').fadeIn();
      //},2000);
    })
    console.log('edu')
  }
}
