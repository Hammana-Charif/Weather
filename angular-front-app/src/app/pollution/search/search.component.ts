import {Component, OnInit} from '@angular/core';
import {HttpClient, HttpErrorResponse} from '@angular/common/http';
import {City} from '../../shared/models/city.model';
import {PollutionService} from '../../shared/services/pollution.service';
import {Router, ActivatedRoute, ParamMap} from '@angular/router';

@Component({
  selector: 'app-search',
  templateUrl: './search.component.html',
  styleUrls: ['./search.component.css'],
  providers: [PollutionService]
})

export class SearchComponent implements OnInit {
  public city: City;
  // public data: City;

  constructor(private httpClient: HttpClient,
              private router: Router,
              private route: ActivatedRoute,
              private pollutionService: PollutionService) {
  }

  ngOnInit(): void {
    // this.pollutionService.searchCity$.subscribe(
    //   city => {
    //     this.city = city;
    //     // console.log(this.city.airQuality);
    //   });
  }

  search(value: string): void {
    this.httpClient.get(`https://127.0.0.1:8000/api/home/${value}`).subscribe(
      (data: City) => {
        this.city = data;
        this.pollutionService.sendCity(this.city);
        // this.fundedCIty(this.city);
      },
      (error: HttpErrorResponse) => {
        console.log(error);
      });
  }

  goToComponentB(): void {
    // PollutionService.data = {data: this.data};
    // console.log(this.pollutionService.data);
    // this.router.navigate(['/result'], { relativeTo: this.route });
  }

  // fundedCity(city: City): void {
  //   this.pollutionService.sendCity(city);
  // }
}
