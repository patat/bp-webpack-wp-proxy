import _ from 'lodash';
import './style.css';
import example from './js/example';

function component() {
  var element = document.createElement('div');

  // Lodash, now imported by this script
  element.innerHTML = _.join(['Hello', 'webpack'], ' ');
  element.classList.add('hello');
  example('Hello!');

  return element;
}

document.body.appendChild(component());