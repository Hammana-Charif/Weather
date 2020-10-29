import { Component, OnInit } from '@angular/core';
import {City} from "../shared/models/city.model";
import {HttpClient} from "@angular/common/http";

@Component({
  selector: 'app-result',
  templateUrl: './result.component.html',
  styleUrls: ['./result.component.css']
})
export class ResultComponent implements OnInit {

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

  ngOnInit(): void {
  }

}
