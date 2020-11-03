import {City} from '../../models/city.model';

export class PollutionBuilder {
  private city: City;

  build(data: any): City {
    this.city.setName = (data.name as string);
    this.city.setAirQuality = (data.airQuality as string);
    this.city.setFineParticle = (data.fineParticle as string);
    this.city.setHeavyParticle = (data.heavyParticle as string);
    this.city.setOzone = (data.ozone as string);
    this.city.setDatetime = (data.datetime as string);
    return this.city;
  }
}
