import {Component} from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css'],
  animations: [],
})

/**
 *
 */
export class AppComponent {

  /**
   *
   */
  public readonly title = 'Weather';

  /**
   *
   * @private
   */
  private readonly selector;

  /**
   *
   */
  constructor() {
    this.selector = 'app';
  }

  /**
   *
   */
  render(): void {
    document.querySelector(this.selector);
  }
}
