import {Injectable} from '@angular/core';
import {BehaviorSubject} from 'rxjs';
import {City} from '../models/city.model';

@Injectable()
export class PollutionService {
  public city = new City();

  /**
   *
   * @private
   */
  private searchCitySource = new BehaviorSubject(this.city);
  public searchCity$ = this.searchCitySource.asObservable();

  // static data: any;

  constructor() {
    // console.log(PollutionService.data);
  }

  /**
   *
   * @param city
   */
  sendCity(city: City): void {
    this.city = city;
    // this.searchCitySource.next(city);
    // console.log(this.city);
  }
}
