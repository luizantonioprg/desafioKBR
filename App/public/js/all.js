import openMenu from './modules/openMenu.js';
import closeMenu from './modules/closeMenu.js';

if (document.getElementById('open')) {
  document.getElementById('open').addEventListener('click', openMenu);
}
if (document.getElementById('close')) {
  document.getElementById('close').addEventListener('click', closeMenu);
}
