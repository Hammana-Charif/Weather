import {Component, OnInit} from '@angular/core';
import {City} from '../../shared/models/city.model';
import {PollutionService} from '../../shared/services/pollution.service';

@Component({
  selector: 'app-result',
  templateUrl: './result.component.html',
  styleUrls: ['./result.component.css'],
  providers: [PollutionService]
})
export class ResultComponent implements OnInit {
  public city: City;

  // public data: City;

  /**
   * @description my lovely description
   * @param pollutionService
   */
  constructor(private pollutionService: PollutionService) {
  }

  ngOnInit(): void {
    // console.log(this.pollutionService.searchCity$);
    this.pollutionService.searchCity$.subscribe(
      (data ) =>
         // console.log(data)
    this.city = data
    // console.log(this.city.airQuality);
    );
    // console.log(this.city);
    // this.data = JSON.parse(PollutionService.data);
    // console.log(this.data);
  }
}
