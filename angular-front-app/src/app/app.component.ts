import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
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
  render() {
    document.querySelector(this.selector);
  }
}
