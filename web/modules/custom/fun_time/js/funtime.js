/**
 * @file
 * Add the js functionality of the changing color every second.
 */

(function ($, Drupal) {
  let heading = document.querySelector("h1");
  //define the colors to choose from in a array
  let colors = ["blue", "red", "black", "green", "yellow", "pink", "orange"];

  function changeColor() {
    let color = colors[Math.floor(Math.random() * colors.length)];
    heading.style.color = color;
  }

  setInterval(changeColor, 1000); // call to changeColor() after 1 second
})(jQuery, Drupal);
