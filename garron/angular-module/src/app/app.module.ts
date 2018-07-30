import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppComponent } from './app.component';
import { HttpModule } from '@angular/http';
import { HttpClientModule } from '@angular/common/http';
import { UserComponent } from './user/user.component';
import { LoginComponent } from './login/login.component';
import { RouterModule } from '@angular/router';
import { NavComponent } from './nav/nav.component';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { ClassifieldsComponent } from './classifields/classifields.component';
import { CurrentRouteService } from './current-route.service';

const appRouter = [
  {path:"", component: ClassifieldsComponent},
  {path:"user", component: UserComponent},
  {path:"login", component: LoginComponent},
];

@NgModule({
  declarations: [
    AppComponent,
    UserComponent,
    LoginComponent,
    NavComponent,
    ClassifieldsComponent
  ],
  imports: [
    BrowserModule,
    HttpModule,
    HttpClientModule,
    RouterModule.forRoot(appRouter),
    NgbModule.forRoot()
  ],
  providers: [CurrentRouteService],
  bootstrap: [AppComponent]
})
export class AppModule { }
