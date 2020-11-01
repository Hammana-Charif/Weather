import {Component, OnInit} from '@angular/core';
import {HttpClient, HttpErrorResponse} from '@angular/common/http';
import {City} from '../../shared/models/city.model';
import {Router} from '@angular/router';

@Component({
  selector: 'app-search',
  templateUrl: './search.component.html',
  styleUrls: ['./search.component.css'],
})

export class SearchComponent implements OnInit {
  constructor(private httpClient: HttpClient,
              public router: Router,
  ) {
  }

  ngOnInit(): void {
  }

  search(value: string): void {
    this.httpClient.get(`https://127.0.0.1:8000/api/home/${value}`).subscribe(
      (data: City) => {
        this.router.navigate(['/result'], {queryParams: data});
      },
      (error: HttpErrorResponse) => {
        console.log(error);
      });
  }
}
