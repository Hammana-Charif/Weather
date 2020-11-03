import {Component, OnInit} from '@angular/core';
import {ActivatedRoute} from '@angular/router';
import {SpinnerService} from '../../spinner/spinner.service';


@Component({
  selector: 'app-result',
  templateUrl: './result.component.html',
  styleUrls: ['./result.component.css'],
})
export class ResultComponent implements OnInit {
  public city: any;

  /**
   * @description my lovely description
   * @param activatedRoute
   * @param spinnerService
   */
  constructor(public activatedRoute: ActivatedRoute, private spinnerService: SpinnerService) {
  }

  ngOnInit(): void {
    this.spinnerService.requestEnded();
    this.activatedRoute.queryParams.subscribe(
      (data) => {
        const receivedData = JSON.stringify(data);
        const cityObject = JSON.parse(receivedData);
        console.log(cityObject);
        this.city = cityObject;
      });
  }
}
