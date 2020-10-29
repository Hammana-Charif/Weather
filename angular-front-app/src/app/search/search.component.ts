import { Component, OnInit } from '@angular/core';
import {HttpClient, HttpErrorResponse} from "@angular/common/http";
import {City} from "../shared/models/city.model";

@Component({
  selector: 'app-search',
  templateUrl: './search.component.html',
  styleUrls: ['./search.component.css']
})

/**
 *
 */
export class SearchComponent implements OnInit {

  /**
   *
   */
  public city:City;

  /**
   *
   * @param httpClient
   */
  constructor(private httpClient:HttpClient) {
  }

  /**
   *
   */
  ngOnInit(): void {
  }

  /**
   *
   * @param value
   */
  search(value:string) {
      console.log(value);
      this.httpClient.get(`https://127.0.0.1:8000/api/home/${value}`).subscribe(
        /**
         *
         * @param data
         */
        (data:City) => {
          this.city = data;
        },
        /**
         *
         * @param error
         */
        (error: HttpErrorResponse) => {
          console.log(error);
      });
  }
}
