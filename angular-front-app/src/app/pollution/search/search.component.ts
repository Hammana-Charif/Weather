import {Component, OnInit} from '@angular/core';
import {HttpClient, HttpErrorResponse} from '@angular/common/http';
import {City} from '../../shared/models/city.model';
import {Router} from '@angular/router';
import {SpinnerService} from '../../spinner/spinner.service';

@Component({
  selector: 'app-search',
  templateUrl: './search.component.html',
  styleUrls: ['./search.component.css'],
})

export class SearchComponent implements OnInit {
  public showSpinner = false;

  constructor(private httpClient: HttpClient, private spinnerService: SpinnerService, public router: Router) {
  }

  ngOnInit(): void {
  }

  search(value: string): void {
    this.spinnerService.requestStarted();
    // setTimeout(() => {
    //   this.showSpinner = false;
    // }, 4000);
    this.showSpinner = true;
    this.httpClient.get(`https://127.0.0.1:8000/api/home/${value}`).subscribe(
      (data: City) => {
        this.router.navigate(['/result'], {queryParams: data});
      },
      (error: HttpErrorResponse) => {
        console.log(error);
      });
  }
}
