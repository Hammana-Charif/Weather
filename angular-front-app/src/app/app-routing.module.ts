import {NgModule} from '@angular/core';
import {Routes, RouterModule} from '@angular/router';
import {AppComponent} from './app.component';
import {SearchComponent} from './pollution/search/search.component';
import {ResultComponent} from './pollution/result/result.component';
import {PageNotFoundComponent} from './page-not-found/page-not-found.component';

const routes: Routes = [
  {path: '', component: SearchComponent},
  {path: 'home', component: AppComponent},
  {path: 'search', component: SearchComponent},
  {path: 'result', component: ResultComponent},
  {path: '**', component: PageNotFoundComponent},
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule {
}

export const routingComponents = [AppComponent, SearchComponent, ResultComponent, PageNotFoundComponent];
