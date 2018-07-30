import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Http} from '@angular/http';
import { User } from './User';


@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})

export class AppComponent implements OnInit {
  title = 'angular-module';
  user: User;
  constructor(private http: HttpClient){}

  ngOnInit(){
    this.http.get<User>('http://localhost/auth').subscribe(
      data => {
        console.log(data);
        this.user = data;
      }
    );
  }
}
