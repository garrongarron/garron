import { Injectable } from '@angular/core';
import { BehaviorSubject } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class CurrentRouteService {

  private behavior = new BehaviorSubject<string>("asdfasdf");
  reciber = this.behavior.asObservable();
  constructor() { }

  do():string{
    return 'doneeeee';
    //this.messageSource.next(message);
  }

  updateRoute(message: string){
    this.behavior.next(message);
  }
}
