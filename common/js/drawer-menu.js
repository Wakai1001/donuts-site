'use strict';

// header領域

const hamburger = document.querySelector('#hamburger_menu');
const hamburger_top = document.querySelector('.nav_icon_top');
const hamburger_center = document.querySelector('.nav_icon_center');
const hamburger_bottom = document.querySelector('.nav_icon_bottom');
const drawer = document.querySelector('.nav_menu');

hamburger.addEventListener('click', () => {
  // ハンバーガーメニューの形状変化
  hamburger_top.classList.toggle('top_change');
  hamburger_center.classList.toggle('center_change');
  hamburger_bottom.classList.toggle('bottom_change');
  // ドロワーメニューの表示
  drawer.classList.toggle('drawer_open');
});
