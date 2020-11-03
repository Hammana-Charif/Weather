export class City {
  private name: string;
  private airQuality: string;
  private fineParticle: string;
  private heavyParticle: string;
  private ozone: string;
  private datetime: string;

  get getName(): string {
    return this.name;
  }

  set setName(value: string) {
    this.name = value;
  }

  get getAirQuality(): string {
    return this.airQuality;
  }

  set setAirQuality(value: string) {
    this.airQuality = value;
  }

  get getFineParticle(): string {
    return this.fineParticle;
  }

  set setFineParticle(value: string) {
    this.fineParticle = value;
  }

  get getHeavyParticle(): string {
    return this.heavyParticle;
  }

  set setHeavyParticle(value: string) {
    this.heavyParticle = value;
  }

  get getOzone(): string {
    return this.ozone;
  }

  set setOzone(value: string) {
    this.ozone = value;
  }

  get getDatetime(): string {
    return this.datetime;
  }

  set setDatetime(value: string) {
    this.datetime = value;
  }
}
